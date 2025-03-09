<?php
namespace Projeto\Structure;

use Doctrine\DBAL\Connection as DBALConnection;
use Doctrine\DBAL\DriverManager;

require_once(__DIR__.'/../../../vendor/autoload.php');

class DB
{
    protected DBALConnection $connx;
    private array $connxString;
    private string $dbname;
    private string $user;
    private string $password;
    private string $host;
    private string $port;
    private string $driver;

    public function __construct()
    {
        $this->dbname = 'contactsManager';
        $this->user = 'postgres';
        $this->password = 'postgres';
        $this->host = 'localhost';
        $this->port = '5432';
        $this->driver = 'pgsql';
        $this->connxString = 
        [
            'dbname' => $this->dbname,
            'user' => $this->user,
            'password' => $this->password,
            'host' => $this->host,
            'port' => $this->port,
            'driver' => $this->driver,
        ];

        $this->connx = DriverManager::getConnection($this->connxString);
    }

    public function getConnection()
    {
        return $this->connx;
    }
}