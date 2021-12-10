<?php

require 'Autoloader.php';

session_start();

use app\core\Application;

AutoLoader::load();

include '../database/setup.php';

$app = new Application(dirname(__dir__));
$app->run();














