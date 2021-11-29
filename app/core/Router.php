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
            // in de variabele zit de uri request in. Die wordt doorgegeven aan de renderview Method
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        // $viewContent = $this->renderOnlyView($view);
        include_once Application::$ROOT_DIR."/view/$view.php";
        // return str_replace('{{content}}', $layoutContent);
        // Parameter view zit REQUEST_URI in. Die heb ik nodig om het juiste 
        // bestand te kunnen openen en te renderen.
        // In index wordt gekeken wat de root directory is van het project.
        // Die word in de contructor van application gezet. 
        // Vervolgen roep ik die functie + contructor aan. 
        // Het is een static functie vandaar Application::$ROOT_DIR
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/view/layouts/Main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/view/$view.php";
        return ob_get_clean();
    }




}