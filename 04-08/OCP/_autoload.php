<?php

spl_autoload_register(function ($name) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . $name . '.php';
    if ($path) require_once $path;
    else die('Файл не найден');
});