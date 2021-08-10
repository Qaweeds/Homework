<?php

namespace Payments;

use Interfaces\Card;

class CardPayment implements Card
{
    private $cardNumber;
    private $cardHolder;
    private $amount;
    private $currency;

    public function __construct($amount, $currency, $cardHolder, $cardNumber)
    {
        $this->cardHolder = $cardHolder;
        $this->cardNumber = $cardNumber;
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}