<?php
namespace Projeto\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Mapping\OneToMany;
use Projeto\Structure\Model;


#[Entity]
#[Table(name: 'ctt.tbpessoa')]
class Pessoa extends Model
{

    #[Id]
    #[Column(type: Types::INTEGER), GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[Column(type: Types::STRING, length: 50)]
    private string $pesnome;

    #[Column(type: Types::STRING, length: 11)]
    private string $cpf;

    #[Column(type: Types::SMALLINT, options: ["default" => 1])]
    private int $pessit;

    #[OneToMany(targetEntity: ContatoPessoa::class, mappedBy: 'pessoa')]
    private Collection $contatos;

    public function __construct()
    {
        parent::__construct();
        $this->contatos = new ArrayCollection();
    }

    public function createPessoa($nome, $cpf)
    {
        $this->pesnome = $nome;
        $this->cpf = $cpf;
        $this->pessit = 1;
    }

    public function buscaDados($id, $nome)
    {
        $query = $this->queryBuilder
            ->select('pessoa')
            ->from(Self::class, 'pessoa');
        if(isset($id))
        {
            $query->andWhere('id = :id')
                ->setParameter('id', $id);                
        }
        if(isset($nome))
        {
            $query->andWhere(
                $query->expr()->like('pesnome', ':nome')
            )->setParameter('nome', $nome);
        }
        $res = $query->getQuery()->getResult(AbstractQuery::HYDRATE_SIMPLEOBJECT);
        return $res;
    }

    public function getAll()
    {
        $query = $this->queryBuilder
            ->select('pessoa')
            ->from(Self::class, 'pessoa')
            ->getQuery();
        $res = $query->getResult(AbstractQuery::HYDRATE_SIMPLEOBJECT);
        return $res;
    }

    public function getContatos()
    {
        return $this->contatos;
    }

    public function getPesnome()
    {
        return $this->pesnome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getPessit()
    {
        return $this->pessit;
    }

    protected function setPesnome($nome)
    {
        $this->pesnome = $nome;
        return $this;
    }

    protected function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }
}

