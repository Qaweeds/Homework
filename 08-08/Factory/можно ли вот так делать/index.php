<?php


interface  ITaxi
{
    public function cost();

    public function model();
}


abstract class Taxi
{
    public function getTaxiModelAndPrice()
    {
        $cost = $this->createTaxi()->cost();
        $model = $this->createTaxi()->model();
        return compact('cost', 'model');
    }

    abstract public function createTaxi(): ITaxi;

}


// Реализовывать все в одном классе и отдавать в фабрику обьект этого класса

class Standard extends Taxi implements ITaxi
{

    public function cost()
    {
        return '200';
    }

    public function model()
    {
        return 'Hyundai';
    }

    public function createTaxi(): ITaxi
    {

        return $this;
    }
}



echo '<pre>';

$standard = new Standard();
var_dump($standard->getTaxiModelAndPrice());

echo '</pre>';