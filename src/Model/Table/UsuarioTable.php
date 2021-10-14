<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;




class UsuariosTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('usuarios');
        
        $this->addBehavior('Timestamp');
    }

    
    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules)
    {
        
        $rules->add($rules->isUnique(['email'],'Email em duplicidade'));
        $rules->add($rules->isUnique(['nome'], 'Nome ja esta em uso'));
        return $rules;
    }

   
    
    

}