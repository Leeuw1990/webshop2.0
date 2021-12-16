<?php
namespace app\controller;

use app\model\UserModel;

class AuthController extends Controller
{

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email && $password) {
            $login = new UserModel();
            $loginData = $login->login($email, $password);
            $this->render('home', $loginData);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/");
        }
    }

    public function logout()
    {
        $logout = new UserModel();
        $log = $logout->logout();
        $this->render('home', $log);
        header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/");
    }

    public function registerPage()
    {
        $this->render('register', '');
    }

    public function registerUser()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $postal = $_POST['postal'];
        $streetName = $_POST['streetName'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $houseNumber = $_POST['houseNumber'];
        $phone = $_POST['phone'];

        if($firstName && $lastName &&  $email &&  $passwordHash &&  $postal && $streetName &&  $city &&  $country &&  $houseNumber &&  $phone) {
            $register = new UserModel();
            $registerPost = $register->register($firstName, $lastName, $email, $passwordHash, $postal, $streetName, $city, $country, $houseNumber, $phone);
            $this->render('register', $registerPost);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/");
        }
    }

}
