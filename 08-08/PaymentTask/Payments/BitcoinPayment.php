<?php

namespace Payments;

use Interfaces\Payment;

class BitcoinPayment implements Payment
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return 'BTN';
    }
}