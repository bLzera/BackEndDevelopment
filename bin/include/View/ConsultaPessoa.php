<?php
namespace Projeto\View;
use Project\View\Index;

class ConsultaPessoa extends Index
{
    public function __construct($pessoas)
    {
        $this->body = '<h1>Lista de pessoas cadastradas:</h1>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                </tr>
            ';
        foreach($pessoas as $pessoa)
        {
            $this->body .= '<tr><td>'.$pessoa->getPesnome().'</td><td>'.$pessoa->getCpf().'</td></tr>';
        }
    }
}