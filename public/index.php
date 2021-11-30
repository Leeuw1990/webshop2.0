<?php

require 'Autoloader.php';

// use Core\Application;

AutoLoader::load();
$app = new app\core\Application(dirname(__dir__));
// Ik geef de diretoryname door aan applicatie.php die ik ga gebruiken 
//om een stabiel path te krijgen in router->renderView

// $router = new app\core\Router();


$app->router->get('/', [new app\controller\SiteController, 'home']);

$app->router->get('/contact', [new app\controller\SiteController, 'contact']);

$app->router->post('/contact', [new app\controller\SiteController, 'handleContact']);

$app->run();

