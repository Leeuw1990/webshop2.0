<?php

require 'Autoloader.php';
use app\core\Application;
AutoLoader::load();


//$config = [
//    'db' => [
//        'host' => $_ENV['host'],
//        'user' => $_ENV['root'],
//        'password' => $_ENV['root'],
//        'name' => ['webshop1'],
//    ]
//];




$app = new Application(dirname(__dir__));
// Ik geef de diretoryname door aan applicatie.php die ik ga gebruiken 
//om een stabiel path te krijgen in router->renderView
$app->run();

