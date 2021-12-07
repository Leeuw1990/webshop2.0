<?php

class Autoloader
{
    public static function load()
    {
        spl_autoload_register(function ($className)
        {
            if (strpos($className, '_')) {
                $className = str_replace("_", "/", $className);
                $filename = dirname(__dir__, 1) . DIRECTORY_SEPARATOR . $className . '.php';
            }
            $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
            $filename = dirname(__dir__, 1) . DIRECTORY_SEPARATOR . $className . '.php';
            if (is_readable($filename))
            {
                require_once($filename);
            }
        });
    }
}


