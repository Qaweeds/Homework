<?php


class Config
{
    public static function getConfig()
    {
        include_once './_autoload.php';
        $config = BASEDIR . 'config.ini';
        if (file_exists($config)) {
            return parse_ini_file($config);
        } else {
            throw new Exception('Создайте файл конфигурации');
        }
    }
}
