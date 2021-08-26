<?php

use Core\Router;

$router = new Router();


$router->add('/login', ['controller' => 'AuthController', 'action' => 'login', 'namespace' => 'Auth']);
$router->add('/register', ['controller' => 'AuthController', 'action' => 'register', 'namespace' => 'Auth']);
$router->add('/logout', ['controller' => 'AuthController', 'action' => 'logout', 'namespace' => 'Auth']);

$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('/article/{id}', ['controller' => 'PostController', 'action' => 'show', 'namespace' => 'Posts']);

$router->add('/admin/posts', ['controller' => 'PostController', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('/admin/posts/create', ['controller' => 'PostController', 'action' => 'create', 'namespace' => 'Admin']);
$router->add('/admin/posts/{id}/edit', ['controller' => 'PostController', 'action' => 'edit', 'namespace' => 'Admin']);
$router->add('/admin/posts/store', ['controller' => 'PostController', 'action' => 'store', 'namespace' => 'Admin']);
$router->add('/admin/posts/{id}/delete', ['controller' => 'PostController', 'action' => 'delete', 'namespace' => 'Admin']);
//$router->add('/admin/posts/{id}/edit', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);
//$router->add('/admin/posts/{id}/remove', ['controller' => 'AdminController', 'action' => 'admin', 'namespace' => 'Admin']);

try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    echo $e->getMessage();
}