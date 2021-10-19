<?php

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Filme extends Entity
{
    public $_accessible = [

        '*' => true 

    ];
    protected function _getOpcoesStatus()
    {
        return $this->status ? 'Ativo' : 'Inativo';
    }

    protected function _getOpcoesLancamento()
    {
        return $this->status ? 'Sim' : 'Não';
    }
}
