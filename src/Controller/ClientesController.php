<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Cliente;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

class ClientesController extends AppController{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
            'order' => ['Usuarios.id' => 'asc',]
    ];  
   $clientes = $this->paginate($this->Clientes);
      $this->set(compact('clientes'));
}

public function view($id = null){
    
     
        $this->loadModel('Enderecos');

        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos','Contatos']
        ]);

        $this->set(compact('cliente'));

    

}


public function adicionar()
{
    
    if ($this->request->is(['patch', 'post', 'put',])) {


        $cliente = $this->request->data();
        
        $entityCliente = $this->Clientes->newEntity ([
            'id_usuario' => '3',
            // id_usuario => $this->Auth-usuarios('id'),
            'nome' => $cliente['Nome'],
            'cpf' => $cliente['CPF'],
            'email' => $cliente['Email'],
            'status' => $cliente['status'] ]);
    
        $idCliente = null;
        if($this->Clientes->save($entityCliente)) {
            $idCliente = $entityCliente->id;
            
        } 

        //Esse componente loadModel e usado quando esta acessando uma tabela diferente da controler
        $this->loadModel('Enderecos');
        $entityEndereco = $this->Enderecos->newEntity ([

            'id_usuario' => '3',
            'id_cliente' => $idCliente,
            // id_usuario => $this->Auth-usuarios('id'),
            'logradouro' => $cliente['Logradouro'],
            'numero' => $cliente['Numero'],
            'complemento' => $cliente['Complemento'],
            'bairro' => $cliente['Bairro'],
            'id_cidade' => $cliente['Cidade'],
            'cep' => $cliente['Cep'] ]);          
             
        if($this->Enderecos->save($entityEndereco)) {
            
        } 

        $this->loadModel('Contatos');
        $entityContato = $this->Contatos->newEntity ([

            'id_cliente' => $idCliente,
            'codigo_pais' => $cliente['Codigo Pais'],
            'ddd' => $cliente['DDD'],
            'numero' => $cliente['Celular'],
            'principal' => $cliente['Principal'],
            'whatsapp' => $cliente['Whatsapp'] ]);                         
             
        if($this->Contatos->save($entityContato)) {
            
        } 
        $this->Flash->success(__('Cliente Cadastrado com sucesso.'));
        return $this->redirect(['action' => 'index']);
    }    
    
}

public function edit($id = null){

       
      
      }
      
public function inativar()
    {

        $cliente->status = 0 ;
        $clientesTable->save($cliente);

    }
}