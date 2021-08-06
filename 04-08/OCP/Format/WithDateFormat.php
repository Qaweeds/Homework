<?php

namespace Format;

use Interfaces\ILogFormat;

class WithDateFormat implements ILogFormat
{
    public function getFormat()
    {
        return date('Y-m-d H:i:s ');
    }
}