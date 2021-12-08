<?php
require 'Autoloader.php';
session_start();

use app\core\Application;

AutoLoader::load();

$app = new Application(dirname(__dir__));
$app->run();








