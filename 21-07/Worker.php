<?php

class Worker
{
    public $name;
    public $age;
    public $salary;
}

$worker = new Worker();
$worker->name = 'John';
$worker->age = 25;
$worker->salary = 1000;

$worker2 = new Worker();
$worker2->name = 'Вася';
$worker2->age = 26;
$worker2->salary = 2000;

echo $worker->salary + $worker2->salary;
echo '<br>';
echo $worker->age + $worker2->age;
