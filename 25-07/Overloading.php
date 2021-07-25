<?php


use JetBrains\PhpStorm\ArrayShape;

class User
{
    private $name;
    private $age;
    private $email;

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            $this->$name(implode(',', $arguments));
        } else {
            die('Такого метода не существует.');
        }
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
        $this->age = $age;
    }

    public function getAll()
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        ];
    }
}


$user = new User();

$user->setName('Александр');
$user->setAge(30);

//$user->setEmail('q@q.com');

echo '<pre>';

print_r($user->getAll());

echo '</pre>';

