<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public $router;
    public static $app;
    
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->resolve();
    }
}