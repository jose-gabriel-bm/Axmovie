<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsuariosController extends AppController{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
            'order' => [
                'Usuarios.id' => 'DESC',
            ]
    ];   

    $usuarios = $this->Usuarios->find('all',[
        'contain' => ['Perfis']
    ]);
    $usuarios = $this->paginate($usuarios);
    
   $this->set(compact('usuarios',));
}

public function view($id = null){
    

    $usuario = $this->Usuarios->get($id);
    $this->set(['usuario' => $usuario]);

    $usuario = $this->Usuarios->get($id, [
        'contain' => ['Perfis']
    ]);
$this->set(compact('usuario'));
}

public function adicionar(){
    $usuario = $this->Usuarios->newEntity();

    $this->loadModel('Perfis');
    $perfis =$this->Perfis->find('list', [
        'keyField' => 'id',
        'valueField' => 'perfil'
    ])->toArray();

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
    $this->set(compact('usuario', 'perfis'));

    }

    public function edit($id = null){

        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Perfis']
        ]);
      
        $this->loadModel('Perfis');
        $perfis =$this->Perfis->find('list', [
            'keyField' => 'id',
            'valueField' => 'perfil'
        ])->toArray();
      
        unset($usuario['password']);
      
        if ($this->request->is(['post','put'])) {
            unset($this->request->data['password']);
            $request = $this->request->data;
            $usuario = $this->Usuarios->patchEntity($usuario, $request);
            // debug($request);
            // debug($usuario);
            
           if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Usuario editado com sucesso');
                return $this->redirect(['action' => 'index']);
           } else {
                $this->Flash->error('Usuario não foi editado, por gentileza tentar novamente');
           }
        }
      
        $this->set(compact('usuario','perfis'));
      
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
    public function login()
    {
        // if($this->request->is('post')){
        //    $usuario = $this->Auth->identify();
        //    if($usuario){
        //        $this->Auth->setUser($usuario);
        //        return $this->redirect($this->Auth->redirectUrl());
        //    }
        // }
    }
}