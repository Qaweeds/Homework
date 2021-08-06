<?php

class Worker2
{
    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary)
    {
        if ($age < 18) {
            die('Рабочий болжен быть совершеннолетним.');
        } else {
            $this->name = $name;
            $this->age = $age;
            $this->salary = $salary;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$worker = new Worker2('Jack', 25, 1000);

echo $worker->getAge() * $worker->getSalary();