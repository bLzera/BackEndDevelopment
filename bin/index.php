<?php
session_start();
require_once __DIR__."/../vendor/autoload.php";

$conteudo = 'Objeto não encontrado - '.$_SESSION['page']. ' -  Public/Style/Style.css';

$page = $_GET['page'] ?? 'Index';

$controllerClass='Projeto\\Controller\\'.$page;
if(class_exists($controllerClass))
{
    $controller = new $controllerClass;
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $controller->createPessoa($_POST['nome'], $_POST['cpf']);
        $controller->flushChanges();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/Style/Style.css">
    <title>Consulta/Cadastro de Contatos de Pessoas</title>
</head>
<body>

    <a href="?page=ConsultaContato">Consulta Contato</a>
    <a href="?page=Pessoa">Consulta Pessoa</a>
    <a href="?page=ConsultaTipoContato">Consulta Tipo de Contato</a>

    <?=$conteudo?>  
</body>
</html>