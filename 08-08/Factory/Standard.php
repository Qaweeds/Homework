<?php

class Standard extends Taxi
{

    public function createTaxi(): ITaxi
    {
        return new StandardCar();
    }
}

class StandardCar implements ITaxi
{

    public function cost()
    {
        return '200';
    }

    public function model()
    {
        return 'Hyundai';
    }
}