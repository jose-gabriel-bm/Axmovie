<?php

namespace App\Controller;

use App\Controller\AppController;

class ReservasController extends AppController{

    public function index()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['Reservas.id' => 'asc',]
        ]; 

        $reservas = $this->Reservas->find('all',[
            'contain' => ['Clientes','Filmes']
        ]); 

        $reservas = $this->paginate($reservas);
     
        $this->set(compact('reservas'));
    }

    public function view($id = null)
    {
        $reserva = $this->Reservas->get($id);
        $this->set(['reserva' => $reserva]);

        $reserva = $this->Reservas->get($id, [
            'contain' => ['Filmes','Clientes']
        ]);
        $this->set(compact('reserva'));
    }

    public function adicionar()
    {
        
        $this->loadModel('Clientes');
        $cliente =$this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();

        $this->loadModel('Filmes');
        $filme =$this->Filmes->find('list', [
            'keyField' => 'id',
            'valueField' => 'titulo'
        ])->toArray();

        if($this->request->is(['post', 'put'])){

            $reserva = $this->request->data;
           
            $entityReserva = $this->Reservas->newEntity([
                
                // id_usuario => $this->Auth-usuarios('id'),
                'id_usuario' => '3',
		        'id_cliente' => $reserva['id_cliente'],
		        'id_filme' => $reserva['id_filme'],
		        'data_limite_devolucao' => $reserva['data_limite_devolucao'],
		        'status' => '1'
            ]);
           
            if($this->Reservas->save($entityReserva)){
                $this->Flash->success(__('Reserva Cadastrada com sucesso'));
                return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('Erro: Reserva não foi Cadastrada, tentar novamente '));
            }
        }   
        $this->set(compact('cliente','filme'));

    }

    public function edit($id = null)
    {

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
        // $this->request->allowMethod(['post', 'delete']);
        // $reserva = $this->Reservas->get($id);

        // if($this->Reservas->delete($reserva)){
        //     $this->Flash->success('Reserva deletada com sucesso');
        // }else{
        //     $this->Flash->error('Reserva nao pode ser deletada, verificar e tentar novamente');
        // }
        // return $this->redirect(['action' =>'index']);      
    }
}