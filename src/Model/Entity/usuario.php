<?php
namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


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

    protected function _setPassword($password)
    {
        if (strlen($password) > 3) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
