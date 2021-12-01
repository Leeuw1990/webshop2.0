<?php

namespace app\controller;

use app\core\Application;


class Controller
{
    public function render($view)
    {
        return Application::$app->router->renderView($view);
    }
    // RenderView hebben alle controllers nodig. Om dubbele code te voorkomen. Wordt iedere controller geimplementeerd
    // met de controller class.

}
