<?php
namespace Projeto\Controller;
require_once __DIR__."/../../../vendor/autoload.php";

use Projeto\Model\Pessoa as ModelPessoa;
use Projeto\Structure\Controller;

class Pessoa extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createPessoa($nome, $cpf)
    {
        $pessoa = new ModelPessoa($nome, $cpf);
        $this->entityManager->persist($pessoa);
    }
}