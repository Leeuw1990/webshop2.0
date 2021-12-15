<?php

namespace app\core;

use mysqli;

class Database
{
    private $connection;

    private $host = '127.0.0.1';
    private $user = 'jleeuw';
    private $password = 'Wachtwoord123!';
    private $name = 'lampenwinkel';

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->name);
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