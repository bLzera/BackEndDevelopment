<?php
namespace Projeto;

class Config
{
    const TIPO_TELA = [        
            "1" => "Consulta",
            "2" => "Cadastra"
    ];

    protected array $connxString;
    protected string $dbname;
    protected string $user;
    protected string $password;
    protected string $host;
    protected string $port;
    protected string $driver;

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
    }
}