<?php

namespace app\model;

use app\core\Database;
use app\core\Model;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        return $this->db->getConnection()->query($sql);
    }

    public function register($firstName, $lastName, $email, $password, $postal, $city, $country, $houseNumber, $phone)
    {
        $sql = "INSERT INTO users(firstName, lastName, email, password, postal, city, country, houseNumber, phone)
                VALUES('$firstName', '$lastName', '$email', '$password', '$postal', '$city', '$country', '$houseNumber', '$phone')";
        $this->db->getConnection()->query($sql);
    }

    public function login()
    {

    }




}