<?php

namespace Delivery;

use Interfaces\ILogDelivery;

class ConsoleDelivery implements ILogDelivery
{
    public function getDelivery()
    {
        return 'CONSOLE ';
    }

}