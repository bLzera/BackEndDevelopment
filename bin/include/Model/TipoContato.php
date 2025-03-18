<?php
namespace Projeto\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Projeto\Structure\Model;

#[Entity()]
#[Table(name: 'ctt.tbtipocontato')]
class TipoContato extends Model
{

    #[Id]
    #[Column(name: 'tipid', type: Types::INTEGER), GeneratedValue(strategy: 'IDENTITY')]
    private int $tipid;

    #[Column(name: 'tipdesc', type: Types::STRING, length: 20)]
    private string $tipdesc;

    #[OneToMany(targetEntity: ContatoPessoa::class, mappedBy: 'tipo')]
    private Collection $contatos;

    public function __construct()
    {
        $this->contatos = new ArrayCollection();
    }

    public function getTipid()
    {
        return $this->tipid;
    }

    public function getTipdesc()
    {
        return $this->tipdesc;
    }

    public function createTipoContato($descricao)
    {
        $this->tipdesc = $descricao;
    }

}