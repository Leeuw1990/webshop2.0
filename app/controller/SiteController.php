<?php

namespace app\controller;

use app\controller\Controller;

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



}