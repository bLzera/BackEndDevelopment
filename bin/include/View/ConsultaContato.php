<?php
namespace Projeto\View;

use Projeto\Component\ComponentField;
use Projeto\Component\ComponentRow;
use Projeto\Structure\View;

class ConsultaContato extends View
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);

        $pessoaId = new ComponentField('Pessoa ID');
        $sequencia = new ComponentField('Sequência');
        $descricao = new ComponentField('Descrição');

        $linha = new ComponentRow([$pessoaId, $sequencia, $descricao]);
        $this->setHeaderFields($linha);
    }

    public function populaView($registros)
    {
        foreach($registros as $contato)
        {
            $pessoaId = new ComponentField($contato->getPesid());
            $sequencia = new ComponentField($contato->getSequencia());
            $descricao = new ComponentField($contato->getDescricao());
            
            $linha = new ComponentRow([$pessoaId, $sequencia, $descricao]);
            $this->setContentFields($linha);
        }
    }
}