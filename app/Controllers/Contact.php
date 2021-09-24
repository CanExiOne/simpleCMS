<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function Send()
    {
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

        if($this->request->getMethod() === 'post' && $this->validate('contactForm'))
        {
            $data = [
                'clientName' =>  $this->request->getVar('name'),
                'clientEmail' =>  $this->request->getVar('email'),
                'subject' =>  $this->request->getVar('subject'),
                'message' =>  $this->request->getVar('message'),
            ];

            $email->setFrom(env('email.sender'), env('siteName').' - noreply');
            $email->setReplyTo($this->request->getVar('email'), $this->request->getVar('name'));
            $email->setTo(env('email.contact'));

            $email->setSubject($this->request->getVar('name').' - Formularz Kontaktowy');
            $email->setMessage(view('templates/emails/contactForm', $data));

            if(!$email->send())
            {
                $message['error'] = $email->printDebugger();

                return json_encode(['status'=> 'failure', 'csrf' => csrf_hash(), 'message' => $message]);
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
