<?php

namespace app\controller;
use app\core\Database;
use app\model\ProductModel;

class ProductController extends Controller
{

    public function shop()
    {
        $getProduct = new ProductModel();
        $productData = $getProduct->getProduct();
        $this->render('shop', $productData);
    }

    public function update()
    {
        $id = $_GET['id'] ?? "";
        if($id) {
            $getProductById = new ProductModel();
            $dataById = $getProductById->getProductById($id);
            $this->render('update', $dataById);
        }
    }

    public function deleteShopProduct()
    {
        $id = $_GET['id'] ?? "";
        if($id) {
            $deleteProduct = new ProductModel();
            $deleteData = $deleteProduct->deleteProduct($id);
            $this->render('shop', $deleteData);
        }
    }

    public function updateShopProduct()
    {
        $nameProduct = $_POST['nameProduct'] ?? "";
        $brand = $_POST['brand'] ?? "";
        $specification = $_POST['specification'] ?? "";
        $fitting = $_POST['fitting'] ?? "";
        $price = $_POST['price'] ?? "";
        $description = $_POST['description'] ?? "";
        $stock = $_POST['stock'] ?? "";
        $id = $_POST['id'] ?? "";
        var_dump($id);
        if($nameProduct && $brand && $specification && $fitting && $price && $description && $stock && $id) {
            $updateProduct = new ProductModel();
            $updateData = $updateProduct->updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $id);
            $this->render('shop', $updateData);
        }
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