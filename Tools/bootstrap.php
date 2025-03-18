<?php
namespace Tools;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once ('../vendor/autoload.php');

$dbname = 'contactsManager';
$user = 'postgres';
$password = 'postgres';
$host = 'localhost';
$port = '5432';
$driver = 'pgsql';

$connxString = [
        'dbname' => $dbname,
        'user' => $user,
        'password' => $password,
        'host' => $host,
        'port' => $port,
        'driver' => $driver,
];

$modelsPath = ['../bin/include/Model'];

$connxConfig = ORMSetup::createAttributeMetadataConfiguration($modelsPath);
$connx = DriverManager::getConnection($connxString, $connxConfig);

$em = new EntityManager($connx, $connxConfig);

return $em;