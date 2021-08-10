<?php
spl_autoload_register();

use Interfaces\Payment as Ipayment;
use Payments\CardPayment;
use Payments\BitcoinPayment;

class Payment
{
    private $payment;

    public function __construct(Ipayment $payment)
    {
        $this->payment = $payment;
    }

    public function getPaymentAmount()
    {
        return $this->payment->getAmount();
    }

    public function getPaymentCurrency()
    {
        return $this->payment->getCurrency();
    }
}

$btn = new BitcoinPayment(0.3);
$payment = new Payment($btn);
echo $payment->getPaymentAmount() . ' ' . $payment->getPaymentCurrency();