<?php
namespace Projeto\Structure;

use Projeto\Component\ComponentRow;

class View
{
    private string $body = '';

    protected function setHeaderFields(ComponentRow $campos)
    {        
        $content = '<tr class="row row__header">';
        foreach($campos->getFields() as $campo)
        {
            $content .= '<th class="cell header__cell">'.$campo->getConteudo().'</th>';
        }
        $content .= '</tr>';
        $this->addContent($content);
    }

    protected function setContentFields(ComponentRow $campos)
    {
        $content = '<tr class="row row__content">';
        foreach($campos->getFields() as $campo)
        {
            $content .= '<td class="cell content__cell">'.$campo->getConteudo().'</td>';
        }
        $content .= '</tr>';
        $this->addContent($content);
    }

    public function __construct($tipo = 0, $tela = null)
    {
        switch($tipo)
        {
            case 0 : '';
                break;
            case 1 :  
                $this->body = '<h1>Tela de '.$tela.':</h1>
                                <table class="tabela__conteudo" id="tabela__conteudo">';
                break;
            case 2 : 
                $this->body = '<h1>Cadastro de '.$tela.':</h1>';
                break;
        }
        
    }

    public function render()
    {
        return $this->body;
    }

    protected function addContent($content)
    {
        $this->body .= $content;
    }

    /**
     * Method created for debugging NOT SAFE
     */
    public function forceBody(string $html)
    {
        $this->body = $html;
    }
}