<?php

namespace Format;

use Interfaces\ILogFormat;

class WithDateAndDetailsFormat implements ILogFormat
{
    private $details;

    public function __construct($details = null)
    {
        $this->details = $details;
    }

    public function getFormat()
    {
        return date('Y-m-d H:i:s ') . $this->details . ' ';
    }
}