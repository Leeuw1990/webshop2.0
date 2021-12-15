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
               '/account' =>  [SiteController::class, 'account'],
               '/admin'=> [AdminController::class ,'admin'],
               '/register' => [AuthController::class, 'registerPage'],
               '/shop' => [ProductController::class, 'shop'],
               '/product' => [ProductController::class, 'productById'],
               '/shopping' => [ProductController::class, 'getShoppingCart'],
               '/shopdelete' => [ProductController::class, 'deleteShopProduct'],
               '/update' => [ProductController::class, 'update']
           ),
           'post' => array(
               '/logout' => [AuthController::class, 'logout'],
               '/login' => [AuthController::class, 'login'],
               '/registeruser' => [AuthController::class, 'registerUser'],
               '/createproduct' => [ProductController::class, 'createShopProduct'],
               '/updateproduct' => [ProductController::class, 'updateShopProduct'],
               '/addtocart' => [ProductController::class, 'order'],
               '/saldo' =>  [SiteController::class, 'wallet'],
           )
        );
    }
}



