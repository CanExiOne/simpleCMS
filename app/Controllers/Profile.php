<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

use App\Models\UsersModel;

class Profile extends BaseController 
{
    public function index()
    {
        $model = new UsersModel();

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }

        $data['settings'] = $this->cfg;

        $data['siteTitle'] = $this->cfg['siteName'].' | Profil';
        $data['siteDesc'] = "Test";

        $profile = $model->find($_SESSION['userId']);

        $data['profile'] = [
            'firstName' => $profile['firstName'],
            'lastName' => $profile['lastName'],
            'email' => $profile['email'],
        ];

        echo view('admin/templates/header', $data);
		echo view('admin/pages/profile', $data);
        echo view('admin/templates/footer', $data);
    }

    public function changePassword()
    {
        $validation =  \Config\Services::validation();
        $model = new UsersModel();

        $email = \Config\Services::email();

        $config['SMTPCrypto'] 	= $this->serverCfg['emailCrypto'];
		$config['protocol']     = env('email.protocol');
		$config['SMTPHost'] 	= $this->serverCfg['emailHost'];
		$config['SMTPPort'] 	= $this->serverCfg['emailPort'];
		$config['SMTPUser'] 	= $this->serverCfg['emailUser'];
		$config['SMTPPass'] 	= $this->serverCfg['emailPassword'];
		$config['mailType']		= 'html';

		$email->initialize($config);

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }

        if($this->request->getMethod() === 'post' && $this->validate('changePassword'))
        {
            $userData = $model->find($_SESSION['userId']);

            $currPwd = $this->request->getPost('currPassword');
            $currPwd_pepper = hash_hmac('sha256', $currPwd, env('security.secretkey'));
            $srcPwd_hash = $userData['password'];

            if(!password_verify($currPwd_pepper, $srcPwd_hash))
            {
                $message = 'Popraw błędy w formularzu!';

                $errors['currPassword'] = 'Podane hasło jest nieprawidłowe!';

                return $this->response->setJSON(json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'message' => $message, 'errors' => $errors]));
            }

            $newPwd = $this->request->getPost('newPassword');
            $newPwd_pepper = hash_hmac('sha256', $newPwd, env('security.secretkey'));
            $newPwd_hash = password_hash($newPwd_pepper, PASSWORD_ARGON2ID);

            if($newPwd === $currPwd)
            {
                $message = 'Hasła nie mogą być takie same!';

                return $this->response->setJSON(json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'message' => $message]));
            }

            $data = [
                'password' => $newPwd_hash,
            ];

            if(!$model->update($_SESSION['userId'], $data))
            {
                $message = 'Wystąpił błąd podczas aktualizacji hasła!';

                return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
            }

            $email->setFrom($this->serverCfg['emailSender'], $this->cfg['siteName'].' - noreply');
            $email->setReplyTo($this->cfg['emailContact'], $this->cfg['siteName'].' - Kontakt');
            $email->setTo($userData['email']);

            $email->setSubject($this->cfg['siteName'].' - Zmiana Hasła');
            $email->setMessage(view('templates/emails/changedPassword', $userData));

            if(!$email->send())
            {
                $errors['unknown'] = "";

                if(!$_SERVER['CI_ENVIRONMENT'] === 'production'){
                    $errors['unknown'] = $email->printDebugger();
                }

                $message = 'Pomyślnie zmieniono hasło, ale nie udało się wysłać informacji na adres e-mail o zmianie hasła!';

                return $this->response->setJSON(json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'error' => $errors, 'message' => $message]));
            }

            if($this->request->isAjax())
            {
                $message = "Hasło zostało pomyślnie zmienione!";

                return $this->response->setJSON(json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]));
            }
        } else if($validation->getErrors())
        {
            $errors = $validation->getErrors();

            $message = 'Wykryto błedy w formularzu, musisz je poprawić!';

            return $this->response->setJSON(json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'message' => $message, 'errors' => $errors]));
        } else 
        {
            $message = "Wystąpił nieznany błąd! Skontatkuj się z Administratorem Serwera!";

            $this->response->setStatusCode(400);

            return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
        }
    }

    public function updateProfile()
    {
        $validation =  \Config\Services::validation();
        $model = new UsersModel();

        $email = \Config\Services::email();

        $config['SMTPCrypto'] 	= env('email.encrypt');
		$config['protocol']     = env('email.protocol');
		$config['SMTPHost'] 	= $this->serverCfg['emailHost'];
		$config['SMTPPort'] 	= $this->serverCfg['emailPort'];
		$config['SMTPUser'] 	= $this->serverCfg['emailUser'];
		$config['SMTPPass'] 	= $this->serverCfg['emailPassword'];
		$config['mailType']		= 'html';

		$email->initialize($config);

        if(!isset($_SESSION['logged_in']))
        {
            return redirect()->to(base_url('/admin/login'));
        }

        if($this->request->getMethod() === 'post' && $this->validate('updateProfile'))
        {
            $userData = $model->find($_SESSION['userId']);

            $data = [
                'firstName' => $this->request->getPost('firstName'),
                'lastName' => $this->request->getPost('lastName'),
                'email' => $this->request->getPost('email'),
            ];

            if(!$model->update($_SESSION['userId'], $data))
            {
                $message = 'Wystąpił błąd podczas aktualizacji profilu!';

                return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
            }

            if($this->request->isAjax())
            {
                $message = "Profil został pomyślnie zaktualizowany!";

                return $this->response->setJSON(json_encode(['status' => 'success', 'csrf' => csrf_hash(), 'message' => $message]));
            }
        } else if($validation->getErrors())
        {
            $errors = $validation->getErrors();

            $message = 'Wykryto błedy w formularzu, musisz je poprawić!';

            return $this->response->setJSON(json_encode(['status' => 'invalid', 'csrf' => csrf_hash(), 'message' => $message, 'errors' => $errors]));
        } else 
        {
            $message = "Wystąpił nieznany błąd! Skontatkuj się z Administratorem Serwera!";

            $this->response->setStatusCode(400);

            return $this->response->setJSON(json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'message' => $message]));
        }
    }
}