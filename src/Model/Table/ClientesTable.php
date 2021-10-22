<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;

class ClientesTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('clientes');

        $this->addBehavior('Timestamp');

        $this->hasMany('Enderecos', [
            'foreignKey' => 'id_cliente'
        ]);

        $this->hasMany('Contatos', [
            'foreignKey' => 'id_cliente'
        ]);
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome'], 'Nome ja resgistrado'));
        return $rules;

        $rules->add($rules->isUnique(['cpf'], 'cpf ja esta cadastrado'));
        return $rules;
    } 
}