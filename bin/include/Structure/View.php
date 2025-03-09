<?php
namespace Projeto\Structure;

class View
{
    protected string $cabecalho;
    protected string $rodape;
    protected array $resposta;

    public function __construc($res)
    {
        $this->resposta = $res;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function getMetodo()
    {
        return $this->resposta['REQUEST_METHOD'];
    }
}