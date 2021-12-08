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
        $this->render('contact', '');
    }

    public function home()
    {
        $this->render('home', '');
    }

}