<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Reserva extends Entity
{
    public $_accessible = [
        'id'=>true,
        'id_cliente'=>true,
        'id_filme'=>true,
        'id_usuario'=>true,
        'valor_multa_atraso'=>true,
        'valor_total_pagar'=>true,
        'data_inicio_locacao'=>true,
        'data_limite_devolucao'=>true,
        'data_devolucao'=>true,
        'status'=>true,
    ];
    protected function _getOpcoesStatus()
    {
        return $this->status ? 'Aberta' : 'Fechada';
    }

}
