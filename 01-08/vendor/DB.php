<?php

class DB
{
    private $connection;

    public function __construct()
    {
        try {
            $config = Config::getConfig();

            $opt = array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            $pdo = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8',
                $config['user'],
                $config['pass'],
                $opt
            );

            $this->connection = $pdo;

        } catch (PDOException $e) {
            die($e->getMessage());
        }


    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function escape($string)
    {
        return htmlspecialchars(trim(strip_tags($string)));
    }

    public function table_exist($table)
    {
        try {
            return (bool)$this->connection->query("SELECT * FROM $table LIMIT 1");
        } catch (Exception $e) {
            return false;
        }
    }

}
