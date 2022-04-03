<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        if(isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin'));
        }

        $data['settings'] = $this->cfg;

        $data['siteTitle'] = $this->cfg['siteName']. ' - Logowanie';
        $data['siteDesc'] = 'Logowanie';

        echo view('admin/templates/header', $data);
		echo view('admin/login', $data);
        echo view('admin/templates/footer', $data);
    }

    public function auth()
    {
        $userModel = new UsersModel();
        $validation =  \Config\Services::validation();

        //Check if request method is POST and if true validate data received
        if($this->request->getMethod() === 'post' && $this->validate('userLogin'))
        {
           //Get user data to check if user exists and if password is correct
           $userData = $userModel->where('email', $this->request->getVar('email'))
                                    ->first();

            if(!$userData)
            {
                $error = 'Podano nieprawidłowe hasło lub adres e-mail!';
           
               return json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'error' => $error]);
            }

           $pwd = $this->request->getVar('password');
           $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
           $pwd_hash = $userData['password'];

           //Verify Admin password
           if(!password_verify($pwd_pepper, $pwd_hash))
           {
               $error = 'Podano nieprawidłowe hasło lub adres e-mail!';
           
               return json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'error' => $error]);
           }
            
           //Set session data
           $sessionData = [
               'userId' => $userData['id'],
               'username' => $userData['firstName'] . ' ' . $userData['lastName'],
               'email' => $userData['email'],
               'logged_in' => true,
           ];

           $this->session->set($sessionData);

           
            return json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'redirect' => base_url('/admin')]);

        } else if($validation->hasError('email')
                || $validation->hasError('password')) 
        {

            $error = 'Podano nieprawidłowe hasło lub adres e-mail!';

            return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'error' => $error ]);

        } else {
            $message = 'Nieznany błąd!';

            return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
        }
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/admin/login');
    }
}
?>