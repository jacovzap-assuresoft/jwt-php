<?php

$db = DBConnection::getInstance();

$db->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        name TEXT,
        lastname TEXT,
        email TEXT,
        password TEXT
    )');

$db->exec('CREATE TABLE IF NOT EXISTS orders (
        id INTEGER PRIMARY KEY,
        user_id INTEGER,
        product TEXT,
        quantity INTEGER,
        total_price REAL,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )');


//create some users
$db->exec("INSERT INTO users (name, lastname, email, password) VALUES ('Pedro', 'Pepe', 'pepe@gmail.com', '123456')");
$db->exec("INSERT INTO users (name, lastname, email, password) VALUES ('Juan', 'Perez', 'juan@gmail.com', '123456')");