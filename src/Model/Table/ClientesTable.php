<?php

namespace App\Model\Table;

use Cake\ORM\Table;

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
}