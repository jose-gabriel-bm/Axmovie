<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservasTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('reservas');
        
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(validator $validator){

         $validator
         ->integer('id')
         ->allowEmpty('id', 'create');
 
         $validator
         ->requirePresence('id_cliente','create')
         ->notEmpty('id_cliente');
 
         $validator
         ->requirePresence('id_filme','create')
         ->notEmpty('id_filme');
 
         $validator
         ->requirePresence('id_usuario','create')
         ->notEmpty('id_usuario');
 
         $validator
         ->requirePresence('valor_multa_atraso','create')
         ->notEmpty('valor_multa_atraso');

         $validator
         ->requirePresence('valor_total_pagar','create')
         ->notEmpty('valor_total_pagar');

         $validator
         ->requirePresence('created','create')
         ->notEmpty('created');

         $validator
         ->requirePresence('data_locacao','create')
         ->notEmpty('data_locacao');

         $validator
         ->requirePresence('data_limite_devolucao','create')
         ->notEmpty('data_limite_devolucao');
 
 
 
         return $validator;
     }

    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules)
    {

    } 
    
}