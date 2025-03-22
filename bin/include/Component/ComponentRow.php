<?php
namespace Projeto\Component;

use Projeto\Structure\Component;

class ComponentRow extends Component
{
    private int $quantidade;
    private int $pos = 0;
    
    public function __construct(private array $linha)
    {
        $this->quantidade = count($linha);
        $this->addField($this->linha);
    }

    private function addField($fieldList)
    {
        for($i = 0; $i < count($fieldList); $i++)
        {
            if(isset($fieldList[$i]))
            {
                $this->linha[$this->pos] = $fieldList[$i];
                $this->pos++;
            }
        }
    }

    public function getFields()
    {
        return $this->linha;
    }

    /**
     * Method for future ComponentField customization
     * eventually you should be able to declare new ComponentField('name', position)
     * where position is an integer that defines the position
     * needs a lot of validation and management for mixed arrays of position-declared ComponentFields and not-position-declared ComponentFields
     */
    /*private function sortFields(array $fields, int $iteration = 0)
    {
        if($iteration < $this->quantidade)
        {
            if($fields[$iteration]->getPosicao() > $this->quantidade || $fields[$iteration]->getPosicao() < 1)
            {
                throw 'Posição do Componente fora do limite disponível.';
            }
            if(!($this->sortedLinhas[$this->cursor]))
            {
                $this->sortedLinhas[$this->cursor] = $fields[$iteration];
                $iteration++;
                $this->sortFields($fields, $iteration);
            }            
            if($this->sortedLinhas[$this->cursor]->getPosicao() < $fields[$iteration]->getPosicao() && $this->cursor-1 < 0)
            {
                $this->pushFields($fields, 0);
                $this->sortedLinhas[$this->cursor] = $fields[$iteration];
            }
            if($this->sortedLinhas[$this->cursor]->getPosicao() > $fields[$iteration]->getPosicao() && $this->subiu)
            {
                $this->pushFields($fields, $this->cursor-1);
                $this->sortedLinhas[$this->cursor] = $fields[$iteration];
            }
            if($this->sortedLinhas[$this->cursor]->getPosicao() < $fields[$iteration]->getPosicao())
            {                                
                $this->cursor--;
                $this->subiu = 0;
                $this->sortFields($fields, $iteration);
            }
            if($this->sortedLinhas[$this->cursor]->getPosicao() > $fields[$iteration]->getPosicao())
            {
                $this->cursor++;
                $this->subiu = 1;
                $this->sortFields($fields, $iteration);
            }
        }
    }

    private function pushFields(array $fields, int $start)
    {
        for($i = $this->quantidade-1; $i >= $start; $i++)
        {
            if($fields[$i])
            {
                $fields[$i+1] = $fields[$i];
                unset($fields[$i]);
            }            
        }
        return $fields;
    }*/
}