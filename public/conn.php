<?php

// !!! Esta conexão é apenas de exemplo, não segue nenhuma boa prática de desenvolvimento!!!

$host = 'db';
$port = '3306';
$database = 'security';
$user = 'root';
$password = 'root';

$conStr = sprintf(
    "mysql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
    $host,
    $port,
    $database,
    $user,
    $password,
);
$conn = new PDO($conStr);
$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
