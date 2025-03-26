<?php
namespace Projeto\Structure;

use Projeto\Component\ComponentRow;

class View
{
    private string $main = '';

    private int $rowNumber = 1;

    private string $header = '';
    private string $body = '';
    private string $footer = '';

    public function __construct($tipo = 'Index', $tela = null)
    {
        switch($tipo)
        {
            case 'Index' : '';
                break;
            case 'Consulta' :  
                $this->header = '<section class="header__conteudo" id="header__conteudo">
                                    <h1 class="titulo__header">Tela de '.$tela.':</h1>
                                    <a class="cadastro__header" href="?page='.$tela.'&tipo=2">
                                        Cadastro de '.$tela.'
                                    </a>
                                </section>
                                <table class="tabela__conteudo" id="tabela__conteudo">';
                $this->footer = '</table>';
                break;
            case 'Cadastra' : 
                $this->header = '
                            <section class="header__conteudo" id="header__conteudo">
                                <h1>Cadastro de '.$tela.':</h1>
                            </section>
                            <form action="index.php" method="post" class="formulario__conteudo" id="formulario__conteudo">';                                
                $this->footer ='                            
                                <input class="hidden__input" type="text" name="tipo" value="2"></input>
                                <input class="hidden__input" type="text" name="page" value="'.$tela.'"></input>
                                <div class="button__row form__footer" id="form__footer">
                                    <input class="button button__confirm" type="submit" name="accept" value="Confirma"></input>
                                    <input class="button button__cancel" type="submit" name="accept" value="Cancela"></input>
                                </div>
                            </form>';
                break;
        }        
    }

    protected function setHeaderFields(ComponentRow $campos)
    {        
        $content = '<tr class="row row__header">';
        foreach($campos->getFields() as $campo)
        {
            $content .= '<th class="cell header__cell">'.$campo->getConteudo().'</th>';
        }
        $content .= '</tr>';
        $this->addContent($content);
        return $this;
    }

    protected function setContentFields(ComponentRow $campos)
    {
        $content = '<tr class="row row__content" id="row_'.$this->getNextRowNumber().'">';
        foreach($campos->getFields() as $campo)
        {
            $content .= '<td class="cell content__cell">'.$campo->getConteudo().'</td>';
        }
        $content .= '</tr>';
        $this->addContent($content);
        return $this;
    }

    protected function setFillableFields(ComponentRow $campos)
    {
        $content = '<div class="form__input__container">';
        foreach($campos->getFields() as $campo)
        {
            $content .='<div class="input__row" id="input__'.$campo->getName().'">';
            $content .='<label class="input__label" for="'.$campo->getName().'">'.$campo->getName().'</label>'; 
            $content .='<input class="input__field" type="'.$campo->getTipo().'" value="'.$campo->getConteudo().'" id="'.$campo->getName().'" name="'.$campo->getName().'">';
            $content .='</div>';
        }
        $content .='</div>';
        $this->addContent($content);
        return $this;
    }

    private function getNextRowNumber()
    {
        $row = $this->rowNumber;
        $this->rowNumber++;
        return $row;
    }

    private function setFooter(string $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    private function loadMain()
    {
        $this->main = $this->header . $this->body . $this->footer;
        return $this;
    }

    public function render()
    {
        return $this->loadMain()->main;
    }

    protected function addContent($content)
    {
        $this->body .= $content;
    }
}