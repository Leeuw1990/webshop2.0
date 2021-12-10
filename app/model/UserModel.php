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

    public function logout()
    {
        unset($_SESSION['firstName']);
        session_destroy();
    }

    public function register($firstName, $lastName, $email, $password, $postal, $city, $country, $houseNumber, $phone)
    {
        $sql = "INSERT INTO users(firstName, lastName, email, password, postal, city, country, houseNumber, phone)
                VALUES('$firstName', '$lastName', '$email', '$password', '$postal', '$city', '$country', '$houseNumber', '$phone')";
        if($this->db->getConnection()->query($sql)) {
            $getUserId = "SELECT id FROM users WHERE email ='$email'";
            $result = $this->db->getConnection()->query($getUserId) ;
            foreach ($result as $value) {
                $id = $value['id'];
            }
            $userRole = "INSERT INTO users_roles (user_id, role_id) VALUES ($id, 1)";
            $this->db->getConnection()->query($userRole);
        } else {
            echo 'Not registered';
        }
    }

    public function login($email, $enteredPassword)
    {
        $sql = "SELECT firstName, email, password, id FROM users WHERE email ='$email'";
        $result =  $this->db->getConnection()->query($sql);
        foreach ($result as $value) {
            $first = $value['firstName'];
            $pass = $value['password'];
            $id = $value['id'];
        }
        if (password_verify($enteredPassword, $pass) === TRUE) {
            echo "Succes!";
            $_SESSION['firstName'] = $first;
            $_SESSION['id'] = $id;
        } else {
            echo 'Invalid!';
        }
    }
}