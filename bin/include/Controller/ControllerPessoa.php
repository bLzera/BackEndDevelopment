<?php
namespace Projeto\Controller;

use Projeto\Handler\TypeHandler;
use Projeto\Model\Pessoa;
use Projeto\Structure\Controller;

class ControllerPessoa extends Controller
{

    public function __construct($params, $method)
    {
        parent::__construct($params, $method);
    }

    public function index()
    {
        $model = new Pessoa();
        $this->setModel($model);
        if($this->getTipoTela() == 'Consulta')
        {
            return $this->getTelaConsulta();
        }
        else if($this->getTipoTela() == 'Cadastra')
        {
            if($this->getMethod() == 'GET')
            {
                return $this->getTela()->render();
            }
            if($this->aceitaForm())
            {
                if(!TypeHandler::validate($this->params['cpf'], 'cpf'))
                {
                    throw 'CPF Inválido';
                }
                $this->getModel()->createPessoa($this->params['Nome'], $this->params['CPF']);
                $this->getModel()->flushChanges();
            }
            return $this->getTelaConsulta();
        }
    }
}