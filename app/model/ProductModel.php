<?php

namespace app\model;

use app\core\Database;

class ProductModel
{
    private $db;
    private $products = 'products';

    private $nameProduct = '$nameProduct';
    private $brand = '$brand';
    private $specification = '$specification';
    private $fitting = 'fitting';
    private $price ='$price';
    private $description ='$description';
    private $stock ='$stock';



    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProduct()
    {
//        $sql = "SELECT * FROM $this->products INNER JOIN category ON category_id";
        $sql = "SELECT p.id, nameProduct, brand, specification, fitting, price, description, stock, category_name FROM products AS p INNER JOIN category ON p.id = category.`id`";
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

    public function updateProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $id, $categoryId)
    {
        $sql = "UPDATE products SET nameproduct='$nameProduct', brand='$brand', specification='$specification',
                                    fitting='$fitting', price='$price', description='$description', stock='$stock', category_id='$categoryId' WHERE id=$id";
        return $this->db->getConnection()->query($sql);
    }

    public function createProduct($nameProduct, $brand, $specification, $fitting, $price, $description, $stock, $categoryId)
    {
        $sql = "INSERT INTO products (nameProduct, brand, specification, fitting, price, description, stock, category_id) 
        VALUES ('$nameProduct', '$brand', '$specification', '$fitting', '$price', '$description', '$stock', '$categoryId')";
        return $this->db->getConnection()->query($sql);
    }
}
