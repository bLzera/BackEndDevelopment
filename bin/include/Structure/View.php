<?php
namespace Projeto\Structure;

class View
{
    protected string $body;

    public function __construct($res)
    {}

    protected function load()
    {
        return $this->body;
    }

    public function render()
    {
        return $this->load();
    }
}