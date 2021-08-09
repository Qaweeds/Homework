<?php

spl_autoload_register();

echo '<pre>';
$economic = new Econom();
var_dump($economic->getTaxiModelAndPrice());

$standard = new Standard();
var_dump($standard->getTaxiModelAndPrice());

$lux = new Lux();
var_dump($lux->getTaxiModelAndPrice());

echo '<pre>';