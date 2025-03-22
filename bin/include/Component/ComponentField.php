<?php
namespace Projeto\Component;

use Projeto\Interface\InterfaceField;
use Projeto\Structure\Component;

class ComponentField extends Component
{
    public function __construct(private string $conteudo)
    {}

    public function getConteudo()
    {
        return $this->conteudo;
    }
}