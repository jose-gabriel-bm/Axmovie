<?php

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth',[
            'loginRedirect' =>[
                    'controller'=>'Users',
                    'action'=>'index'
            ],
            'logoutRedirect' =>[
                'controller'=>'Users',
                'action'=>'login'
            ]
         ]);
        
        
    }
}
