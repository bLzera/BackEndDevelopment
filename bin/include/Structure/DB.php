<?php
namespace Projeto\Structure;

use Doctrine\DBAL\Connection as DBALConnection;
use Doctrine\DBAL\DriverManager;
use Projeto\Config;

require_once(__DIR__.'/../../../vendor/autoload.php');

class DB extends Config
{
    protected DBALConnection $connx;

    public function __construct()
    {
        $this->connx = DriverManager::getConnection($this->connxString);
    }

    public function getConnection()
    {
        return $this->connx;
    }
}