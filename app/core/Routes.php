<?php
namespace app\core;
use app\controller\AdminController;
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
               '/admin'=> [AdminController::class ,'admin'],
               '/register' => [AuthController::class, 'registerPage'],
               '/shop' => [ProductController::class, 'shop'],
               '/shopdelete' => [ProductController::class, 'deleteShopProduct'],
               '/update' => [ProductController::class, 'update']
           ),
           'post' => array(
               '/logout' => [AuthController::class, 'logout'],
               '/login' => [AuthController::class, 'login'],
               '/registeruser' => [AuthController::class, 'registerUser'],
               '/createproduct' => [ProductController::class, 'createShopProduct'],
               '/updateproduct' => [ProductController::class, 'updateShopProduct']
           )
        );
    }
}



