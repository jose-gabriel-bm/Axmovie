<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class GenerosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('generos');
        
        $this->addBehavior('Timestamp');
        $this->belongsTo('Enderecos');

        $this->setDisplayField('genero');
    }

    public function validationDefault(validator $validator){

        //essa validação informa que o id deve ser inteiro e sera criado pelo sistema.
         $validator
         ->integer('id')
         ->allowEmpty('id', 'create');
 
         //essa validação informa que o campo nome, id perfil, email e senha nao pode ser vazio quando criado.
         $validator
         ->requirePresence('titulo','create')
         ->notEmpty('titulo');
 
         $validator
         ->requirePresence('valor_compra','create')
         ->notEmpty('valor_compra');
 
         $validator
         ->requirePresence('status','create')
         ->notEmpty('status');
 
         $validator
         ->requirePresence('lancamento','create')
         ->notEmpty('lancamento');
 
 
         return $validator;
     }

    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['titulo'], 'Titulo ja esta em uso'));
        return $rules;
    } 
    
}