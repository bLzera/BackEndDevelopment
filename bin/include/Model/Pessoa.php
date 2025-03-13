<?php
namespace Projeto\Model;
require_once(__DIR__."/../../../vendor/autoload.php");

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\OneToMany;
use Projeto\Structure\Model;

#[Entity]
#[Table(name: 'ctt.tbpessoa')]
class Pessoa extends Model
{
    #[Id]
    #[Column(type: Types::INTEGER), GeneratedValue(strategy: 'SEQUENCE')]
    protected int $pesid;

    #[Column(type: Types::STRING, length: 50)]
    private string $pesnome;

    #[Column(type: Types::STRING, length: 11)]
    private string $cpf;

    #[Column(type: Types::INTEGER)]
    private int $pessit;

    #[OneToMany(targetEntity: ContatoPessoa::class, mappedBy: 'pessoa')]
    private Collection $contatos;


    public function __construct()
    {
        parent::__construct();
    }

    protected function createPessoa($nome, $cpf)
    {
        $this->pesnome = $nome;
        $this->cpf = $cpf;
        $this->contatos = new ArrayCollection();
    }

    //TODO : Redefinir método de busca
    // Se possível, encontrar uma função de %getResult% que retorne objetos
    public function getAll()
    {
        $query = $this->queryBuilder->select('i.pesnome', 'i.cpf')->from(Pessoa::class, 'i')->getQuery();
        $res = $query->getResult();
        return $res;
    }

    public function getPesnome()
    {
        return $this->pesnome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    
    public function getPesid()
    {
        return $this->pesid;
    }

    public function getPessit()
    {
        return $this->pessit;
    }

    public function getContatos()
    {
        return $this->contatos;
    }

    private function setPesnome($nome)
    {
        $this->pesnome = $nome;
        return $this;
    }

    private function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }
}

