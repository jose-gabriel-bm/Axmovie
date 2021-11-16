<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function index()
    {
        $verificacaoPerfil = $this->Auth->user('id_perfil');

        $this->paginate = [
            'limit' => 10,
            'order' => [
                'Usuarios.created' => 'DESC',
            ]
        ];

        $busca =  $this->request->query();

        $this->buscaIndex($busca);

        $this->set(compact('verificacaoPerfil'));

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
        if($this->Auth->user('id_perfil') == 2){
            $this->Flash->error(__(' Acesso negado'));
            return $this->redirect(['action' => 'index']);
        }

        $usuario = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $requisicao = $this->request->getData();
            $requisicao['id_perfil'] = 2;
           
            $usuario = $this->Users->patchEntity($usuario,$requisicao );
            //criptografia de senha.
            $usuario->password = (new DefaultPasswordHasher)->hash($usuario->password);
       
            if ($this->Users->save($usuario)) {
                $this->Flash->success(__('Usuario Cadastrado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro: Usuario não foi Cadastrado, tentar novamente '));
            }
        }
        $this->set(compact('usuario'));
    }

    public function edit($id = null)
    {

        $usuario = $this->Users->get($id, [
            'contain' => ['Perfis']
        ]);

        if ($this->request->is(['post', 'put'])) {
           
            $request = $this->request->data;
            $request['id_perfil'] = 2;
            $usuario = $this->Users->patchEntity($usuario, $request);
            $usuario->password = (new DefaultPasswordHasher)->hash($usuario->password);

            if ($this->Users->save($usuario)) {
                $this->Flash->success('Usuario editado com sucesso');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Usuario não foi editado, por gentileza tentar novamente');
            }
        }

        $this->set(compact('usuario'));
    }
    public function login()
    {
    $this->Auth->AllowedActions = array('add');
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            //verifica se dentro da tabela users o status e false
            $this->loadModel('Users');
            $verificacaoStatus = $this->Users
                ->find()
                ->where([
                    'username'=>$this->request->data['username'],
                    'status'=> false,
                ])
                ->count();
                    
            if ($verificacaoStatus > 0){

                $this->Flash->error(__('Usuario inativo'));
                return;
            }

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Usuario ou senha incorreta'));
            }
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function buscaIndex($busca){

        $usuarios = null;
        
        if ($busca == null) {

            $usuarios = $this->Users->find('all', [
                'contain' => ['Perfis']
            ]);
    
        } else {

            $usuarios = $this->Users->find('all', [
                'contain' => ['Perfis']
            ]);

            $usuarios = $usuarios->where(['email LIKE' => "%$busca[email]%"]);
            $usuarios = $usuarios->where(['nome LIKE' => "%$busca[nome]%"]);
            $usuarios = $usuarios->where(['perfil LIKE' => "%$busca[perfil]%"]);

            if($busca['status'] == 'Ativo'):
                $usuarios = $usuarios->where(['status =' => 1]);
            endif;

            if($busca['status'] == 'Inativo'):
                $usuarios = $usuarios->where(['status =' => 0]);
            endif;
            
        }

        $usuarios = $this->paginate($usuarios); 
        $this->set(compact('usuarios')); 
    }
}
