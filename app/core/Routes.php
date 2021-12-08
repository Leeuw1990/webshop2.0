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
               '/contact'=> [SiteController::class ,'contact'],
               '/admin'=> [AdminController::class ,'admin'],

               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register'],
               '/shop' => [ProductController::class, 'shop'],
               '/shopdelete' => [ProductController::class, 'deleteShopProduct'],
               '/update' => [ProductController::class, 'update']
           ),
           'post' => array(
               '/login' => [AuthController::class, 'login'],
               '/register' => [AuthController::class, 'register'],
               '/createproduct' => [ProductController::class, 'createShopProduct'],
               '/updateproduct' => [ProductController::class, 'updateShopProduct']
           )
        );
    }
}



