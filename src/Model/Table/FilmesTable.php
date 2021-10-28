<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FilmesTable extends Table {

    public function initialize(array $config){

        parent::initialize($config);
        $this->table('filmes');
        
        $this->addBehavior('Timestamp');

        $this->belongsTo('Generos', [
            'foreignKey' => 'id_genero'
        ]);
        $this->belongsTo('Diretores', [
            'foreignKey' => 'id_diretor'
        ]);

    }

    public function validationDefault(validator $validator){

        $validator
        ->integer('id')
        ->allowEmpty('id', 'create');

        $validator
        ->requirePresence('titulo','create')
        ->notEmpty('titulo');

        $validator
        ->requirePresence('valor_compra','create')
        ->notEmpty('valor_compra');

        $validator
        ->requirePresence('status','create')
        ->notEmpty('status');

        $validator
        ->requirePresence('lancamento','create')
        ->notEmpty('lancamento');
        $validator
        ->requirePresence('idioma','create')
        ->notEmpty('idioma','Selecionar idioma');

        return $validator;
     }

    //Funçao para nao deixar adicionar ou editar com dados ja existentes no banco.
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['titulo'], 'Titulo ja esta em uso'));
        return $rules;

    } 
    
}