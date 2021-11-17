<?php

namespace App\Controller;

use App\Controller\AppController;

class ClientesController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => [
            'Clientes.id' => 'Desc',]
        ];

        $busca =  $this->request->query();
        $this->buscaIndex($busca);

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
            
            $cliente = $this->Clientes->patchEntity($cliente,$requisicao);

            //verifica se o nome nao esta em duplicidade;
                $verificacao = $this->Clientes
                ->find()
                ->where([
                    'nome' => $cliente['nome'],
                ])
                ->count();
            if($verificacao > 0){
                $this->Flash->error('Nome ja esta cadastrado');
                return;
            }

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

            //verificar a quantidade de caracteres.
            $contagemCaracteres = strlen($cliente['cpf']);
            if($contagemCaracteres < 11 ){
                $this->Flash->error('CPF deve ter no minimo 11 caracteres');
                return;
            }
            if($contagemCaracteres > 11){
                $this->Flash->error('CPF deve ter no maximo 11 caracteres');
                return;
            }
            
            //Salva a requisição
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
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos', 'Contatos']
        ]);
        $this->set(compact('cliente'));


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
                header("Refresh: 1"); 
            } else {
                $this->Flash->error('Numero de contato em duplicidade');
            }
        }       
    }
    public function adicionarEndereco($id)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos', 'Contatos']
        ]);
        $this->set(compact('cliente'));

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
                header("Refresh: 1"); 
            } else {
                $this->Flash->error('Endereco nao pode ser salvo');
            }
        }

    }

    public function editarContato($id = null){

        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos', 'Contatos']
        ]);
        $this->set(compact('cliente'));

        // debug($cliente->contatos[0]->numero);

        if ($this->request->is(['post', 'put',])) {

            $clienteEdicao = $this->Clientes->patchEntity($cliente, $this->request->getData());

            // if ($this->Clientes->save($clienteEdicao)) {

            //     $this->Flash->success(__('Cliente Editado com sucesso.'));
            //     return $this->redirect(['action' => 'index']);
            // } else {
            //     $this->Flash->danger('Cliente nao pode ser editado.');
            // }
        }
        
        $this->set(compact('cliente'));
    }


    public function deleteContato($id = null)
    {

        $this->loadModel('Contatos');

        $this->request->allowMethod(['post', 'delete']);
        $contato = $this->Contatos->get($id);
        
        if ($this->Contatos->delete($contato)) {
            $this->Flash->success(__('Contato Deletado com sucesso'));
            return $this->redirect(['controller'=> 'clientes','action'=>'adicionar_contato',$contato->id_cliente]);
        } else {
            $this->Flash->error(__('Contato nao pode ser deletado'));
            return $this->redirect(['controller'=> 'clientes','action'=>'adicionar_contato',$contato->id_cliente]);
        }

    }
    public function deleteEndereco($id = null){

        $this->loadModel('Enderecos');

        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('Endereco Deletado com sucesso'));
            return $this->redirect(['controller'=> 'clientes','action'=>'adicionar_endereco',$endereco->id_cliente]);
        } else {
            $this->Flash->error(__('Endereco nao pode ser deletado'));
            return $this->redirect(['controller'=> 'clientes','action'=>'adicionar_endereco',$endereco->id_cliente]);
        }
    }
    public function buscaIndex($busca)
    {
        if (isset($busca)) 
        {

            $clientes = $this->Clientes->find('all');

            if(isset($busca['nome'])){   
                $clientes = $clientes->where(['nome LIKE' => "%$busca[nome]%"]); 
            }
            if(isset($busca['cpf'])){  
                $clientes = $clientes->where(['cpf LIKE' => "%$busca[cpf]%"]);   
            }
            if(isset($busca['email'])){    
                $clientes = $clientes->where(['email LIKE' => "%$busca[email]%"]); 
            }
            if(isset($busca['status'])){
                if($busca['status'] == 'Ativo'):
                    $clientes = $clientes->where(['status =' => 1]);
                endif;
                if($busca['status'] == 'Inativo'):
                    $clientes = $clientes->where(['status =' => 0]);
                endif;
            }
        } else {
            $clientes = $this->Clientes->find('all');
        }
        $clientes = $this->paginate($clientes);
        $this->set(compact('clientes'));
    }
    
}