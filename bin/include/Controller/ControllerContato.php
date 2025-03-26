<?php
namespace Projeto\Controller;

use Projeto\Model\ContatoPessoa;
use Projeto\Structure\Controller;

class ControllerContato extends Controller
{
    public function __construct($params, $method)
    {
        parent::__construct($params, $method);
    }

    private function busca($model)
    {
        if(isset($this->params['pesid']))
        {
            return $model->buscaDados($this->params['pesid'], null);
        }
        return $model->getAll();
    }

    public function index()
    {
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new ContatoPessoa();
            $contatos = $this->busca($model);
            $this->getTela()->populaView($contatos);
            return $this->getTela()->render();
        } 
        else if($this->getTipoTela() == 'Cadastro')
        {
            $this->getTela()->forceBody('ta funcionando mais ou menos');
        }
    }
}