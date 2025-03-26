<?php
namespace Projeto\View;

use Project\View\Index;
use Projeto\Component\ComponentField;
use Projeto\Component\ComponentRow;

class CadastraPessoa extends Index
{
    public function __construct($tipo, $tela, $params)
    {
        parent::__construct($tipo, $tela);
        
        $nome = new ComponentField('Nome', $params['nome'] ?? '', 'texto');
        $cpf = new ComponentField('CPF', $params['cpf'] ?? '', 'texto');

        $linha = new ComponentRow([$nome, $cpf]);
        $this->setFillableFields($linha);
    }
}