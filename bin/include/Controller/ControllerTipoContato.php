<?php
namespace Projeto\Controller;

use Projeto\Model\TipoContato;
use Projeto\Structure\Controller;

class ControllerTipoContato extends Controller
{

    public function __construct($params, $method)
    {
        parent::__construct($params, $method);
    }

    public function index()
    {
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new TipoContato();
            $tiposcontato = $model->getAll();
            $this->getTela()->populaView($tiposcontato);
            return $this->getTela()->render();
        }        
    }
}