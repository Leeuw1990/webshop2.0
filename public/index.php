<?php

require '../view/BrowserRouter.php';
require 'Routes.php';

spl_autoload_register();

$page = BrowserRouter::getPage();
echo $page->render();