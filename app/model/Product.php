<?php

class Product 
{

    private $id;
    private $name;
    // private $specification;
    // private $fitting;
    // private $describtion;
    // private $price;
    // private $stock;

    public function getId() 
    {
        return $this->id;
    }

    public function getname() 
    {
        return $this->name;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }
}