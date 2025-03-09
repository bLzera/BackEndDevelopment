<?php
    session_start();
    require_once __DIR__."/../vendor/autoload.php";

    if(!isset($_SESSION['page']))
    {
        $_SESSION['page'] = 'Index';
    }

    if(isset($_GET['page']))
    {
        $_SESSION['page'] = $_GET['page'];
    }

    $view = $_SESSION['page'].'.php';
    $viewPath = __DIR__.'/Include/View/'.$view;

    if(file_exists($viewPath))
    {
        require_once($viewPath);
    }
    else
    {
        echo 'Página não encontrada  -  '.$viewPath;
        session_destroy();
    }
?>