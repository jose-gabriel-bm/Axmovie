<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
    public function validationDefault(validator $validator)
    {

        //essa validação informa que o id deve ser inteiro e sera criado pelo sistema.
        $validator
        ->integer('id')
        ->allowEmpty('id', 'create');

        $validator
        ->requirePresence('nome','create')
        ->notEmpty('nome','Inserir um nome');

        $validator
        ->requirePresence('cpf','create')
        ->notEmpty('cpf','Inserir um cpf');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome'], 'Nome ja resgistrado'));
        $rules->add($rules->isUnique(['cpf'], 'cpf ja esta cadastrado'));
        return $rules;
    } 
}