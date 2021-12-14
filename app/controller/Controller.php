<?php

namespace app\controller;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
session_start();
abstract class Controller
{

    public function render($view, $data)
    {
        $id = $_SESSION['id'] ?? '';
        $roles = $_SESSION['role_id'] ?? '';
//        $firstName = $_SESSION['firstName'];


        $mustache = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3).'/view')
        ]);

        $test = [];

        $test['name'] = 'jeffrey';
        $test['id'] = 6;

        echo $mustache->render($view, ['data' => $test]);
    }
}
