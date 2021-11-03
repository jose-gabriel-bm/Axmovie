<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservasTable extends Table {

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('reservas');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'id_cliente'
        ]);
        $this->belongsTo('Filmes', [
            'foreignKey' => 'id_filme'
        ]);
    }

    public function validationDefault(validator $validator)
    {
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
        ->requirePresence('data_inicio_locacao','create');
    

        $validator
        ->requirePresence('data_limite_devolucao','create')
        ->notEmpty('data_limite_devolucao');

        return $validator;
     }

}