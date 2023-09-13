<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            0 => [
                'field' => 'siteName',
                'value' => 'simpleCMS',
                'restricted' => 0,
            ],
            1 => [
                'field' => 'companyNIP',
                'value' => '1234567890',
                'restricted' => 0,
            ],
            2 => [
                'field' => 'companyREGON',
                'value' => '123456789',
                'restricted' => 0,
            ],
            3 => [
                'field' => 'companyPhone',
                'value' => '123456789',
                'restricted' => 0,
            ],
            4 => [
                'field' => 'emailHost',
                'value' => 'smtp.yourhost.net',
                'restricted' => 1,
            ],
            5 => [
                'field' => 'emailPort',
                'value' => '465',
                'restricted' => 1,
            ],
            6 => [
                'field' => 'emailCrypto',
                'value' => 'tls',
                'restricted' => 1,
            ],
            7 => [
                'field' => 'emailUser',
                'value' => 'username',
                'restricted' => 1,
            ],
            8 => [
                'field' => 'emailPassword',
                'value' => 'password',
                'restricted' => 1,
            ],
            9 => [
                'field' => 'emailSender',
                'value' => 'noreply@yoursite.com',
                'restricted' => 1,
            ],
            10 => [
                'field' => 'emailContact',
                'value' => 'contact@yoursite.com',
                'restricted' => 0,
            ],
            11 => [
                'field' => 'statsClients',
                'value' => 0,
                'restricted' => 0,
            ],
            12 => [
                'field' => 'statsFinishedProjects',
                'value' => 0,
                'restricted' => 0,
            ],
            13 => [
                'field' => 'statsCurrentProjects',
                'value' => 0,
                'restricted' => 0,
            ],
            14 => [
                'field' => 'statsEmployees',
                'value' => 0,
                'restricted' => 0,
            ]
        ];

        foreach($data as $row => $value)
        {
            $this->db->table('settings')->insert($value);
        }      
    }
}
