<?php

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Usuario extends Entity
{
    public $_accessible = [

        'id'=>true,
        'nome'=>true,
        'email'=>true,
        'password'=>true,
        'id_perfil'=>true,
        'status'=>true,
        'created'=>true,
        'modified'=>true

    ];


}
