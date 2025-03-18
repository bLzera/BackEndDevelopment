<?php  
namespace Tools;

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

$em = require 'bootstrap.php';

$cmd = [];

ConsoleRunner::run(
    new SingleManagerProvider($em), 
    $cmd
);