<?php

namespace app\core;

use Mustache_Engine;

class Router
{
    public $request;
    public $response;
    protected $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
        // Krijgt terug welk pad er in de browser staat.
        $routes = new Routes();
        $this->routes = $routes->routesArray();
        //Roept de path method aan.
        $method = $this->request->method();


        // Krijgt terug welke method er wordt gebruikt. GET, POST, PUT, HEAD in kleine letters.
        $callback = $this->routes[$method][$path] ?? false;
        
        if($callback === false) {
        // als Path niet overeenkomt met routes.
            $this->response->setStatusCode(404);
            echo "Not found";
            // returnen??????
            exit;
        }
        // callback momenteel als je url/nogwat krijg je een error. 
        if(is_string($callback)) {
            return $this->renderView($callback);
            // als Path wel overeenkomt met routes.
            // in de variabele zit de uri request in. Die wordt doorgegeven aan de renderview Method
        }
        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);
    }

    public function renderView( $view)
    {
//        $layoutContent = $this->layoutContent();
//        $viewContent = $this->renderOnlyView($view);
        $mustache = new Mustache_Engine;
        echo $mustache->render(" ");
        include_once Application::$ROOT_DIR."/view/$view.php";
//         return str_replace('{{content}}',$viewContent, $layoutContent);
        // Parameter view zit REQUEST_URI in. Die heb ik nodig om het juiste 
        // bestand te kunnen openen en te renderen.
        // In index wordt gekeken wat de root directory is van het project.
        // Die word in de contructor van application gezet. 
        // Vervolgen roep ik die functie + contructor aan. 
        // Het is een static functie vandaar Application::$ROOT_DIR
    }
}