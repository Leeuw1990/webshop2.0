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
               '/shop' => [ProductController::class, 'shop'],
               '/shopdelete' => [ProductController::class, 'deleteShopProduct'],
               '/shopupdate' => [ProductController::class, 'deleteShopProduct']
           ),
           'post' => array(
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register'],
               '/createproduct' => [ProductController::class, 'createShopProduct']
           )
        );
    }
}



