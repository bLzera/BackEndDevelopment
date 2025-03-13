<?php
namespace Projeto\Structure;

class View
{
    protected string $body;    

    protected function load()
    {
        return $this->body;
    }

    public function render()
    {
        return $this->load();
    }
}