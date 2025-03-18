<?php  
namespace Projeto\Model;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Projeto\Structure\Model;
use Projeto\Model\TipoContato;
use Projeto\Model\Pessoa;

#[Entity]
#[Table(name : 'ctt.tbcontato')]
class ContatoPessoa extends Model
{

    #[ManyToOne(targetEntity: Pessoa::class, inversedBy: 'contatos')]
    #[JoinColumn(name: 'pesid', referencedColumnName: 'id')]
    private Pessoa $pessoa;

    #[ManyToOne(targetEntity: TipoContato::class, inversedBy: 'contatos')]
    #[JoinColumn(name: 'tipid', referencedColumnName: 'tipid')]
    private TipoContato $tipo;

    #[Id]
    #[Column(type: Types::INTEGER)]
    private int $pesid;

    #[Id]
    #[Column(type: Types::SMALLINT)]
    private int $seq;

    #[Column(type: Types::SMALLINT)]
    private int $tipid;

    #[Column(length: 30, nullable: true)]
    private string $descricao;

    #[Column(type: Types::SMALLINT, options: ["default" => 1])] 
    private int $cttsit;

    // Control property for when creating new contacts because compound primary key
    private int $nextSeq;

    public function __construct()
    {
        parent::__construct();
    }

    public function getPesid()
    {
        return $this->pesid;
    }

    public function getTipo()
    {
        return $this->tipid;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getSituacao()
    {
        return $this->cttsit;
    }    

    public function getSequencia()
    {
        return $this->seq;
    }    

    /*public function getPessoa()
    {
        return $this->pessoa;
    }*/

    public function setTipo($tipo)
    {
        $this->tipid = $tipo;
        return $this;
    }

    public function setDescricao($desc)
    {
        $this->descricao = $desc;
        return $this;
    }

    public function setSituacao($situacao)
    {
        $this->cttsit = $situacao;
        return $this;
    }

    public function buscaDados($pesid = null, $seq = null)
    {
        $query = $this->queryBuilder
            ->select('contato')
            ->from(Self::class, 'contato');
        if(isset($pesid))
        {
            $query->andWhere('contato.pesid = :pesid')
                ->setParameter('pesid', $pesid);
        }
        if(isset($seq))
        {
            $query->andWhere('contato.seq = :seq')
                ->setParameter('seq', $seq);
        }
        $res = $query->getQuery()->getResult(AbstractQuery::HYDRATE_SIMPLEOBJECT);
        return $res;   
    }

    private function getNextSeq()
    {
        $query = $this->queryBuilder
            ->select('MAX(contato.seq)')
            ->from(Self::class, 'contato')
            ->where('pesid = :pesid')
            ->setParameter('pesid', $this->pesid)
            ->getQuery();
        $res = $query->execute(null, AbstractQuery::HYDRATE_SINGLE_SCALAR);
        return $res;
    }

    public function getAll()
    {
        $query = $this->queryBuilder
            ->select('contatos')
            ->from(Self::class, 'contatos')
            ->getQuery();
        $res = $query->getResult();
        return $res;
    }
}