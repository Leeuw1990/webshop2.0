<?php

class Autoloader 
{

 public static function load() {

 spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    // in de variabel classname wordt de classname + name space in opgeslagen.
    // var_dump($className);
    $filename = dirname(__dir__, 1) . DIRECTORY_SEPARATOR . $className . '.php';
    // dirname(__dir__, 1) = vollige dir path min 1 dir.
    // in file name word er gekeken de dir path en vervolgens namepace + classname aan vast geplakt.
    // var_dump($filename);
    
    if (is_readable($filename)) {
      require_once($filename);
    }
  });

}
}


