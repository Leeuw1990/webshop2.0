<?php
namespace app\core;

// var_dump('Dir name???'.dirname(__dir__, 2));
// $app->run();
// $app->router->get('/', 'home');
// $app->router->get('/contact', 'contact');
// $app = new Application(dirname(__dir__, 2));

// $router->get('/', 'home');
// $router->get('/contact', 'contact');


// $app->run();

class Routes
{
    public static function routesArray()
    {
       $getArray = array (
           'get' => array
           (
               "/" => "home"
           ),
        );
    }
   


}
// array(1) { 
//     ["get"]=> 
//     array(2) 
//     {  
//         ["/"]=> string(4) "home" 
//         ["/contact"]=> string(7) "contact" 
//             }
//          } 
