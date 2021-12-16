<?php

namespace app\controller;
use app\model\ProductModel;

class ProductController extends Controller
{
    public function getShoppingCart()
    {
        $id = $_SESSION['id'] ?? "";
        $cart = new ProductModel();
        $cartData = $cart->getShoppingCart($id);
        $this->render('shopping', $cartData);
    }

    public function order()
    {
        $productId = $_POST['product_id'] ?? "";
        $id = $_SESSION['id'] ?? "";
        $amount = $_POST['amount'] ?? "";

        if ($productId && $id && $amount) {
            $order = new ProductModel();
            $orderData = $order->orderProduct($productId, $id, $amount);
            $this->render('shop', $orderData);
            header('Location: https://lampenwinkel.jeffrey.experiustrainee.nl/shop');
        }
    }

    public function shop()
    {
        $getProduct = new ProductModel();
        $productData = $getProduct->getProduct();
        $this->render('shop', $productData);
    }

    public function productById()
    {
        $id = $_GET['id'] ?? "";
        if ($id) {
            $getProductById = new ProductModel();
            $dataById = $getProductById->getProductById($id);
            $this->render('product', $dataById);
        }
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
            header('Location: https://lampenwinkel.jeffrey.experiustrainee.nl/admin');
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
            $updateProduct = new ProductModel();
            $updateData = $updateProduct->updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $categoryId, $id);
            $this->render('shop', $updateData);
            header('Location: https://lampenwinkel.jeffrey.experiustrainee.nl/admin');
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
            $createProduct = new ProductModel();
            $create = $createProduct->createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $categoryId);
            $this->render('shop', $create);
            header('Location: https://lampenwinkel.jeffrey.experiustrainee.nl/admin');
        }
    }
}