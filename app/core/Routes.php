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
               "/contact" => [SiteController::class ,'contact']
           ),
        );
    }
}



