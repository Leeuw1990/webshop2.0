<?php

namespace app\model;

use app\core\Database;
use app\core\Model;

class ProductModel
{
    public $id;
    public $nameProduct;
    public $brand;
    public $specification;
    public $fitting;
    public $description;
    public $price;
    public $stock;
    public $test;

    public function getProduct()
    {
        $connection = new Database();
        $sql = "SELECT * FROM products";
        return $connection->getConnection()->query($sql);
    }

    public function getProductById($id)
    {
        $connection = new Database();
        $sql = "SELECT * FROM products WHERE id=$id";
        return $connection->getConnection()->query($sql);
    }

    public function deleteProduct($id)
    {
        $connection = new Database();
        $sql = "DELETE FROM products WHERE id=$id";
        return $connection->getConnection()->query($sql);
    }

    public function updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $id)
    {
        $connection = new Database();
        $sql = "UPDATE products SET nameProduct='$nameProduct', brand='$brand', specification='$specification',
                                    fitting='$fitting', price='$price', description='$description', stock='$stock' WHERE id=$id";
        return $connection->getConnection()->query($sql);

    }

    public function createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock)
    {
        $connection = new Database();
        $sql = "INSERT INTO products (nameProduct, brand, specification, fitting, price, description, stock) 
        VALUES ('$nameProduct', '$brand', '$specification', '$fitting', '$price', '$description', '$stock')";
        return $connection->getConnection()->query($sql);
    }
}
