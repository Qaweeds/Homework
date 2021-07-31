<?php

class User
{
    public $id;
    public $password;

    public function getUserData()
    {
        $arr = array();

        if (is_int($this->id)) {
            $arr['id'] = $this->id;
        } else {
            throw new Exception('Id не является числовым значением.');
        }

        if (strlen($this->password) <= 8) {
            $arr['password'] = $this->password;
        } else {
            throw new Exception('Пароль слишком длинный.');
        }

        return $arr;
    }
}

try {
    $user = new User();

    $user->id = 12;
//    $user->id = '12';

    $user->password = 'password';
    $user->password = 'passsword';
    echo implode(', ', $user->getUserData());
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo $e->getFile() . '<br>';
    echo 'Строка: ' . $e->getLine() . '<br><br>';
}

