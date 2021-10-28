<?php

namespace App\Controller;

use App\Controller\AppController;

class ClientesController extends AppController
{

    public function index()
    {
     
        $this->paginate = [
            'limit' => 10,
            'order' => ['Usuarios.id' => 'Desc',]
        ];
        $clientes = $this->paginate($this->Clientes);
        $this->set(compact('clientes'));
        
    }

    public function view($id)
    {
                
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos', 'Contatos']
        ]);

        $this->set(compact('cliente'));
    }


    public function adicionar()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is(['patch', 'post', 'put',])) {

            $requisicao = $this->request->getData();
            $requisicao['id_usuario'] =  $this->Auth->user('id');
            $requisicao['status'] = 1;
            
            $cliente = $this->Clientes->patchEntity($cliente,$requisicao, ['validate' => true]);
            
            //verifica se o CPF nao esta em duplicidade;
            $verificacao = $this->Clientes
                ->find()
                ->where([
                    'cpf' => $cliente['cpf'],
                ])
                ->count();
            if($verificacao > 0){
                $this->Flash->error('CPF em duplicidade');
                return;
            }

            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('Dados do cliente salvo com sucesso.'));
                return $this->redirect(['action' => 'adicionar']);
            } else {
                $this->Flash->error('Dados pessoais do cliente nao pode ser Salvo.');
                return;
            }
        }
    }
    public function edit($id = null)
    {

        $cliente = $this->Clientes->get($id);

        if ($this->request->is(['post', 'put',])) {

            $clienteEdicao = $this->Clientes->patchEntity($cliente, $this->request->getData());
          
            if ($this->Clientes->save($clienteEdicao)) {

                $this->Flash->success(__('Cliente Editado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->danger('Cliente nao pode ser editado.');
            }
        }
        $this->set(compact('cliente'));
    }
    public function  adicionarContato($id)
    {

            $this->loadModel('Contatos');

            $verificacao = $this->Contatos
                ->find()
                ->where([
                    'id_cliente' => $id,
                    'principal' => true,
                ])
                ->count();

                $contato = $this->request->data;
            
           

        if ($this->request->is(['patch', 'post', 'put',])) {

            if($verificacao > 0 && $contato['Principal'] == 1){
                $this->Flash->error('Cliente ja possui numero principal');
                return;
            }

            $this->loadModel('Contatos');
            $entityContato = $this->Contatos->newEntity([

                'id_cliente' => $id,
                'codigo_pais' => $contato['Codigo_Pais'],
                'ddd' => $contato['DDD'],
                'numero' => $contato['Celular'],
                'principal' => $contato['Principal'],
                'whatsapp' => $contato['Whatsapp']
            ]);

            if ($this->Contatos->save($entityContato)) {
                $this->Flash->success(__('Contato Cadastrado com sucesso.'));
            } else {
                $this->Flash->error('Numero de contato em duplicidade');
            }
        }
    }
    public function adicionarEndereco($id)
    {
        if ($this->request->is(['patch', 'post', 'put',])) {

            $endereco = $this->request->data;

            $this->loadModel('Enderecos');
            $entityEndereco = $this->Enderecos->newEntity([

                'id_usuario' =>  $this->Auth->user('id'),
                'id_cliente' => $id,
                'logradouro' => $endereco['Logradouro'],
                'numero' => $endereco['Numero'],
                'complemento' => $endereco['Complemento'],
                'bairro' => $endereco['Bairro'],
                'id_cidade' => $endereco['Cidade'],
                'cep' => $endereco['Cep']
            ]);
            if ($this->Enderecos->save($entityEndereco)) {
                $this->Flash->success(__('Endereco Cadastrado com sucesso.'));
            } else {
                $this->Flash->error('Endereco nao pode ser salvo');
            }
        }

    }
}