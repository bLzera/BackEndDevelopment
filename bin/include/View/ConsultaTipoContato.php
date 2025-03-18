<?php
namespace Projeto\View;

use Projeto\Structure\View;

class ConsultaTipoContato extends View
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);
        $this->body .= 
        '<tr>
            <td>ID</td>
            <td>Descrição</td>
        </tr>';
    }

    public function populaView($tiposcontato)
    {
        foreach($tiposcontato as $tipocontato)
        {
            $this->body .= 
            '<tr>
                <td>'.$tipocontato->getTipid().'</td>
                <td>'.$tipocontato->getTipdesc().'</td>
            </tr>';
        }
    }
}