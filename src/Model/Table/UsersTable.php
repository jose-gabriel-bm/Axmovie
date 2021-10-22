<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('users');
        $this->displayField('nome');
        
        $this->addBehavior('Timestamp');

        $this->belongsTo('Perfis', [
            'foreignKey' => 'id_perfil'
        ]);
    }

    public function validationDefault(validator $validator)
    {

        //essa validação informa que o id deve ser inteiro e sera criado pelo sistema.
        $validator
        ->integer('id')
        ->allowEmpty('id', 'create');

        //essa validação informa que o campo nome, id perfil, email e senha nao pode ser vazio quando criado.
        $validator
        ->requirePresence('nome','create')
        ->notEmpty('nome','Inserir um nome');

        $validator
        ->requirePresence('id_perfil','create')
        ->notEmpty('id_perfil','Inserir um perfil');

        $validator
        ->requirePresence('email','create')
        ->notEmpty('email','Inserir um email');
        
        $validator
        ->requirePresence('password','create')
        ->notEmpty('password','E necessario colocar a senha');

        return $validator;
     }

    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome'], 'Nome ja tem cadastro'));
        $rules->add($rules->isUnique(['email'],'Email em duplicidade'));
        return $rules;
    } 
    
}