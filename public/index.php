<?php

require 'Autoloader.php';
use app\core\Application;
AutoLoader::load();

$app = new Application(dirname(__dir__));
$table = new \app\core\setup();
$table->createProductTable();
$table->createUserTable();
// Ik geef de diretoryname door aan applicatie.php die ik ga gebruiken 
// om een stabiel path te krijgen in router->renderView
$app->run();
// Hierboven wordt de run functie aan geroepen. Die zorg dat alles start wat in de contructor van applicatie zit
// en de Router start.

