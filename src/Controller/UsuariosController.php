<?php

namespace App\Controller;

use App\Controller\AppController;

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
        
        if($this->Usuarios->save($usuario)){
            $this->Flash->success(__('Usuario Cadastrado com sucesso'));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->success(__('Erro: Usuario não foi Cadastrado, tentar novamente '));
        }
    }   
    $this->set(compact('usuario'));

    }

    public function edit($id = null){

        $usuario = $this->Usuarios->get($id);
      
        if($this->request->is(['post','put'])){
           $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
           
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

public function display(...$path)
{
    if (!$path) {
        return $this->redirect('/');
    }
    if (in_array('..', $path, true) || in_array('.', $path, true)) {
        throw new ForbiddenException();
    }
    $Usuarios = $subpage = null;

    if (!empty($path[0])) {
        $Usuarios = $path[0];
    }
    if (!empty($path[1])) {
        $subpage = $path[1];
    }
    $this->set(compact('Usuarios', 'subpage'));

    try {
        $this->render(implode('/', $path));
    } catch (MissingTemplateException $exception) {
        if (Configure::read('debug')) {
            throw $exception;
        }
        throw new NotFoundException();
    }
}

}