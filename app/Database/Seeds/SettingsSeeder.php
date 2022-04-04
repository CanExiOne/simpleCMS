<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'field' => [
                'siteName',
                'companyNIP',
                'companyREGON',
                'companyPhone',
                'emailHost',
                'emailPort',
                'emailCrypto',
                'emailUser',
                'emailPassword',
                'emailSender',
                'emailContact',
                'statsClients',
                'statsFinishedProjects',
                'statsCurrentProjects',
                'statsEmployees'
            ],
            'value' => [
                'simpleCMS',
                '1234567890',
                '123456789',
                '123456789',
                'smtp.yourhost.net',
                '465',
                'tls',
                'username',
                'password',
                'noreply@yoursite.com',
                'contact@yoursite.com',
                0,
                0,
                0,
                0
            ],
            'restricted' => [
                0,
                0,
                0,
                0,
                1,
                1,
                1,
                1,
                1,
                1,
                0,
                0,
                0,
                0,
                0
            ]
        ];

        $this->db->table('settings')->insert($data);
    }
}
