<?php

namespace App\Model\Table;

use App\Model\Entity\Cliente;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClienteTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('clientes');
        
        $this->addBehavior('Timestamp');

        $this->belongsTo('enderecos');

        $this->belongsTo('contatos');

       
    }


}