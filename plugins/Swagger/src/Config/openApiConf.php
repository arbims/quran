<?php


namespace Swagger\Config;

class openApiConf
{
    public static function config(): array
    {
        $appPath = [];
        array_push($appPath, APP . 'Controller');

        if (is_dir(APP . 'Model')) {
            array_push($appPath, APP . 'Model' . DS . 'Entity');
        }
        if (is_dir(APP . 'Model')) {
            array_push($appPath, APP . 'Model' . DS . 'Table');
        }

        array_push($appPath, ROOT . DS . 'plugins/Swagger/src/Controller');

        return [
            'openapi' => '3.0.0',
            'info' => [
                'title' => 'Open Api CodeIgniter',
                'description' => 'Your API Description',
                'version' => '1.0.0',
            ],
            'servers' => [
                'url' => 'https://api.example.com/v1'
            ],
            'paths' => $appPath,
        ];
    }
}
