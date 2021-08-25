<?php

use Core\Router;

$router = new Router();

$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('/admin', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);
$router->add('/admin/posts/{id}/edit', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);
$router->add('/admin/posts/{id}/remove', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);

try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    echo $e->getMessage();
}