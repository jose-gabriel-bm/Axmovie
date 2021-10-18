<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Contato extends Entity
{
    public $_accessible = [

        '*' => true
       
    ];

    protected function _getPossuiWhatsapp()
    {
        return $this->whatsapp ? 'Sim' : 'Não';
    }
    protected function _getNumeroPrincipal()
    {
        return $this->principal ? 'Sim' : 'Não';
    }

}
