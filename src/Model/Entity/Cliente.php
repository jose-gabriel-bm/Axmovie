<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Cliente extends Entity
{
    public $_accessible = [
        'nome' => true,
        'cpf' => true,
        'email' => true,
        'id_usuario' => true,
        'status' => true,
        'created'=>true,
        'modified'=>true
    ];

    protected function _getOpcoesStatus()
    {
        return $this->status ? 'Ativo' : 'Inativo';
    }
}
