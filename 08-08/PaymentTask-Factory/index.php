<?php

namespace q; // заглушка, что б не было конфликтов

interface IPayment
{
    public function getAmount();

    public function getCurrency();
}

abstract class Payment
{
    abstract public function newPayment(): IPayment;


    public function total()
    {
        $payment = $this->newPayment();
        return $payment->getAmount() . ' ' . $payment->getCurrency();
    }
}

class Bitcoin implements IPayment
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

class BitcoinPayment extends Payment
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function newPayment(): IPayment
    {
        return new Bitcoin($this->amount);
    }
}

$btn = new BitcoinPayment(100);
echo $btn->total();
