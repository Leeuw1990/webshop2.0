<?php
namespace app\controller;
use app\controller\Controller;
use app\core\Request;
use app\model\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register()
    {
        return $this->render('register');
    }




}
