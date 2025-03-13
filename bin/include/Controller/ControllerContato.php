<?php
namespace Projeto\Controller;

use Projeto\Structure\Controller;

class ControllerContato extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params['tipo']);
    }
}