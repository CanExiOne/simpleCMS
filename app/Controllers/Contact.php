<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function Send()
    {
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

        if($this->request->getMethod() === 'post' && $this->validate('contactForm'))
        {
            $data = [
                'clientName' =>  $this->request->getVar('name'),
                'clientEmail' =>  $this->request->getVar('email'),
                'subject' =>  $this->request->getVar('subject'),
                'message' =>  $this->request->getVar('message'),
            ];

            $email->setFrom($this->serverCfg['emailSender'], $this->cfg['siteName'].' - noreply');
            $email->setReplyTo($data['clientEmail'], $data['clientName']);
            $email->setTo($this->cfg['emailContact']);

            $email->setSubject($data['clientName'].' - Formularz Kontaktowy');
            $email->setMessage(view('templates/emails/contactForm', $data));

            if(!$email->send())
            {
                $error = "";

                if($_SERVER['CI_ENVIRONMENT'] != 'production'){
                    $error = $email->printDebugger(['headers']);
                }

                log_message('critical', $email->printDebugger(['headers']));

                $message = 'Wystąpił błąd podczas wysyłania wiadomości! Spróbuj wysłać wiadomość bezpośrednio na nasz adres znajdujący się z lewej strony!';

                return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message, 'error' => $error]);
            }

            //If everything was successful send success message to user
            if($this->request->isAjax())
            {
                $message = 'Twoja wiadomość została pomyślnie wysłana, odezwiemy się jak najszybciej!';
                return json_encode(['status' => 'ok', 'csrf' => csrf_hash(), 'message' => $message]);
            }

        } else if($validation->hasError('name'))
        {

        $errors = $validation->getError('name');

        return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'message' => $errors ]);

        } else if($validation->hasError('email'))
        {

        $errors = $validation->getError('email');

        return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'message' => $errors ]);

        } else if($validation->hasError('subject'))
        {

        $errors = $validation->getError('subject');

        return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'message' => $errors ]);

        } else if($validation->hasError('message'))
        {

        $errors = $validation->getError('message');

        return json_encode(['status'=> 'invalid', 'csrf' => csrf_hash(), 'message' => $errors ]);

        } else {
            return json_encode(['status' => 'failure', 'csrf' => csrf_hash(), 'response' => 'An error has occurred!']);
        }
    }
}
