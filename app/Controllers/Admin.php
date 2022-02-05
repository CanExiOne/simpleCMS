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
        $usersModel = new UsersModel();
        $newsModel = new NewsModel();
        $galleryModel = new GalleryModel();

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }
        //Create User Management System
        //Create Content Management System
        //Create Configuration Management System
        $data['siteTitle'] = 'Panel Administratora';
        $data['siteDesc'] = 'test';

        $data['settings'] = $this->cfg;

        $data['userCount'] = count($usersModel->findAll());
        $data['newsCount'] = count($newsModel->findAll());
        $data['galleryCount'] = count($galleryModel->findAll());
        $data['picturesCount'] = $galleryModel->countPictures(); 

        echo view('admin/templates/header', $data);
		echo view('admin/home', $data);
        echo view('admin/templates/footer', $data);
	}

	public function view($page)
	{
        $usersModel = new UsersModel();
        $settingsModel = new SettingsModel();
        $news = new NewsModel();
        $db = \Config\Database::connect();

        $data['settings'] = $this->cfg;

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
                $data['serverCfg'] = $this->serverCfg;
            } else 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            }

        }

        $data['siteTitle'] = ucfirst($page);
        $data['siteDesc'] = 'test';
        $data['year'] = date('Y');
        $data['page'] = $page;

        echo view('admin/templates/header', $data);
		echo view('admin/pages/'.$page, $data);
        echo view('admin/templates/footer', $data);
	}

    public function createUser()
    {
        $userModel = new UsersModel();
        $validation =  \Config\Services::validation();
		$email = \Config\Services::email();

        $config['SMTPCrypto'] 	= $this->serverCfg['emailCrypto'];
		$config['protocol']     = env('email.protocol');
		$config['SMTPHost'] 	= $this->serverCfg['emailHost'];
		$config['SMTPPort'] 	= $this->serverCfg['emailPort'];
		$config['SMTPUser'] 	= $this->serverCfg['emailUser'];
		$config['SMTPPass'] 	= $this->serverCfg['emailPassword'];
		$config['mailType']		= 'html';

		$email->initialize($config);

        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('createUser'))
        {
            $data = $this->request->getPost();

            //Generate password for new user
            $chars = "abcdefghijklmnopqerstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            $pwd = substr(str_shuffle($chars), 0, 20);

            //Hash the generated password
            $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
            $pwd_hash = password_hash($pwd_pepper, PASSWORD_ARGON2ID);

            $data['pwd'] = $pwd;

            $email->setFrom($this->serverCfg['emailSender'], $this->cfg['siteName'].' - noreply');
            $email->setReplyTo($this->cfg['emailContact'], $this->cfg['siteName'].' - Kontakt');
            $email->setTo($data['userEmail']);

            $email->setSubject($this->cfg['siteName'].' - Aktywacja Konta');
            $email->setMessage(view('templates/emails/newUser', $data));

            //Save data to database
            $userModel->save([
                'firstName' => $this->request->getVar('userFirstName'),
                'lastName' => $this->request->getVar('userLastName'),
                'email' => $this->request->getVar('userEmail'),
                'password' => $pwd_hash,
                'group' => $this->request->getVar('userGroup')
            ]);

            if(!$email->send())
            {
                $error = "";

                if(!$_SERVER['CI_ENVIRONMENT'] === 'production'){
                    $error = $email->printDebugger(['headers']);
                }

                log_message('critical', $email->printDebugger(['headers']));

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

    public function updateSettings()
    {
        $validation =  \Config\Services::validation();
        $model = new SettingsModel();
        $file = $this->request->getFile('siteLogo');
        
        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('updateSettings'))
        {
            $data = $this->request->getPost();

            if(!$model->updateSettings($data))
            {
                $message = 'Wystąpił błąd podczas aktualizacji ustawień!';

                return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
            }

            if($file = $this->request->getFile('siteLogo'))
            {
                if($file->isValid() && !$file->hasMoved())
                {
                   $currLogo = ROOTPATH.'public/assets/img/logo.png';
                   rename($currLogo, $currLogo.'.old');
                    if(!$file->move(ROOTPATH.'public/assets/img/', 'logo.png'))
                    {
                        $errors = '';

                        if(!$_SERVER['CI_ENVIRONMENT'] === 'production')
                        {
                            $errors['unknown'] = $file->getError();
                        }

                        rename($currLogo.'.old', $currLogo);

                        $message = 'Wystąpił błąd podczas aktualizacji logo!';

                        return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message, 'errors' => $errors]));
                    }
                    unlink(ROOTPATH.'/public/assets/img/logo.png.old');
                }
            }
            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Pomyślnie edytowano ustawienia! W przypadku zmiany logo nie zapomnij odświeżyć strony!';
            
                return $this->response->setJSON(json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]));
            }
        } else if($validation->getErrors())
        {
            $errors = $validation->getErrors();

            $message = 'Wykryto błędy formularzu! Musisz je poprawić';

            return $this->response->setJSON(json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'message' => $message, 'errors' => $errors]));
        } else {
            $message = 'Nieznany błąd!';

            return $this->response->setJSON(json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
        }
    }
}
