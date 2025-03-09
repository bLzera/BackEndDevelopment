<?php
namespace Project\View;
use Projeto\Structure\View;

require_once(__DIR__."/../../../vendor/autoload.php");

class Index extends View
{
    private string $html;

    public function __construct()
    {
        $this->html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <a href="?page=teste">Página de Cadastro</a>
            </body>
            </html>        
        ';
    }

    public function render()
    {
        return $this->html;
    }
}