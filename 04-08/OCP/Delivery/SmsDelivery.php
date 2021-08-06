<?php

namespace Delivery;

use Interfaces\ILogDelivery;

class SmsDelivery implements ILogDelivery
{
    public function getDelivery()
    {
        return 'SMS ';
    }

}