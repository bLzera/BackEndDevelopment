<?php
namespace Projeto\Structure;

use Exception;
use Projeto\Config;

class Controller extends Config
{
    protected string $tipoTela;
    private object $tela;

    protected array $params;

    public function __construct($params)
    {
        $this->params = $params;
        $this->tipoTela = Config::TIPO_TELA[$this->params['tipo']];
        $this->defineTela();
    }

    protected function defineTela()
    {
        $viewName = 'Projeto\\View\\' . $this->tipoTela . $this->params['page'];
        if(class_exists($viewName))
        {
            $this->tela = new ($viewName)($this->params['tipo'], $this->params['page']);
        }
        else
        {
            throw new Exception('Tela ' . $viewName . ' não encontrada.');
        }
    }

    public function index()
    {
        return $this->tela->render();
    }

    protected function getTipoTela()
    {
        return $this->tipoTela;
    }

    protected function getTela()
    {
        return $this->tela;
    }
}