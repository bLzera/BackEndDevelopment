<?php
namespace Projeto\Structure;
require_once __DIR__."/../../../vendor/autoload.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Projeto\Config;

class Controller extends Config
{
    protected EntityManager $entityManager;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::create($this->connxString, Setup::createAttributeMetadataConfiguration([__DIR__.'/../Model']));
    }

    public function flushChanges()
    {
        $this->entityManager->flush();
    }
}