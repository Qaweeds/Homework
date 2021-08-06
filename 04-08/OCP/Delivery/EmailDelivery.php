<?php

namespace Delivery;

use Interfaces\ILogDelivery;

class EmailDelivery implements ILogDelivery
{
    public function getDelivery()
    {
        return 'EMAIL ';
    }

}