<?php
namespace app\core;
use app\controller\SiteController;
use app\controller\AuthController;


class Routes
{
    public function routesArray()
    {
       return array (
           'get' => array
           (
               '/' =>  [SiteController::class, 'home'],
               '/contact '=> [SiteController::class ,'contact'],
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register']
           ),
           'post' => array(
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register']
           )
        );
    }
}



