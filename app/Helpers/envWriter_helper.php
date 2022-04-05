<?php

/**
 * This helper is to write to .env file with ease when editing configuration
 * inside ACP or by using CLI commands
 */


/**
 * Escapes an environment value by looking for any characters that could 
 * cause environment parsing issues.
 */
function escapeEnvironmentValue(string $value): string
{
    if (!preg_match('/^\"(.*)\"$/', $value) && preg_match('/([^\w.\-+\/])+/', $value)) {
        return sprintf('"%s"', addslashes($value));
    }

    return $value;
}

/**
 * Update the .env file for the application using the passed in values.
 *
 * @throws \CodeIgniter\FileNotFoundException
 */
function writeToEnvironment(array $values = [])
{
    $path = ROOTPATH.'/.env';
    if (!file_exists($path)) {
        throw new CodeIgniter\FileNotFoundException('Cannot locate .env file, please copy and rename env file or use php spark app:install');
    }

    $saveContents = file_get_contents($path);
    foreach($values as $key => $value){
        $saveValue = sprintf('%s=%s', $key, escapeEnvironmentValue($value));

        if (preg_match_all('/(^#|^)' . $key . '=(.*)$/m', $saveContents) < 1) {
            $saveContents = $saveContents . PHP_EOL . $saveValue;
        } else {
            $saveContents = preg_replace('/(^#|^)' . $key . '=(.*)$/m', $saveValue, $saveContents);
        }
    };

    file_put_contents($path, $saveContents);
}