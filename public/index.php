<?php

require 'Autoloader.php';

// use Core\Application;

AutoLoader::load();

$app = new app\core\Application();
// $router = new app\core\Router();

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');



$app->run();

