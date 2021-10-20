<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PerfisTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('perfis');
        $this->displayField('perfil');
        $this->addBehavior('Timestamp');
        
    }

}