<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class GenerosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('generos');
        
        $this->addBehavior('Timestamp');
 
    }
    
}