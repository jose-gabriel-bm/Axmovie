<?php

namespace App\Model\Table;
use Cake\ORM\RulesChecker;

use Cake\ORM\Table;

class ContatosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('contatos');

        $this->addBehavior('Timestamp'); 
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['numero'], 'Numero ja resgistrado'));
        return $rules;

    } 


}