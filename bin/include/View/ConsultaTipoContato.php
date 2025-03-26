<?php
namespace Projeto\View;

use Projeto\Component\ComponentField;
use Projeto\Component\ComponentRow;
use Projeto\Structure\View;

class ConsultaTipoContato extends View
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);

        $id = new ComponentField('id', 'ID');
        $descricao = new ComponentField('descricao', 'Descrição');

        $linha = new ComponentRow([$id, $descricao]);
        $this->setHeaderFields($linha);
    }

    public function populaView($registros)
    {
        foreach($registros as $tipocontato)
        {

            $id = new ComponentField('id', $tipocontato->getTipid());
            $descricao = new ComponentField('descricao', $tipocontato->getTipdesc());

            $linha = new ComponentRow([$id, $descricao]);
            $this->setContentFields($linha);
        }
    }
}