<?php
namespace Projeto\Controller;

use Projeto\Model\ContatoPessoa;
use Projeto\Structure\Controller;

class ControllerContato extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params['tipo']);
    }
    
    public function index()
    {
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new ContatoPessoa();
            $contatos = $model->buscaDados(1, null);
            $this->getTela()->populaView([$contatos]);
            return $this->getTela()->render();
        }
    }
}