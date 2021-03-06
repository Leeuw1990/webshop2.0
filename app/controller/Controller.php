<?php

namespace app\controller;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
session_start();
abstract class Controller
{
    function baseUrl($url): string
    {
        $result = parse_url($url);
        return $result['scheme']."://".$result['host'];
    }

    public function render($view, $data)
    {
        $mustache = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3) . '/view')
        ]);

        $session = [];
        $session['id'] = $_SESSION['id'] ?? "";
        $session['firstName'] = $_SESSION['firstName'] ?? "";
        $session['admin'] = false;

        if($_SESSION['role_id'] ?? '') {
                if ($_SESSION['role_id'] == '2') {
                    $session['admin'] = true;
                }
        }
        echo $mustache->render($view, ['data' => $data, 'session' => $session]);
    }
}
