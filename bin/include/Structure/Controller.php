<?php
namespace Projeto\Structure;

use Exception;
use Projeto\Config;

class Controller extends Config
{
    protected string $tipoTela;
    protected string $nomeTela;
    private string $method;

    private object $modelo;
    private object $tela;    

    protected array $params;

    public function __construct($params, $method)
    {
        $this->method = $method;
        $this->params = $params;
        $this->tipoTela = Config::TIPO_TELA[$this->params['tipo']];
        $this->nomeTela = $params['page'];
        $this->defineTela($this->getTipoTela());
    }

    protected function defineTela($tipo)
    {
        $viewName = 'Projeto\\View\\' . $tipo . $this->getNomeTela();
        if(class_exists($viewName))
        {
            $this->tela = new ($viewName)($tipo, $this->getNomeTela(), $this->getParams());
        }
        else
        {
            throw new Exception('Tela ' . $viewName . ' não encontrada.');
        }
    }

    protected function getTelaConsulta()
    {
        $this->defineTela('Consulta');
        $dados = $this->getModel()->getAll();
        $this->getTela()->populaView($dados);
        return $this->getTela()->render();
    }

    public function index()
    {
        return $this->tela->render();
    }

    public function setModel(object $model)
    {
        $this->modelo = $model;
    }

    public function aceitaForm()
    {
        if($this->params['accept'] == 'Cancela')
        {
            return false;
        }
        return true;
    }

    public function getModel()
    {
        return $this->modelo;
    }

    protected function getParams()
    {
        return $this->params;
    }

    protected function getMethod()
    {
        return $this->method;
    }

    protected function getTipoTela()
    {
        return $this->tipoTela;
    }

    protected function getTela()
    {
        return $this->tela;
    }

    protected function getNomeTela()
    {
        return $this->nomeTela;
    }
}