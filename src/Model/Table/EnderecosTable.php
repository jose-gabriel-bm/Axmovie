<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class EnderecosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('enderecos');

        $this->addBehavior('Timestamp'); 
    }
}