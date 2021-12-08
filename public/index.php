<?php
require 'Autoloader.php';
session_start();

use app\core\Application;
use app\model\ProductModel;

var_dump($_SESSION['firstName']);

AutoLoader::load();

$app = new Application(dirname(__dir__));
$app->run();

$d = new \app\model\UserModel();
$d->login('test', 'test');






