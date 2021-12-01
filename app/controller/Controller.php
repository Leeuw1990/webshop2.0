<?php

namespace app\controller;

use app\core\Application;


class Controller
{
    public function render($view)
    {
        return Application::$app->router->renderView($view);
    }

}
