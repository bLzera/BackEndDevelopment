<?php
namespace Projeto\Structure;

class View
{
    protected string $body = '';    

    public function __construct($tipo = 0, $tela = null)
    {
        switch($tipo)
        {
            case 0 : '';
                break;
            case 1 :  
                $this->body = '<h1>Tela de '.$tela.':</h1>
                                <table>';
                break;
            case 2 : 
                $this->body = '<h1>CADASTROOOOO:</h1>';
                break;
        }
        
    }

    protected function load()
    {
        return $this->body;
    }

    public function render()
    {
        return $this->load();
    }

    public function addContent($content)
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