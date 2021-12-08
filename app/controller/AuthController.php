<?php
namespace app\controller;

use app\model\UserModel;

class AuthController extends Controller
{
    public function loginPage()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email && $password) {
            $login = new UserModel();
            $loginData = $login->login($email, $password);
            $this->render('/shop', $loginData);
        }

        $this->render('login', '');
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
        $postal = $_POST['postal'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $houseNumber = $_POST['houseNumber'];
        $phone = $_POST['phone'];

        if($firstName && $lastName &&  $email &&  $password &&  $postal &&  $city &&  $country &&  $houseNumber &&  $phone) {
            $register = new UserModel();
            $registerPost = $register->register($firstName, $lastName, $email, $password, $postal, $city, $country, $houseNumber, $phone);
            $this->render('register', $registerPost);
        }
    }

}
