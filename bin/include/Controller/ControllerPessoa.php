<?php
namespace Projeto\Controller;

use Projeto\Model\Pessoa as ModelPessoa;
use Projeto\Structure\Controller;

class ControllerPessoa extends Controller
{

    public function __construct($params)
    {
        parent::__construct($params['tipo']);
    }

    public function createPessoa($nome, $cpf)
    {
        $pessoa = new ModelPessoa($nome, $cpf);
    }

    public function index()
    {
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new ModelPessoa();
            $pessoas = $model->getAll();
            $this->getTela()->populaView($pessoas);
            return $this->getTela()->render();
        }        
    }
}