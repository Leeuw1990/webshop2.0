<?php

namespace app\controller;
use app\model\ProductModel;

class ProductController extends Controller
{
    public function shop()
    {
        $getProduct = new ProductModel();
        $productData = $getProduct->getProduct();
        $this->render('shop', $productData);
    }

    public function deleteShopProduct()
    {
        $id = $_GET['id'] ?? "";
        var_dump('Controller: '.$_GET['id']);
        if($id) {
            $deleteProduct = new ProductModel();
            $deleteData = $deleteProduct->deleteProduct($id);
            $this->render('shop', $deleteData);
        }
    }

    public function updateShopProduct()
    {

    }

    public function createShopProduct()
    {
        $nameProduct = $_POST['nameProduct'] ?? "";
        $brand = $_POST['brand'] ?? "";
        $specification = $_POST['specification'] ?? "";
        $fitting = $_POST['fitting'] ?? "";
        $price = $_POST['price'] ?? "";
        $description = $_POST['description'] ?? "";
        $stock = $_POST['stock'] ?? "";

        if($nameProduct || $brand || $specification || $fitting || $price || $description || $stock) {
            $createProduct = new ProductModel();
            $create = $createProduct->createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock);
            $this->render('shop', $create);
        }
    }
}