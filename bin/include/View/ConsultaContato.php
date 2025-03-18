<?php
namespace Projeto\View;

use Projeto\Structure\View;

class ConsultaContato extends View
{
    public function __construct()
    {
        parent::__construct();
    }

    public function populaView(array $contatos)
    {
        foreach($contatos as $contato)
        {
            $this->body .= '<tr>
                <td>'.$contato->getPesid().'</td>
                <td>'.$contato->getSequencia().'</td>
                <td>'.$contato->getDescricao().'</td>
            </tr>';
       }
    }
}