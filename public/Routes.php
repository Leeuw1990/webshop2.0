<?php

require '../view/BasePage.php';
require '../view/Home.php';
include_once '../app/Request.php';
include_once '../app/Router.php';

$router = new Router(new Request);

$router->get('/', function() {
    return <<<HTML
    <h1>Hello world</h1>
  HTML;
  });

$router->get('/home', function($request) {
    return <<<HTML
    <h1>Home</h1>
  HTML;
  });


$router->get('/shop', function($request) {
  return <<<HTML
  <h1>Shop</h1>
HTML;
});

$router->get('/login', function($request) {
    return <<<HTML
    <h1>Login</h1>
  HTML;
  });

$router->get('/register', function($request) {
    return <<<HTML
    <h1>Register</h1>
  HTML;
  });

$router->post('/data', function($request) {

  return json_encode($request->getBody());
});