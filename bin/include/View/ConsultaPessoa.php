<?php
namespace Projeto\View;
use Project\View\Index;

class ConsultaPessoa extends Index
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);
        $this->body .= '
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Contatos</th>
                </tr>
            ';
    }

    public function populaView($pessoas)
    {
        foreach($pessoas as $pessoa)
        {
            $this->body .= 
            '<tr>
                <td>'.$pessoa->getId().'</td>
                <td>'.$pessoa->getPesnome().'</td>
                <td>'.$pessoa->getCpf().'</td>
                <td><a href="?page=Contato&tipo=1&pesid='.$pessoa->getId().'">O</a></td>
            </tr>';
        }
    }
}