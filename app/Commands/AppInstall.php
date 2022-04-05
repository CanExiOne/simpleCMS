<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AppInstall extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'simpleCMS';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'app:install';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Installs the application, it simplifies initial configuration of website';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:install';

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
        start:
        helper('envWriter');
        
        // We can't really use validation for this prompt so we use regex
        $variables['app.baseURL'] = CLI::prompt('Podaj adres strony', 'http://localhost');

        $regex = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

        if(!preg_match($regex, $variables['app.baseURL']))
        {
            CLI::write("Podany adres strony nie jest prawidłowym adresem URL", 'red');
            goto start;
        }

        $variables['app.siteName'] = CLI::prompt('Podaj nazwę strony', env('app.siteName'), 'required');

        writeToEnvironment($variables);

    }
}
