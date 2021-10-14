<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsuariosTable extends Table {

    public function initialize(array $config){
        parent::initialize($config);
        $this->table('usuarios');

        $this->addBehavior('Timestamp');
    }

    //Essa função valida os campos da tabela.
    public function validationDefault(validator $validator){

       //essa validação informa que o id deve ser inteiro e sera criado pelo sistema.
        $validator
        ->integer('id')
        ->allowEmpty('id', 'create');

        //essa validação informa que o campo nome, id perfil, email e senha nao pode ser vazio quando criado.
        $validator
        ->requirePresence('nome','create')
        ->notEmpty('nome');

        $validator
        ->requirePresence('id_perfil','create')
        ->notEmpty('id_perfil');

        $validator
        ->requirePresence('email','create')
        ->notEmpty('email');

        $validator
        ->requirePresence('password','create')
        ->notEmpty('password');


        return $validator;
    }

    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules){
        $rules->add($rules->isUnique(['email'],'Email em duplicidade'));
        $rules->add($rules->isUnique(['nome'], 'Nome ja esta em uso'));
        return $rules;
    }

}