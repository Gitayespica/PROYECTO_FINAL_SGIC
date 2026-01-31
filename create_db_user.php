<?php
// create_db_user.php

$pdo = new PDO("mysql:host=127.0.0.1", "root", ""); // intenta conectar como root
$pdo->exec("CREATE DATABASE IF NOT EXISTS sgic_db");
$pdo->exec("CREATE USER IF NOT EXISTS 'laravel'@'localhost' IDENTIFIED WITH mysql_native_password BY 'laravel123'");
$pdo->exec("GRANT ALL PRIVILEGES ON sgic_db.* TO 'laravel'@'localhost'");
$pdo->exec("FLUSH PRIVILEGES");

echo "Usuario laravel creado y base de datos sgic_db lista\n";
