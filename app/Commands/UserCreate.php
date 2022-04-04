<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

use App\Models\UsersModel;

class UserCreate extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'User';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'user:create';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Create a new User';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'user:create';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $userModel = new UsersModel();

        $data['email'] = CLI::prompt('Podaj adres e-mail dla tego konta', 'testing@domain.com', 'required|valid_email|is_unique[users.email]');
        $data['firstName'] = CLI::prompt('Podaj imię użytkownika', null, 'required|alpha_numeric_space|min_length[3]|max_length[60]');
        $data['lastName'] = CLI::prompt('Podaj nazwisko użytkownika', null, 'required|alpha_numeric_space|min_length[3]|max_length[60]');
        $data['group'] = CLI::promptByKey(['Wybierz grupę dla użytkownika:'], [
            1 => 'Administrator',
            2 => 'Moderator',
            3 => 'Użytkownik'
        ], 'required|in_list[1,2,3]');

        if($data)
        {
            CLI::write('Tworzenie użytkownika '.$data['firstName'].' '.$data['lastName'].' z grupą: '.$data['group']);

             //Generate password for new user
             $chars = "abcdefghijklmnopqerstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
             $pwd = substr(str_shuffle($chars), 0, 20);
 
             //Hash the generated password
             $pwd_pepper = hash_hmac("sha256", $pwd, env('security.secretkey'));
             $pwd_hash = password_hash($pwd_pepper, PASSWORD_ARGON2ID);

            try {
                $userModel->save([
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'email' => $data['email'],
                    'password' => $pwd_hash,
                    'group' => $data['group'],
                    'isActive' => 1
                ]);
            } catch (Exception $e) {
                throw $e;
            }

            CLI::write('Utworzono użytkownika z adresem e-mail: '.$data['email']);
            CLI::write('Hasło dla użytkownika: '.$pwd);
        } else {
            CLI::write('Wystąpił błąd! Nie udało się wczytać podanych danych!');
        }
    }
}
