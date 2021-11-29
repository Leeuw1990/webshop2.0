<?php

namespace app\core;

class Router
{
    public $request;
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;

    }

    public function resolve()
    {
        $path = $this->request->getPath();
        //Roept de path method aan.
        var_dump('path'.$path);
        $method = $this->request->getMethod();
        //Roept de getMethod aan.
        var_dump('method'.$method);
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            echo "Not found";
            exit;
        }
        // callback momenteel als je url/nogwat krijg je een error. 
        var_dump($callback);
        if(is_string($callback)) {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        include_once dirname(__dir__, 2). "/view/$view.php";
    }


}