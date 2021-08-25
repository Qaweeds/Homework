<?php


namespace Core;


class Controller
{
    protected $routeParam = [];
    protected $errorMessage = 'Method not allowed';

    public function __construct($routeParam)
    {
        $this->routeParam = $routeParam;
    }

    public function __call($method, $args)
    {
        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                    $this->after();
            }else{
                throw new \Exception($this->errorMessage);
            }
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    public function before()
    {
        return true;
    }

    public function after(){}
}