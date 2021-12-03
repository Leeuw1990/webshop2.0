<?php

namespace app\core;

// Request class: Is een classe in Object Oriented Programming wat HTTP reqeusts afhandeld.
// Het is verantwoordelijke voor het uitgaande en binnenkomende verkeer.
// https://codeigniter.com/user_guide/incoming/request.html

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // ??: Voorwaarde ?? andere voorwaarde. als de voorwaarde NULL is, geeft hij de andere voorwaarde.
        $position = strpos($path, '?');
        // Hier haal je de informatie op die na de ? komt uit je url.
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
        //$_server[REQUEST_METHOD] = Controlleert of het een get, post, put of head method is/
        //Dat wordt gereturned in kleine letters.
    }
}