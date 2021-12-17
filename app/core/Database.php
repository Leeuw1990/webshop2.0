<?php

namespace app\core;

use app\controller\Controller;
use app\core\Dotenv;

use mysqli;

class Database
{
    private $connection;

//    private $host = 'localhost';
//    private $user = 'jleeuw';
//    private $password = 'Wachtwoord123!';
//    private $name = 'lampenwinkel';

    public function __construct() {
        $dbDetails = new Dotenv(dirname(__dir__, 2). "/.env");
        $dbDetails->load();
        $host = getenv('DATABASE_HOST');
        $user = getenv('DATABASE_USER');
        $pass = getenv('DATABASE_PASSWORD');
        $name = getenv('DATABASE_NAME');

        $this->connection = new mysqli($host, $user, $pass, $name);
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}

//private $host = '127.0.0.1';
//private $user = 'root';
//private $password = 'root';
//private $name = 'webshop1';