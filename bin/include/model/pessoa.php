<?php
namespace Projeto\Model;
use Projeto\Structure\Model as Model;
require_once(__DIR__."/../../../vendor/autoload.php");

class Pessoa extends Model
{
    private int $pesid;
    private string $pesnome;
    private string $cpf;
    private int $pessit;


    public function __contruct($nome, $cpf)
    {
        $this->pesnome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome()
    {
        return $this->pesnome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    
    public function getId()
    {
        return $this->pesid;
    }

    public function getSit()
    {
        return $this->pessit;
    }

    private function setNome($nome)
    {
        $this->pesnome = $nome;
    }

    private function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}