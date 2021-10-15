<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;

class ReservasController extends AppController{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
            'order' => [
                'Usuarios.id' => 'asc',
            ]
    ];  
   $reservas = $this->paginate($this->Reservas);
   $this->set(compact('reservas'));
}

public function view($id = null){
   $reserva = $this->Reservas->get($id);
   $this->set(['reserva' => $reserva]);
}

public function adicionar(){
    $reserva = $this->Reservas->newEntity();

    if($this->request->is('post')){
        $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
             
        if($this->Reservas->save($reserva)){
            $this->Flash->success(__('Reserva Cadastrada com sucesso'));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('Erro: Reserva não foi Cadastrada, tentar novamente '));
        }
    }   
    $this->set(compact('reserva'));

    }

    public function edit($id = null){

        $reserva = $this->Reservas->get($id);
      
        if($this->request->is(['post','put'])){
           $reserva = $this->Reservas->patchEntity($reserva, $this->request->data);
           
           if($this->Reservas->save($reserva)){
              $this->Flash->success('Reserva editada com sucesso');
              return $this->redirect(['action' => 'index']);
           }else{
              $this->Flash->error('Reserva não foi editada, por gentileza tentar novamente');
           }
        }
      
        $this->set(compact('reserva'));
      
      }
         
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if($this->Reservas->delete($reserva)){
            $this->Flash->success('Reserva deletada com sucesso');
        }else{
            $this->Flash->error('Reserva nao pode ser deletada, verificar e tentar novamente');
        }
        return $this->redirect(['action' =>'index']);      
    }
}