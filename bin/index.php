<?php
session_start();
require_once __DIR__."/../vendor/autoload.php";

$conteudo = '';
$_SESSION['page'] = $_GET['page'] ?? 'Index';
$page = $_SESSION['page'];

$viewClass = 'Projeto\\View\\'.$page;
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

if(class_exists($viewClass))
{
    //TODO : tornar View->load() dinâmico (atualmente é feito um load dentro das views)
    $tela = new $viewClass;
    $conteudo = $tela->render();
}
else
{
    $conteudo = 'Objeto não encontrado - '.$_SESSION['page']. '  -  '.$viewClass.'  -  Public/Style/Style.css';
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
    <a href="?page=ConsultaPessoa">Consulta Pessoa</a>
    <a href="?page=ConsultaTipoContato">Consulta Tipo de Contato</a>
    <a href="?page=cadastraPessoa">Cadastra pessoa aleatória</a>

    <?=$conteudo?>  
</body>
</html>