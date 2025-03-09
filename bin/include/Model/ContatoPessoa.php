<?php  
namespace Projeto\Model;
require_once(__DIR__."/../../../vendor/autoload.php");

use Projeto\Structure\Model as Model;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Tools\ResolveTargetEntityListener;

#[Entity]
#[Table(name : 'ctt.tbcontato')]
class ContatoPessoa extends Pessoa
{
    #[ManyToOne(inversedBy: 'contatos')]
    private Pessoa $pessoa;

    private int $seq;
    private int $tipid;
    private string $descricao;
    private int $cttsit;

    public function __construct($pes, $sequencia, $tipo, $desc, $situacao)
    {
        $this->pessoa = $pes;
        $this->seq = $sequencia;
        $this->tipid = $tipo;
        $this->descricao = $desc;
        $this->cttsit = $situacao;
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

    public function getPessoa()
    {
        return $this->pessoa;
    }

    private function setTipo($tipo)
    {
        $this->tipid = $tipo;
        return $this;
    }

    private function setDescricao($desc)
    {
        $this->descricao = $desc;
        return $this;
    }

    private function setSituacao($situacao)
    {
        $this->cttsit = $situacao;
        return $this;
    }
}