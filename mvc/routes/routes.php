<?php

use Core\Router;

$router = new Router();

$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('/users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('/users/{id}', ['controller' => 'UserController', 'action' => 'show']);
$router->add('/users/{id:\d+}/edit', ['controller' => 'UserController', 'action' => 'edit']);

$router->add('/admin', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);

try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    echo $e->getMessage();
}