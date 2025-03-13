<?php
session_start();

require  __DIR__."/../vendor/autoload.php";

$conteudo = '';

$page = $_GET['page'] ?? 'Index';

$controllerClass='Projeto\\Controller\\Controller'.$page;

if(class_exists($controllerClass))
{    
    $controller = new $controllerClass($_GET);
    echo $controller->index();
    $content = $controller->index();
} else {echo $controllerClass;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/Public/Style/Style.css">
    <title>Consulta/Cadastro de Contatos de Pessoas</title>
</head>
<body>

    <a href="?page=Contato&tipo=1">Contato</a>
    <a href="?page=Pessoa&tipo=1">Pessoa</a>
    <a href="?page=TipoContato&tipo=1">Tipo de Contato</a>

    <?=$conteudo?>  
</body>
</html>