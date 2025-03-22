<?php
namespace Projeto\View;
use Project\View\Index;
use Projeto\Component\ComponentField;
use Projeto\Component\ComponentRow;

class ConsultaPessoa extends Index
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);

        $id = new ComponentField('ID');
        $nome = new ComponentField('Nome');
        $cpf = new ComponentField('CPF');
        
        $contatos = new ComponentField('Contatos');

        $linha = new ComponentRow([$id, $nome, $cpf]);
        $this->setHeaderFields($linha);
    }

    public function populaView($registros)
    {
        foreach($registros as $pessoa)
        {

            $id = new ComponentField($pessoa->getId());
            $nome = new ComponentField($pessoa->getPesnome());
            $cpf = new ComponentField($pessoa->getCpf());

            $linha = new ComponentRow([$id, $nome, $cpf]);
            $this->setContentFields($linha);
        }
    }
}