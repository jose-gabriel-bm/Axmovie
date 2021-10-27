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

        // debug($cliente);
        $this->set(compact('cliente'));
    }


    public function adicionar()
    {

        if ($this->request->is(['patch', 'post', 'put',])) {

            $cliente = $this->request->data();

            $entityCliente = $this->Clientes->newEntity([
                'id_usuario' =>  $this->Auth->user('id'),
                'nome' => $cliente['Nome'],
                'cpf' => $cliente['CPF'],
                'email' => $cliente['Email'],
                'status' => 1
            ]);

            $idCliente = null;
            if ($this->Clientes->save($entityCliente)) {
                $idCliente = $entityCliente->id;
            } else {
                $this->Flash->error('Dados pessoais do cliente nao pode ser Salvo.');
                return;
            }

            //Esse componente loadModel e usado quando esta acessando uma tabela diferente da controler
            $this->loadModel('Enderecos');
            $entityEndereco = $this->Enderecos->newEntity([

                'id_usuario' =>  $this->Auth->user('id'),
                'id_cliente' => $idCliente,
                'logradouro' => $cliente['Logradouro'],
                'numero' => $cliente['Numero'],
                'complemento' => $cliente['Complemento'],
                'bairro' => $cliente['Bairro'],
                'id_cidade' => $cliente['Cidade'],
                'cep' => $cliente['Cep']
            ]);

            $this->Enderecos->save($entityEndereco);

            $this->loadModel('Contatos');
            $entityContato = $this->Contatos->newEntity([

                'id_cliente' => $idCliente,
                'codigo_pais' => $cliente['Codigo_Pais'],
                'ddd' => $cliente['DDD'],
                'numero' => $cliente['Celular'],
                'principal' => $cliente['Principal'],
                'whatsapp' => $cliente['Whatsapp']
            ]);

            if ($this->Contatos->save($entityContato)) {
                $this->Flash->success(__('Cliente Cadastrado com sucesso.'));
            } else {
                $this->Flash->error('Numero de contato em duplicidade');
                return $this->redirect(['action' => 'adicionar']);
            }

            return $this->redirect(['action' => 'index']);
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