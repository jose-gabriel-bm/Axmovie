<?php

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Filme extends Entity
{
    public $_accessible = [

        'id'=>true,
        'titulo'=>true,
        'id_genero'=>true,
        'id_usuario'=>true,
        'id_diretor'=>true,
        'lancamento'=>true,
        'valor_compra'=>true,
        'status'=>true,
        'idioma'=>true,
        'created'=>true,
        'modified'=>true

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
