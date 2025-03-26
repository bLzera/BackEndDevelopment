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

        $id = new ComponentField('id', 'ID');
        $nome = new ComponentField('nome', 'Nome');
        $cpf = new ComponentField('cpf', 'CPF');

        $contatos = new ComponentField('contatos', 'Contatos');

        $linha = new ComponentRow([$id, $nome, $cpf, $contatos]);
        $this->setHeaderFields($linha);
    }

    public function populaView($registros)
    {
        foreach($registros as $pessoa)
        {
            $id = new ComponentField('id', $pessoa->getId());
            $nome = new ComponentField('nome', $pessoa->getPesnome());
            $cpf = new ComponentField('cpf', $pessoa->getCpf());
            $contatos = new ComponentField('contatos', '<a href="?page=Contato&tipo=1&pesid='.$pessoa->getId().'">CONTATO</a>');

            $linha = new ComponentRow([$id, $nome, $cpf, $contatos]);
            $this->setContentFields($linha);
        }
    }
}