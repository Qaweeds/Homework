<?php

class Lux extends Taxi
{

    public function createTaxi(): ITaxi
    {
        return new LuxCar();
    }
}

class LuxCar implements ITaxi
{

    public function cost()
    {
        return '300';
    }

    public function model()
    {
        return 'Lexus';
    }
}