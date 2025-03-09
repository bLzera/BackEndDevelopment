<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Projeto\Structure\Model;

$teste = new Model();

$entityManager = EntityManager::create($teste->getConnection(), Setup::createAttributeMetadataConfiguration([__DIR__.'../Model/']));

echo var_dump($entityManager);