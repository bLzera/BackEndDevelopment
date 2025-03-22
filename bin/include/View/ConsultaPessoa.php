<?php
namespace Projeto\View;
use Project\View\Index;

class ConsultaPessoa extends Index
{
    public function __construct($tipo, $tela)
    {
        parent::__construct($tipo, $tela);
        $this->addContent(
            
            '<tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Contatos</th>
            </tr>
            <a href="?page=Pessoa&tipo=2">Tela de Cadastro</a>'
            
            );
    }

    public function populaView($registros)
    {
        foreach($registros as $pessoa)
        {
            $this->addContent(            
                
            '<tr>
                <td>'.$pessoa->getId().'</td>
                <td>'.$pessoa->getPesnome().'</td>
                <td>'.$pessoa->getCpf().'</td>
                <td><a href="?page=Contato&tipo=1&pesid='.$pessoa->getId().'">O</a></td>
            </tr>'
    
            );
        }
    }
}