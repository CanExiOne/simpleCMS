<?php namespace App\Controllers;

use App\Models\SettingsModel;
use App\Models\UsersModel;
use App\Models\NewsModel;
use App\Models\GalleryModel;
use CodeIgniter\Controller;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
        $session = session();
        $usersModel = new UsersModel();
        $newsModel = new NewsModel();

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }
        //Create User Management System
        //Create Content Management System
        //Create Configuration Management System
        $siteName = 'test';
        $siteDesc = 'test';
        $data['title'] = $siteName;
        $data['siteDesc'] = $siteDesc;
        $data['userCount'] = count($usersModel->findAll());
        $data['newsCount'] = count($newsModel->findAll());

        echo view('admin/templates/header', $data);
		echo view('admin/home', $data);
        echo view('admin/templates/footer', $data);
	}

	public function view($page = 'pages')
	{
        $usersModel = new UsersModel();
        $news = new NewsModel();
        $db = \Config\Database::connect();
        $session = session();

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $userData = $usersModel->find($_SESSION['userId']);

        if(!is_file(APPPATH.'Views/admin/pages/'.$page.'.php'))
        {
            //Can't find file
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        if($page === 'users')
        {
            if($userData['group'] == 1)
            {
                $data['users'] = $usersModel->findAll();
            } else 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            }
        }

        if($page === 'news')
        {
            if($userData['group'] == 1 || $userData['group'] == 2)
            {
                $data['newsList'] = $news->findAll();
                $data['users'] = $usersModel->findAll();
            } else 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            }
        }

        if($page === 'settings')
        {
            if($userData['group'] == 1)
            {
                $cfg = [
                    'baseURL' => getenv('app.baseURL'),
                    'siteName' => getenv('app.siteName'),
                ];
    
                $data['cfg'] = $cfg;
            } else 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            }

        }

        $siteName = ucfirst($page);
        $siteDesc = 'test';
        $data['title'] = $siteName;
        $data['siteDesc'] = $siteDesc;
        $data['year'] = date('Y');

        echo view('admin/templates/header', $data);
		echo view('admin/pages/'.$page, $data);
        echo view('admin/templates/footer', $data);
	}

    public function createUser()
    {
        $userModel = new UsersModel();
        $session = session();
        $validation =  \Config\Services::validation();
		$email = \Config\Services::email();

        $config['SMTPCrypto'] 	= env('email.encrypt');
		$config['protocol']     = env('email.protocol');
		$config['SMTPHost'] 	= env('email.host');
		$config['SMTPPort'] 	= env('email.port');
		$config['SMTPUser'] 	= env('email.user');
		$config['SMTPPass'] 	= env('email.password');
		$config['mailType']		= 'html';

		$email->initialize($config);

        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('createUser'))
        {
            //Generate password for new user
            $chars = "abcdefghijklmnopqerstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            $pwd = substr(str_shuffle($chars), 0, 20);

            //Hash the generated password
            $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
            $pwd_hash = password_hash($pwd_pepper, PASSWORD_ARGON2ID);

            //Save data to database
            $userModel->save([
                'firstName' => $this->request->getVar('userFirstName'),
                'lastName' => $this->request->getVar('userLastName'),
                'email' => $this->request->getVar('userEmail'),
                'password' => $pwd_hash,
                'group' => $this->request->getVar('userGroup')
            ]);

            $data['pwd'] = $pwd;

            $email->setFrom(env('email.sender'), env('siteName').' - noreply');
            $email->setReplyTo(env('email.contact'), env('siteName').' - Kontakt');
            $email->setTo($this->request->getVar('email'));

            $email->setSubject(env('siteName').' - Aktywacja Konta');
            $email->setMessage(view('templates/emails/newUser', $data));

            if(!$email->send())
            {
                $error = "";

                if(!$_SERVER['CI_ENVIRONMENT'] === 'production'){
                    $error = $email->printDebugger();
                }

                $message = 'Użytkownik został pomyślnie utworzony, ale wystąpił błąd z wysłaniem wiadomości e-mail zawierajacą hasło do konta. Użytkownik będzie musiał zresetować swoje hasło.';

                return json_encode(['status'=> 'success', 'csrf' => csrf_hash(), 'error' => $error, 'message' => $message]);
            }

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Konto dla ' . 
                            $this->request->getVar('userFirstName') . ' ' . 
                            $this->request->getVar('userLastName') . ' z adresem e-mail ' . 
                            $this->request->getVar('userEmail') . ' zostało utworzone pomyślnie!';
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
        } else if($validation->hasError('userFirstName')
                    || $validation->hasError('userLastName')
                    || $validation->hasError('userEmail')
                    || $validation->hasError('userGroup')) 
        {

            $errors = $validation->getErrors();

            $message = 'Serwer wykrył błędy w otrzymanych danych, przed kontynuacją muszą zostać poprawione!';

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors, 'message' => $message ]);

        } else {
            $message = 'Nieznany błąd!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
        }
    }

    public function updateUser()
    {
        $userModel = new UsersModel();
        $validation =  \Config\Services::validation();
        
        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('updateUser'))
        {

            $id = $this->request->getVar('userId');

            if($id) {
                //Update data in database
                $userModel->update($id, [
                    'firstName' => $this->request->getVar('userFirstName'),
                    'lastName'  => $this->request->getVar('userLastName'),
                    'email'     => $this->request->getVar('userEmail'),
                    'group'     => $this->request->getVar('userGroup')
                ]);
            } else {
                $this->response->setStatusCode(400);
                return json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $this->request->getJSON()]);
            }
        
            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Konto z numerem ID:' . $id . ' zostało pomyślnie zedytowane.';
            
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
        } else if($validation->hasError('userFirstName')
                || $validation->hasError('userLastName')
                || $validation->hasError('userEmail')
                || $validation->hasError('userGroup'))
        {
            $errors = $validation->getErrors();

            $message = 'Serwer wykrył błędy w otrzymanych danych, przed kontynuacją muszą zostać poprawione!';

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors, 'message' => $message]);
        } else {
            $message = 'Nieznany błąd!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
        }
    }

    public function deleteUser()
    {
        $userModel = new UsersModel();
        $validation =  \Config\Services::validation();
        
        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('deleteUser'))
        {
            //Get Admin password to confirm deletion of the account
            $adminData = $userModel->find($_SESSION['userId']);
            $adminID = $_SESSION['userId'];

            $pwd = $this->request->getVar('confirmPassword');
            $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
            $pwd_hash = $adminData['password'];

            //Get target user ID
            $userId = $this->request->getVar('userId');

            //Check if target ID is not the Admin requesting deletion of target, if target ID is the same as Admin ID, throw error
            if($userId == $adminID) {

                $errors['confirmPassword'] = 'Nie możesz usunąć swojego konta!';
            
                return json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors]);
            }

            //Verify Admin password
            if(!password_verify($pwd_pepper, $pwd_hash))
            {
                $errors['confirmPassword'] = 'Podano nieprawidłowe hasło!';
            
                return json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors]);
            }
            
            //Permamently delete user from database
            if($this->request->getVar('deletePermamently') === 'true')
            {
                $userModel->delete($userId, true);
            } 
            //Perform soft delete in the database //We permamently delete now because user management needs to be expanded
            else {
                $userModel->delete($userId, true);
            }   

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Konto z numerem ID:' . $userId . ' zostało pomyślnie usunięte.';
            
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
        } else if($validation->hasError('password')
        || $validation->hasError('confirmPassword'))
        {       
            $errors = $validation->getErrors();

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors]);
        }
        //Redirect to login page if there's no session data
        else
        {
            $message = "Wystąpił błąd podczas przetwarzania tej akcji! Musisz się zalogować!";

            return redirect()->to('/admin/login')->with('redirectMessage', $message);
        }
    }

    public function createNews()
    {
        $usersModel = new UsersModel();
        $newsModel = new NewsModel();
        $session = session();
        $validation =  \Config\Services::validation();

        $userData = $usersModel->find($_SESSION['userId']);


        /*
         * Check user session data
         * Get user permissions from DB
         * Finish Validation
         */

        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('createNews'))
        {

            //Save data to database
            $newsModel->save([
                'title' => $this->request->getVar('title'),
                'slug' => url_title($this->request->getVar('title'), '-', true),
                'content' => $this->request->getVar('contents'),
                'delta' => $this->request->getVar('editorDelta'),
                'authorID' => $_SESSION['userId'],
            ]);

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Post "' . $this->request->getVar('title') . '" został pomyślnie utworzony!';

                $slug = url_title($this->request->getVar('title'), '-', true);

                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'slug' => $slug, 'message' => $message]);
            }
        } else if($validation->hasError('title')
                || $validation->hasError('contents'))
        {

            $errors = $validation->getErrors();

            $message = 'Serwer wykrył błędy w otrzymanych danych, przed kontynuacją muszą zostać poprawione!';

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors, 'message' => $message ]);

        } else {
            
            $error = 'Wykryto nieznany błąd! Skontaktuj się z Administratorem Serwera podając zawartość formularza!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'error' => $error]);
        }
    }

    public function editNews()
    {
        $newsModel = new NewsModel();
        $session = session();
        $validation =  \Config\Services::validation();

        /*
         * Check user session data
         * Get user permissions from DB
         * Finish Validation
         */

        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('editNews'))
        {

            $id = $this->request->getVar('postId');

            //Save data to database
            $newsModel->update($id, [
                'title' => $this->request->getVar('title'),
                'slug' => url_title($this->request->getVar('title'), '-', true),
                'content' => $this->request->getVar('contents'),
                'delta' => $this->request->getVar('editorDelta')
            ]);

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $slug = url_title($this->request->getVar('title'), '-', true);

                $message = 'Post został pomyślnie edytowany!';

                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'slug' => $slug, 'message' => $message]);
            }
        } else if($validation->hasError('title')
                || $validation->hasError('contents')) 
        {

            $errors = $validation->getErrors();

            $message = $this->request->getVar('postId');

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors, 'message' => $message ]);

        } else {
            
            $error['unknown'] = 'Wykryto nieznany błąd! Skontaktuj się z Administratorem Serwera podając zawartość formularza!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'error' => $error]);
        }
    }

    public function deleteNews()
    {
        $newsModel = new NewsModel();
        $userModel = new UsersModel();
        $validation =  \Config\Services::validation();
        
        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post')
        {
            //Get Admin password to confirm deletion of the account
            // $adminData = $userModel->find($_SESSION['userId']);
            // $adminID = $_SESSION['userId'];

            // $pwd = $this->request->getVar('password');
            // $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
            // $pwd_hash = $adminData['password'];

            //Get target post ID
            $postId = $this->request->getVar('id');

            //Verify Admin password
            // if(!password_verify($pwd_pepper, $pwd_hash))
            // {
            //     $errors['invalid-password'] = 'Podano nieprawidłowe hasło!';
            
            //     return json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $errors]);
            // }
            
            //Permamently delete news from database
            if($this->request->getVar('deletePermamently') === 'true')
            {
                $newsModel->delete($postId, true);
            } 
            //Perform soft delete in the database
            else {
                $newsModel->delete($postId);
            }   

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Ogłoszenie o numerze ID:' . $postId . ' zostało pomyślnie usunięte.';
            
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
        }
    }

    public function uploadFile()
    {
        $validation =  \Config\Services::validation();
        $file = $this->request->getFile('myImage');

        return json_encode(['status' => 'failure', 'message' => $_FILES]);

        if($this->request->getMethod() === 'post' && $this->validate('uploadFile'))
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH.'uploads', $newName);

                return json_encode(['status' => 'success', 'message' => 'success']);
            } else {
                return json_encode(['status' => 'failure', 'message' => 'Nie działa']);
            }
        } else if($validation->hasError('myImage'))
        {
            $errors = $validation->getErrors();

            return json_encode(['status' => 'invalid', 'message' => $errors]);
        }

    }

    public function updateSettings()
    {
        $validation =  \Config\Services::validation();
        $file = $this->request->getFile('siteLogo');
        
        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('updateSettings'))
        {

            $path = ROOTPATH.'.env';

            if (file_exists($path)) {          
                file_put_contents($path, str_replace(
                    "app.siteName = '".getenv('app.siteName')."'", "app.siteName = '".$this->request->getVar('siteName')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.host = '".getenv('email.host')."'", "email.host = '".$this->request->getVar('emailHost')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.user = '".getenv('email.user')."'", "email.user = '".$this->request->getVar('emailUsername')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.password = '".getenv('email.password')."'", "email.password = '".$this->request->getVar('emailPassword')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.sender = '".getenv('email.sender')."'", "email.sender = '".$this->request->getVar('emailSender')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.contact = '".getenv('email.contact')."'", "email.contact = '".$this->request->getVar('emailContact')."'", file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    "email.port = '".getenv('email.port')."'", "email.port = '".$this->request->getVar('emailPort')."'", file_get_contents($path)
                ));
            } else {
                $message = 'Wystąpił błąd!';
            
                return json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
            }

            if($file = $this->request->getFile('siteLogo'))
            {
                if($file->isValid() && !$file->hasMoved())
                {
                    if(!$file->move(ROOTPATH.'public/theme/img/', 'logo.png'))
                    {
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                    }
                }
            }
            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Ustawienia zostały edytowane!';
            
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
        } else if($validation->hasError('baseURL')
                || $validation->hasError('siteName')
                || $validation->hasError('siteLogo'))
        {
            $errors = $validation->getErrors();

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors]);
        } else {
            $message = 'Nieznany błąd!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
        }
    }

    public function createAlbum()
    {
        $validation =  \Config\Services::validation();
        $galleryModel = new GalleryModel();
        if($this->request->getMethod() === 'post' && $this->validate('createAlbum'))
        {
            //Get files
            if($files = $this->request->getFiles())
            {
                //Create array to temporary store names of files for database
                $images = [];

                foreach($files['file'] as $file){
                    if($file->isValid() && !$file->hasMoved()) {
                        //Generate new file name and move to uploads directory
                        $newName = $file->getRandomName();
                        $file->move(WRITEPATH . 'uploads', $newName);

                        //Push new file name to array
                        array_push($images, $newName);
                    }
                }

                //Save data to database
                //Check if files have been saved correctly
                //Return success message
                //Display errors in a more user friendly style
                
            } else {
                return json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => 'Nie wysłano żadnych plików!']);
            }

            if($this->request->isAjax())
            {
                $message = 'a message to be sent';
                return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]);
            }
            
        } else if($validation->hasError('albumTitle') ||
                    $validation->hasError('albumCategory'))
        {
            $errors = $validation->getErrors();

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'errors' => $errors, $message = "Musisz poprawić błędy w formularzu!"]);
        } else {

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => 'Wystąpił nieznany błąd!']);
        }
    }
}
