<?php
namespace Projeto\View;

use Project\View\Index;

class CadastraPessoa extends Index
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);        
        $this->addContent(

            ''

        );
    }
    
    public function populaView($registros)
    {

    }
}