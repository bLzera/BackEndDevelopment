<?php
namespace Projeto\View;
use Project\View\Index;

class ConsultaPessoa extends Index
{
    public function __construct()
    {
        $this->body = '<h1>Lista de pessoas cadastradas:</h1>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                </tr>
            ';
    }

    public function populaView($pessoas)
    {
        foreach($pessoas as $pessoa)
        {
            $this->body .= '<tr>
                <td>'.$pessoa->getId().'</td>
                <td>'.$pessoa->getPesnome().'</td>
                <td>'.$pessoa->getCpf().'</td>
                <td><a href="?page=Contato&tipo=1&pesid='.$pessoa->getId().'">contatos</a></td>
            </tr>';
        }
    }
}