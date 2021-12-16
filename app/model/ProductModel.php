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
    private $price = '$price';
    private $description = '$description';
    private $stock = '$stock';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getShoppingCart($id)
    {
        $sql = "SELECT * FROM orders
                INNER JOIN products ON orders.product_id = products.id
                WHERE orders.user_id = $id";
        return $this->db->getConnection()->query($sql);

    }


    public function getOrder($id)
    {
        $sql = "SELECT * FROM orders
                 WHERE user_id = $id";
        $orderCollection = $this->db->getConnection()->query($sql);
        return $orderCollection->fetch_all(MYSQLI_ASSOC);
    }

    public function getProduct()
    {
        $sql = "SELECT p.id, nameProduct, brand, specification, fitting, price, description, stock, category_name FROM products AS p INNER JOIN category ON p.category_id = category.`id`";
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
        $productExists = $this->getOrder($id);
        if (empty($productExists)) {
            $this->decreaseStock($productId, $amount);
            return $this->addProductToCart($productId, $id, $amount);
        } else {
            $productIsInCart = false;
            $orderAmount = 0;
            $orderId = '';
            foreach ($productExists as $value) {
                if ($productId == $value['product_id']) {
                    $orderAmount = $value['amount'];
                    $orderId = $value['id'];
                    $productIsInCart = true;
                }
            }
            if ($productIsInCart == true) {
                $newAmount = $orderAmount + $amount;
                $changeAmount = "UPDATE orders SET amount = $newAmount WHERE id = $orderId";
                $this->decreaseStock($productId, $amount);
                return $this->db->getConnection()->query($changeAmount);
            } else {
                $this->decreaseStock($productId, $amount);
                return $this->addProductToCart($productId, $id, $amount);
            }
        }
    }

    public function decreaseStock($id, $amount)
    {
        $setNewStock = "UPDATE products SET stock = stock -$amount WHERE id=$id";
        return $this->db->getConnection()->query($setNewStock);
    }

    public function addProductToCart($productId, $id, $amount)
    {
        $sql = "INSERT INTO orders (product_id, user_id, amount) VALUES ('$productId', '$id', '$amount')";
        return $this->db->getConnection()->query($sql);
    }
}
