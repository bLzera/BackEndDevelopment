<?php
namespace Projeto\Structure;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Model extends DB
{
    protected EntityManager $entityManager;
    protected QueryBuilder $queryBuilder;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::create($this->connxString, Setup::createAttributeMetadataConfiguration([__DIR__.'/Model/']));
        $this->queryBuilder = $this->entityManager->createQueryBuilder();
        $this->entityManager->getConfiguration()->setProxyDir('C:\Users\biel\AppData\Local\Temp');
    }
}