<?php
namespace app\controller;

use app\model\UserModel;

class AuthController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email && $password) {
            $this->users->login($email, $password);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/");
        }
    }

    public function logout()
    {
        $this->users->logout();
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
            $this->users->register($firstName, $lastName, $email, $passwordHash, $postal, $streetName, $city, $country, $houseNumber, $phone);
            header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/");
        }
    }
}
