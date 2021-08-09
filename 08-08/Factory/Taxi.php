<?php

abstract class Taxi
{
    abstract public function createTaxi(): ITaxi;

    public function getTaxiModelAndPrice()
    {
        $cost = $this->createTaxi()->cost();
        $model = $this->createTaxi()->model();
        return compact('cost', 'model');
    }


}