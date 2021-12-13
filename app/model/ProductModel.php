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

    public function getShoppingCart($id)
    {
        $sql = "SELECT * FROM products
                INNER JOIN orders ON products.id = orders.product_id
                INNER JOIN users ON orders.user_id = users.id
                WHERE users.id = $id";
        return $this->db->getConnection()->query($sql);
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

    public function orderProduct($productId, $id, $amount)
    {
        $productExists = $this->getShoppingCart($id);
        foreach ($productExists as $val) {
            $currentProduct = $val['product_id'];
        }
        if ($currentProduct !== $productId) {
            $sql = "INSERT INTO orders (product_id, user_id, amount) VALUES ('$productId', '$id', '$amount')";
            if ($this->db->getConnection()->query($sql)) {
                $setNewStock = "UPDATE products SET stock = stock -$amount WHERE id=$id";
                return $this->db->getConnection()->query($setNewStock);
            }
        } else {
            $changeAmount = "UPDATE orders SET amount = amount +$amount WHERE id = $id";
            if ($this->db->getConnection()->query($changeAmount)) {
                $setNewStock = "UPDATE products SET stock = stock -$amount WHERE id=$id";
                return $this->db->getConnection()->query($setNewStock);
            }
        }
        return true;
    }
}
