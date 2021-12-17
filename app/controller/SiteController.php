<?php

namespace app\controller;

use app\model\UserModel;

class SiteController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function home()
    {
        $name = $_SESSION['firstName'] ?? "";
        $this->render('home', $name);
    }

    public function account()
    {
        $userId = $_SESSION['id'] ?? "";
        $this->render('account', $this->users->getUser($userId));
    }

    public function wallet()
    {
        $wallet = $_POST['wallet'];
        $userId = $_SESSION['id'] ?? "";
        $this->users->updateWallet($wallet, $userId);
        header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/account");
    }



}