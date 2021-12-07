<?php

namespace app\controller;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

abstract class Controller
{
    public function render($view, $data)
    {
        $mustache = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3).'/view')
        ]);
        echo $mustache->render($view, ['data' => $data]);
    }
}
