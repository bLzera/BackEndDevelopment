<?php

declare(strict_types = 1);

require_once(__DIR__.'/../../../vendor/autoload.php');

$dbname = 'contactsManager';
$user = 'postgres';
$password = 'postgres';
$host = 'localhost';
$port = '5432';
$driver = 'pgsql';

$connectionString = 
[
    'dbname' => $dbname,
    'user' => $user,
    'password' => $password,
    'host' => $host,
    'port' => $port,
    'driver' => $driver
];

$connx = \Doctrine\DBAL\DriverManager::getConnection($connectionString);