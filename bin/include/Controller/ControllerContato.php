<?php
namespace Projeto\Controller;

use Projeto\Model\ContatoPessoa;
use Projeto\Structure\Controller;

class ControllerContato extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
    }
    
    // TODO : Make this better
    // disgusting method
    // every model is going to have:
    //      buscaDados();
    //      getAll();
    // these are going to be the two main methods for grabbing data for now
    // so maybe give the buscaDados() method our $controller->params
    // or go through $controller->params, grab the model parameters and stash in another array
    // and pass the new $controller->modelParams our model parameters
    // and probably do the same thing for the view parameters
    private function busca($model)
    {
        if(isset($this->params['pesid']))
        {
            return $model->buscaDados($this->params['pesid'], null);
        }
        return $model->getAll();
    }

    public function index()
    {
        //TODO : Make this better as well
        // 
        if($this->getTipoTela() == 'Consulta')
        {
            $model = new ContatoPessoa();
            $contatos = $this->busca($model);
            $this->getTela()->populaView($contatos);
            return $this->getTela()->render();
        }
    }
}