<?php

require 'Autoloader.php';

// use Core\Application;

AutoLoader::load();


$app = new app\core\Application(dirname(__dir__));
$app->run();
// Ik geef de diretoryname door aan applicatie.php die ik ga gebruiken 
//om een stabiel path te krijgen in router->renderView

// $router = new app\core\Router();

// $app->router->get('/', 'home');
// $app->router->get('/contact', 'contact');


