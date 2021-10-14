<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;

class UsuariosController extends AppController{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
            'order' => [
                'Usuarios.id' => 'asc',
            ]
    ];  
   $usuarios = $this->paginate($this->Usuarios);
   $this->set(compact('usuarios'));
}

public function visualizar($id = null){
    $usuario = $this->Usuarios->get($id);
    $this->set(['usuario' => $usuario]);
}

public function view($id = null){
   $usuario = $this->Usuarios->get($id);
   $this->set(['usuario' => $usuario]);
}

public function adicionar(){
    $usuario = $this->Usuarios->newEntity();

    if($this->request->is('post')){
        $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
        //criptografia de senha.
        $usuario->password = (new DefaultPasswordHasher)->hash($usuario->password);
        
        if($this->Usuarios->save($usuario)){
            $this->Flash->success(__('Usuario Cadastrado com sucesso'));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('Erro: Usuario não foi Cadastrado, tentar novamente '));
        }
    }   
    $this->set(compact('usuario'));

    }

    public function edit($id = null){

        $usuario = $this->Usuarios->get($id);
      
        if($this->request->is(['post','put'])){
           $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
           
           if($this->Usuarios->save($usuario)){
              $this->Flash->success('Usuario editado com sucesso');
              return $this->redirect(['action' => 'index']);
           }else{
              $this->Flash->error('Usuario não foi editado, por gentileza tentar novamente');
           }
        }
      
        $this->set(compact('usuario'));
      
      }
      

    public function login(){
        
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if($this->Usuarios->delete($usuario)){
            $this->Flash->success('Usuario deletado com sucesso');
        }else{
            $this->Flash->error('Usuario nao pode ser deletado, verificar e tentar novamente');
        }
        return $this->redirect(['action' =>'index']);      
    }
}