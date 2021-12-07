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

    public function deleteProduct($id)
    {
        var_dump("Model: ".$id);
        $connection = new Database();
        $sql = "DELETE FROM products WHERE id=$id";
        var_dump("SQL: ".$sql);
        return $connection->getConnection()->query($sql);
    }

    public function updateProduct()
    {

    }

    public function createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock)
    {
        $connection = new Database();
        $sql = "INSERT INTO products (nameProduct, brand, specification, fitting, price, description, stock) 
        VALUES ('$nameProduct', '$brand', '$specification', '$fitting', '$price', '$description', '$stock')";
        return $connection->getConnection()->query($sql);
    }
}
