<?php

class Router {

  public static function getPage() {
    $request_path = $_SERVER['REQUEST_URI'];
    $request_components = explode('/', $request_path);
    array_shift($request_components);

    switch ($request_components[0]) {
      case '':
      case 'home':
        return new Home();
      case 'login':
        return new Login();
      case 'register':
        return new Register();
      case 'shop':
        return new Shop();
      default:
        return new ErrorPage();
    }
  }
}