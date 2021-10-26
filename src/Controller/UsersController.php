<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function BeforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    public function index()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => [
                'Usuarios.id' => 'DESC',
            ]
        ];

        $usuarios = $this->Users->find('all', [
            'contain' => ['Perfis']
        ]);
        $usuarios = $this->paginate($usuarios);
        $this->set(compact('usuarios',));
    }

    public function view($id = null)
    {
        $usuario = $this->Users->get($id);
        $this->set(['usuario' => $usuario]);

        $usuario = $this->Users->get($id, [
            'contain' => ['Perfis']
        ]);
        $this->set(compact('usuario'));
    }

    public function add()
    {
        $usuario = $this->Users->newEntity();

        $this->loadModel('Perfis');
        $perfis = $this->Perfis->find('list', [
            'keyField' => 'id',
            'valueField' => 'perfil'
        ])->toArray();

        if ($this->request->is('post')) {
            $usuario = $this->Users->patchEntity($usuario, $this->request->getData());
            //criptografia de senha.
            $usuario->password = (new DefaultPasswordHasher)->hash($usuario->password);

            if ($this->Users->save($usuario)) {
                $this->Flash->success(__('Usuario Cadastrado com sucesso'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Erro: Usuario não foi Cadastrado, tentar novamente '));
            }
        }
        $this->set(compact('usuario', 'perfis'));
    }

    public function edit($id = null)
    {

        $usuario = $this->Users->get($id, [
            'contain' => ['Perfis']
        ]);

        $this->loadModel('Perfis');
        $perfis = $this->Perfis->find('list', [
            'keyField' => 'id',
            'valueField' => 'perfil'
        ])->toArray();

        unset($usuario['password']);

        if ($this->request->is(['post', 'put'])) {
            unset($this->request->data['password']);
            $request = $this->request->data;
            $usuario = $this->Users->patchEntity($usuario, $request);
            // debug($request);
            // debug($usuario);
            if ($this->Users->save($usuario)) {
                $this->Flash->success('Usuario editado com sucesso');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Usuario não foi editado, por gentileza tentar novamente');
            }
        }

        $this->set(compact('usuario', 'perfis'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Users->get($id);
        if ($this->Users->delete($usuario)) {
            $this->Flash->success('Usuario deletado com sucesso');
        } else {
            $this->Flash->error('Usuario nao pode ser deletado, verificar e tentar novamente');
        }
        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();       

            if ($user['status'] == true){
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Usuario ou senha incorreta'));
                }
            }else{
                $this->Flash->error(__('Usuario inativo'));
            }
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
