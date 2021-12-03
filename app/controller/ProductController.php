<?php

namespace app\controller;

use app\core\Request;
use app\model\ProductModel;

class ProductController extends Controller
{
    public function shop()
    {
//         uit model alle producten halen
//         meegeven aan render functie
        $getProduct = new ProductModel();
        return $this->render('shop');

    }


//    public function fetchProduct()
//    {
//     MIJN VRAAG!
//     Is dit de bedoeling?
//        $getProduct = new ProductModel();
//        return $this->render($getProduct->getProduct());
//    }



}