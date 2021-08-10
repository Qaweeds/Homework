<?php

namespace Interfaces;

interface Card extends Payment
{
    public function getCardNumber();

    public function getCardHolder();
}