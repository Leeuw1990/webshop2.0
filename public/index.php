<?php

require 'Autoloader.php';

use app\core\Application;

AutoLoader::load();

include '../database/setup.php';

$app = new Application(dirname(__dir__));
$app->run();














