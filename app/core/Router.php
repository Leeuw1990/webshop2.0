<?php

namespace app\core;

use app\model\ProductModel;
use Loader\Mustache_Loader_ArrayLoader;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

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

    public function renderView($view)
    {

        $mustache = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3).'/view')

        ]);

$data = [ 'name' => 'jeffrey', 'age' => '31', 'lastname' => 'Leeuw'];

        $getProduct = new ProductModel();
        $array = $getProduct->getProduct();
        echo $mustache->render($view, ['data' => $array]);



//



//        $m = new Mustache_Engine;
//echo $m->render('Hello, {{planet}}!', array('planet' => 'World'));

//$this->mustacheEngine = new Mustache_Engine(['loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3) . '/views')]);
//
//echo $this->mustacheEngine->render($data['template'], ['data' => $data]);


        // stap 1: Welke mustache functi heb ik nodig?
        // stap 2: Hardcode iets presenteren/doorgeven.
        // stap 3: dynamisch maken.

//        $layoutContent = $this->layoutContent();
//        $viewContent = $this->renderOnlyView($view);


//        include_once Application::$ROOT_DIR."/view/$view.php";
//         return str_replace('{{content}}',$viewContent, $layoutContent);
        // Parameter view zit REQUEST_URI in. Die heb ik nodig om het juiste 
        // bestand te kunnen openen en te renderen.
        // In index wordt gekeken wat de root directory is van het project.
        // Die word in de contructor van application gezet. 
        // Vervolgen roep ik die functie + contructor aan. 
        // Het is een static functie vandaar Application::$ROOT_DIR
    }


    public function mustacheRender()
    {
//        $mustache = new Mustache_Engine(array(
//            'loader' => new \Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3) . '/view'),
//        ));
//        var_dump($mustache);
//        $m = new Mustache_Engine;
//        echo $m->render('Hello, {{planet}}!', array('planet' => 'world'));





    }




}