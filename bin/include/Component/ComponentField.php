<?php
namespace Projeto\Component;

use Projeto\Interface\InterfaceField;
use Projeto\Structure\Component;

class ComponentField extends Component implements InterfaceField
{    
    const TIPO_CAMPO = [
        'texto' => 'text',
        'numero' => 'number',
    ];

    private string $tipoCampo;

    public function __construct(private string $nome, private string $conteudo, $tipo = 'texto')
    {
        parent::__construct();
        $this->setTipo(self::TIPO_CAMPO[$tipo]);
    }

    public function getConteudo(): string
    {
        return $this->conteudo;
    }

    private function setTipo($tipo)
    {
        $this->tipoCampo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipoCampo;
    }

    public function getName()
    {
        return $this->nome;
    }
}