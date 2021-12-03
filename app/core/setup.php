<?php

namespace app\core;

        $conn = new Database();

        $sql = "CREATE TABLE IF NOT EXISTS products (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nameProduct VARCHAR(30) NOT NULL,
        brand VARCHAR(30) NOT NULL,
        price DOUBLE(6,2) NOT NULL,
        describtion VARCHAR(255) NOT NULL,
        stock INTEGER(6) NOT NULL)";
        if($conn->getConnection()->query($sql) === TRUE);

        $sql1 = "CREATE TABLE IF NOT EXISTS users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userName VARCHAR(30) NOT NULL UNIQUE,
        firstName VARCHAR(30) NOT NULL,
        lastName VARCHAR(30) NOT NULL,
        email VARCHAR(45) NOT NULL UNIQUE,
        password VARCHAR(225) NOT NULL)";
        if($conn->getConnection()->query($sql1) === TRUE);




