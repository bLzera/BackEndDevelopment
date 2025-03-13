<?php
namespace Projeto\Structure;

use Exception;
use Projeto\Config;

const TIPO_DE_TELA = array
(
    "1" => "Consulta",
    "2" => "Manutencao"
);

class Controller
{
    private string $tipoTela;
    private object $tela;

    public function __construct($tipo)
    {
        $this->tipoTela = TIPO_DE_TELA[$tipo];        
        $this->defineTela();
    }

    protected function defineTela()
    {
        $viewName = 'Projeto\\View\\' . $this->tipoTela . $_GET['page'];
        if(class_exists($viewName))
        {
            $this->tela = new ($viewName);
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