<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ContatosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('contatos');

        $this->addBehavior('Timestamp'); 
    }


}