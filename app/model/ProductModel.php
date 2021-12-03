<?php

namespace app\model;

use app\core\Database;
use app\core\Model;

class ProductModel extends Model
{
    public $id;
    public $name;
    public $specification;
    public $fitting;
    public $describtion;
    public $price;
    public $stock;

    public function getProduct()
    {
        $connection = new Database();
        $sql = "SELECT * FROM products";
        $result = $connection->getConnection()->query($sql);
        foreach ($result as $key => $value) {
            echo $value['nameProduct'] ." ".$value['price']." ". $value['brand'] ." ".$value['describtion']." ". $value['stock']."</br>";
        }
//        return $result;
    }

    public function postProduct()
    {

    }

    public function updateProduct()
    {

    }

    public function deleteProduct()
    {

    }


    public function rules(): array
    {
        return 'nothing';
    }
}