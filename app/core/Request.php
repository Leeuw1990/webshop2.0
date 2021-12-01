<?php

namespace app\core;

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

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);

            }
        }
        return $body;
    }
}