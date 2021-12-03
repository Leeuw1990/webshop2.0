<?php
namespace app\core;
use app\controller\ProductController;
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
               '/contact'=> [SiteController::class ,'contact'],
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register'],
               '/shop' => [ProductController::class, 'shop']
           ),
           'post' => array(
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register']
           )
        );
       // Multidemensional array: Met alle get en post requests.
    }
}



