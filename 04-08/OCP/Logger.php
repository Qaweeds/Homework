<?php

include '_autoload.php';

use Delivery\ConsoleDelivery;
use Delivery\EmailDelivery;
use Delivery\SmsDelivery;
use Format\RawFormat;
use Format\WithDateAndDetailsFormat;
use Format\WithDateFormat;
use Interfaces\ILogDelivery;
use Interfaces\ILogFormat;

class Logger
{
    private $format;
    private $delivery;

    public function __construct(ILogFormat $format, ILogDelivery $delivery)
    {
        $this->format = $format->getFormat();
        $this->delivery = $delivery->getDelivery();
    }

    public function log($message)
    {
        return $this->format . $this->delivery . $message;
    }
}

$format = new RawFormat();
$delivery = new EmailDelivery();

//$format = new WithDateFormat();
//$delivery = new SmsDelivery();
//
//$format = new WithDateAndDetailsFormat('-some details-');
//$delivery = new ConsoleDelivery();

$logger = new Logger($format, $delivery);

echo $logger->log('Новый лог');