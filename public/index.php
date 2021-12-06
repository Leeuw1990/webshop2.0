<?php
require 'Autoloader.php';

use app\core\Application;

AutoLoader::load();

$app = new Application(dirname(__dir__));
$app->run();


//$mustache = new Mustache_Engine;
//echo $mustache->render('Hello, {{planet}}!', array('planet' => 'World'));
//$mustache = new Mustache_Engine(array(
//    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 2).'/view')
//));
//
//echo $template = $mustache->render('contact');

//



//$m = new Mustache_Engine(array(
//    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 2))
//));
//$this->mustacheEngine = new Mustache_Engine(['loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__, 3) . '/views')]);
//echo $this->mustacheEngine->render($data['template'], ['data' => $data]);
//var_dump(dirname(__FILE__, 2));



//$get = new \app\controller\ProductController();
//var_dump($get->fetchProduct());

//$get = new \app\model\ProductModel();
//$get->getProduct();
// Ik geef de diretoryname door aan applicatie.php die ik ga gebruiken 
// om een stabiel path te krijgen in router->renderView

// Hierboven wordt de run functie aan geroepen. Die zorg dat alles start wat in de contructor van applicatie zit
// en de Router start.

