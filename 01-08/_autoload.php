<?php

if (!defined('BASEDIR')) define('BASEDIR', __DIR__ . '/');

spl_autoload_register(function ($name) {
    $path = BASEDIR . 'vendor/' . $name . '.php';
    if (file_exists($path)) require_once $path;
});