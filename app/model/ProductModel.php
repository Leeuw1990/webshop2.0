<?php

namespace app\model;

use app\core\Database;

class ProductModel
{
    private $db;
    private $products = 'products';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProduct()
    {
        $sql = "SELECT * FROM $this->products";
        return $this->db->getConnection()->query($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id=$id";
        return $this->db->getConnection()->query($sql);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->db->getConnection()->query($sql);
    }

    public function updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $id)
    {
        $sql = "UPDATE products SET nameProduct='$nameProduct', brand='$brand', specification='$specification',
                                    fitting='$fitting', price='$price', description='$description', stock='$stock' WHERE id=$id";
        return $this->db->getConnection()->query($sql);
    }

    public function createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock)
    {
        $sql = "INSERT INTO products (nameProduct, brand, specification, fitting, price, description, stock) 
        VALUES ('$nameProduct', '$brand', '$specification', '$fitting', '$price', '$description', '$stock')";
        return $this->db->getConnection()->query($sql);
    }
}
