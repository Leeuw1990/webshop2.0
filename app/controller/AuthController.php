<?php
namespace app\controller;

class AuthController extends Controller
{
    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }
}
