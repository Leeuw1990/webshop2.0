<?php

namespace app\controller;

use app\controller\Controller;
use app\core\Request;

// $this: Het is een referentie naar het huidige object.
// WAT IS EEN CONTROLLER?:
//

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

    public function handleContact(Request $request)
    {

    }
}