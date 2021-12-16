<?php

namespace app\controller;

use app\controller\Controller;
use app\core\Request;
use app\model\UserModel;

// $this: Het is een referentie naar het huidige object.
// WAT IS EEN CONTROLLER?:
//

class SiteController extends Controller
{
    public function home()
    {
        $name = $_SESSION['firstName'] ?? "";
        $this->render('home', $name);
    }

    public function account()
    {
        $userId = $_SESSION['id'] ?? "";
        $getUser = new UserModel();
        $user = $getUser->getUser($userId);
        $this->render('account', $user);
    }

    public function wallet()
    {
        $wallet = $_POST['wallet'];
        $userId = $_SESSION['id'] ?? "";
        $getUser = new UserModel();
        $saldo = $getUser->updateWallet($wallet, $userId);
        $this->render('account', $saldo);
        header("Location: ".$this->baseUrl($_SERVER['HTTP_REFERER'])."/account");
    }



}