<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public $router;
    public $request;
    public $response;
    public static $app;
    public $database;
    
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database();
    }

    public function run()
    {
        $this->router->resolve();
    }
}