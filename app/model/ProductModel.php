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
        return $connection->getConnection()->query($sql);
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