<?php

namespace app\controller;

use app\controller\Controller;
use app\core\Request;

// $this: Het is een referentie naar het huidige object.

class SiteController extends Controller
{
    public function contact()
    {
        return $this->render('contact');
    }

    public function home()
    {
        return $this->render('home');
    }

    public function shop()
    {
        return $this->render('shop');
    }


    public function handleContact(Request $request)
    {

    }



}