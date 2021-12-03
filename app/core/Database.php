<?php

namespace app\core;

use mysqli;

class Database
{
    private $connection;

    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = 'root';
    private $name = 'webshop1';

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->name);

        if(!$this->connection) {
            echo "Database connection Error ". mysqli_connect_error($this->connection);
        } else {
            echo "Connected!";
        }
    }

    public function getConnection() {
        return $this->connection;
    }

}