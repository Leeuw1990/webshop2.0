<?php

namespace app\controller;
use app\core\Application;

class SiteController
{

    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public function home()
    {
        return Application::$app->router->renderView('home');
    }



}