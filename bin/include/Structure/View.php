<?php
namespace Projeto\Structure;

class View
{
    protected string $body;    

    public function __construct()
    {
        $this->body = '';
    }

    protected function load()
    {
        return $this->body;
    }

    public function render()
    {
        return $this->load();
    }

    public function addContent($content)
    {
        $this->body .= $content;
    }

    /**
     * Method created for debugging NOT SAFE
     */
    public function forceBody(string $html)
    {
        $this->body = $html;
    }
}