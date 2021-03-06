<?php

            $conn = new app\core\Database();
            $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nameProduct VARCHAR(30) NOT NULL,
        brand VARCHAR(30) NOT NULL,
        specification VARCHAR(225) NOT NULL,
        fitting VARCHAR(30) NOT NULL,
        price DECIMAL (6,2) NOT NULL,
        description VARCHAR(255) NOT NULL,
        stock INTEGER(6) NOT NULL,
        category_id INT(6), 
        FOREIGN KEY (category_id) REFERENCES `category`(id)
        )";
            if ($conn->getConnection()->query($sql) === TRUE);

        $sql1 = "CREATE TABLE IF NOT EXISTS users (
		id INT(6) AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(30) NOT NULL,
        lastName VARCHAR(30) NOT NULL,
        email VARCHAR(45) NOT NULL UNIQUE,
        password VARCHAR(225) NOT NULL,
        postal VARCHAR(8) NOT NULL,
        streetName VARCHAR(100) NOT NULL,
        city VARCHAR(45) NOT NULL,
        country VARCHAR(45) NOT NULL,
        houseNumber INT(6) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        wallet DECIMAL(6,2)
        )";
        if($conn->getConnection()->query($sql1) === TRUE);

        $roles = "CREATE TABLE IF NOT EXISTS roles (
        role_id INT(6) NOT NULL AUTO_INCREMENT,
        role_name VARCHAR(15) NOT NULL,
        PRIMARY KEY (role_id)
        )";
        if($conn->getConnection()->query($roles) === TRUE);

        $roleUser = "CREATE TABLE IF NOT EXISTS users_roles (
        user_id INTEGER NOT NULL,
        role_id INTEGER NOT NULL,

        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (role_id) REFERENCES roles(role_id)
        )";
        if($conn->getConnection()->query($roleUser) === TRUE);

        $catProd = "CREATE TABLE IF NOT EXISTS catergory_products (
        product_id INTEGER NOT NULL,
        catergory_id INTEGER NOT NULL,

        FOREIGN KEY (product_id) REFERENCES users(id),
        FOREIGN KEY (catergory_id) REFERENCES catergory(catergory_id))";


        $cat = "CREATE TABLE IF NOT EXISTS category (
        id INT(6) NOT NULL AUTO_INCREMENT,
        category_name VARCHAR(60) NOT NULL,
        PRIMARY KEY (id))";
        if($conn->getConnection()->query($cat) === TRUE);

$orders = "CREATE TABLE IF NOT EXISTS orders (id INT(6) AUTO_INCREMENT PRIMARY KEY,
                product_id INT(6),
                user_id INT(6),
                amount INT(6),
                FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE CASCADE)";
        if($conn->getConnection()->query($orders) === TRUE);












