<?php
require 'Autoloader.php';

use app\core\Application;
use app\model\ProductModel;

AutoLoader::load();

$app = new Application(dirname(__dir__));
$app->run();






