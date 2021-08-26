<?php


namespace Core;


use PDO;

trait DB
{
    protected static function db()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DB'] . '; charset=utf8';
            $db = new PDO($dsn, $_ENV['USER'], $_ENV['PASSWORD']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }

    public function escape($string)
    {
        return htmlspecialchars(trim(strip_tags($string)));
    }
}