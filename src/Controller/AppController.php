<?php

namespace App\Controller;

use App\Model\Entity\Usuario;
use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        // $this->loadComponent('Auth',[
        //     'loginRedirect' =>[
        //             'controller'=>'Usuarios',
        //             'Action'=>'index'
        //         ]
        //     ]);

        
    }
}
