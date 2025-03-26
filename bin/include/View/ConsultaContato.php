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

        $pessoaId = new ComponentField('pesid', 'Pessoa ID');
        $sequencia = new ComponentField('sequencia', 'Sequência');
        $descricao = new ComponentField('descricao', 'Descrição');

        $linha = new ComponentRow([$pessoaId, $sequencia, $descricao]);
        $this->setHeaderFields($linha);
    }

    public function populaView($registros)
    {
        foreach($registros as $contato)
        {
            $pessoaId = new ComponentField('pesid', $contato->getPesid());
            $sequencia = new ComponentField('sequencia', $contato->getSequencia());
            $descricao = new ComponentField('descricao', $contato->getDescricao());
            
            $linha = new ComponentRow([$pessoaId, $sequencia, $descricao]);
            $this->setContentFields($linha);
        }
    }
}