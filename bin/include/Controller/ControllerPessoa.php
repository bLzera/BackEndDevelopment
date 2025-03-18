<?php
namespace Projeto\Controller;

use Projeto\Model\Pessoa;
use Projeto\Structure\Controller;

class ControllerPessoa extends Controller
{

    public function __construct($params)
    {
        parent::__construct($params['tipo']);
    }

    public function createPessoa($nome, $cpf)
    {
        $pessoa = new Pessoa($nome, $cpf);
    }

    public function index()
    {
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new Pessoa();
            $pessoas = $model->getAll();
            $this->getTela()->populaView($pessoas);
            return $this->getTela()->render();
        }        
    }
}