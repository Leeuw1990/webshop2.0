<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public $router;
    public static $app;
    public $database;
    
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router();
        $this->database = new Database();
    }

    public function run()
    {
        $this->router->resolve();
    }
}