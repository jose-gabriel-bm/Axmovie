<?php

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Cliente extends Entity
{
    public $_accessible = [

        'id'=>true,
        'id_usuario'=>true,
        'nome'=>true,
        'cpf'=>true,
        'email'=>true,
        'status'=>true,
        'data_criacao'=>true,
        'data_modificacao'=>true,
       
    ];

    protected function _getOpcoesStatus()
    {
        return $this->status ? 'Ativo' : 'Inativo';
    }
}
