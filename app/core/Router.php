<?php

namespace app\core;

class Router
{
    public $request;
    protected $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $routes = new Routes();
        $this->routes = $routes->routesArray();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        
        if($callback === false) {
            echo "Not found";
            exit;
        }

        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);
    }
}