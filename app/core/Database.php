<?php

namespace app\core;

use mysqli;

class Database
{
    private $connection;

    private $host = 'localhost';
    private $user = 'jleeuw';
    private $password = 'Wachtwoord123!';
    private $name = 'lampenwinkel';

//    private $host = '127.0.0.1';
//    private $user = 'root';
//    private $password = 'root';
//    private $name = 'webshop1';

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->name);
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}

