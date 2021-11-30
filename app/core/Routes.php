<?php
namespace app\core;
use app\controller\SiteController;

class Routes
{
    public function routesArray()
    {
       return array (
           'get' => array
           (
               "/" =>  [SiteController::class, 'home'],
               "/contact" => "contact"
           ),
        );
    }
}

//$app->router->get('/', [SiteController::class, 'home']);
//
//$app->router->get('/contact', [SiteController::class, 'contact']);
//
//$app->router->post('/contact', [SiteController::class, 'handleContact']);

