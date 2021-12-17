<?php

namespace app\controller;
use app\model\ProductModel;

class ProductController extends Controller
{
    private $products;

    function __construct()
    {
        $this->products = new ProductModel();
    }

    public function getShoppingCart()
    {
        $id = $_SESSION['id'] ?? "";
        $this->render('shopping', $this->products->getShoppingCart($id));
    }

    public function order()
    {
        $productId = $_POST['product_id'] ?? "";
        $id = $_SESSION['id'] ?? "";
        $amount = $_POST['amount'] ?? "";

        if ($productId && $id && $amount) {
          $this->products->orderProduct($productId, $id, $amount);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/shop");
        }
    }

    public function shop()
    {
        $this->render('shop', $this->products->getProduct());
    }

    public function productById()
    {
        $id = $_GET['id'] ?? "";
        if ($id) {
            $this->render('product', $this->products->getProductById($id));
        }
    }

    public function update()
    {
        $id = $_GET['id'] ?? "";
        if($id) {
            $this->render('update', $this->products->getProductById($id));
        }
    }

    public function deleteShopProduct()
    {
        $id = $_GET['id'] ?? "";
        if($id) {
            $this->products->deleteProduct($id);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/admin");
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
        $categoryId = $_POST['category_id'] ?? "";
        $id = $_POST['id'] ?? "";
        if($nameProduct && $brand && $specification && $fitting && $price && $description && $stock && $categoryId && $id) {
            $this->products->updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $categoryId, $id);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/admin");
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
        $categoryId = $_POST['category_id'] ?? "";

        if($nameProduct || $brand || $specification || $fitting || $price || $description || $stock || $categoryId) {
            $this->products->createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $categoryId);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/admin");
        }
    }
}