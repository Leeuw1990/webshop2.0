<?php

namespace app\controller;

use app\model\ProductModel;
use app\model\UserModel;

class AdminController extends Controller
{

    public function admin()
    {
        $getProduct = new ProductModel();
        $productData = $getProduct->getProduct();
        $this->render('admin', $productData);
    }






}