<?php

class Econom extends Taxi
{

    public function createTaxi(): ITaxi
    {
        return new EconomCar();
    }
}

class EconomCar implements ITaxi
{

    public function cost()
    {
        return '100';
    }

    public function model()
    {
        return 'ВАЗ';
    }
}