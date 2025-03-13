<?php
namespace Project\View;
use Projeto\Structure\View;

require_once(__DIR__."/../../../vendor/autoload.php");

class Index extends View
{
    public function __construct()
    {
        $this->body = 'teste';
    }
}