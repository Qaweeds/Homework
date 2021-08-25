<?php


namespace Core;

use Exception;

class Router
{
    protected $routes = [];
    protected $params = [];
    protected $namespace = 'App\Controllers\\';

    /**
     * @throws Exception
     */
    public function dispatch($url = '')
    {
        $url = $this->escapeQueryString($url);
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->getNamespace() . $this->convertToStudlyCaps($controller);

            if (class_exists($controller)) {
                $controller_obj = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (!preg_match("/action$/i", $action) && method_exists($controller_obj, $action)) {
                    unset($this->params['controller']);
                    unset($this->params['action']);
                    if (isset($this->params['namespace'])) unset($this->params['namespace']);

                    call_user_func_array([$controller_obj, $action], $this->params);
                } else {
                    throw new Exception("Method '$action' not found in $controller");
                }
            } else {
                throw new Exception("Controller '$controller' doesn't exist.");
            }
        } else {
            throw new Exception('no route matched.', 404);
        }
    }

    public function add($route, $params = [])
    {
        $route = preg_replace("/\//", "\\/", $route);
        $route = preg_replace("/\{([a-z]+)\}/", "(?P<\$1>[_\w-]+)", $route);
        $route = preg_replace("/\{([a-z]+):([^\d}]+)\}/", "(?P<\$1>[0-9]+)", $route);

        $route = "/^{$route}$/i";

        $this->routes[$route] = $params;
    }

    public function match($url): bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;

                return true;
            }
        }
        return false;
    }


    protected function convertToStudlyCaps($str)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    protected function convertToCamelCase($str): string
    {
        return lcfirst($this->convertToStudlyCaps($str));
    }

    protected function escapeQueryString($query)
    {
        if ($query != '') {
            $parts = explode('&', $query, 2);

            if (strpos($parts[0], '=') === false) {
                $query = $parts[0];
            } else {
                $query = '';
            }
        }

        return $query;
    }

    protected function getNamespace(): string
    {
        $namespace = $this->namespace;
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}