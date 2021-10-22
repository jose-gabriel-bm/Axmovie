<?php

namespace App\Controller;

use App\Controller\AppController;

class FilmesController extends AppController{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
        'order' => [
        'Filmes.id' => 'desc',]
    ];  
    $filmes = $this->Filmes->find('all',[
        'contain' => ['Generos','Diretores']
    ]);
    
   $filmes = $this->paginate($filmes);

   $this->set(compact('filmes'));
}

public function view($id = null){

    $filme = $this->Filmes->get($id);
    $this->set(['filme' => $filme]);

    $filme = $this->Filmes->get($id, [
       'contain' => ['Generos','Diretores']
    ]);
    $this->set(compact('filme'));
}

public function adicionar(){
    
    $filme = $this->Filmes->newEntity();
    
    $this->loadModel('Generos');
    $generos =$this->Generos->find('list', [
        'keyField' => 'id',
        'valueField' => 'genero'
    ])->toArray();

    $this->loadModel('Diretores');
    $diretores =$this->Diretores->find('list', [
        'keyField' => 'id',
        'valueField' => 'nome'
    ])->toArray();

    if($this->request->is('post')){
        
        $filme = $this->Filmes->patchEntity($filme, $this->request->getData());

        if($this->Filmes->save($filme)){
            $this->Flash->success(__('Filme Cadastrado com sucesso'));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('Erro: Filme não foi Cadastrado, tentar novamente '));
        }
    }   
    $this->set(compact('filme','generos','diretores'));

    }

    public function edit($id = null){

        $filme = $this->Filmes->get($id);

        $this->loadModel('Generos');
        $generos =$this->Generos->find('list', [
            'keyField' => 'id',
            'valueField' => 'genero'
        ])->toArray();
    
        $this->loadModel('Diretores');
        $diretores =$this->Diretores->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->toArray();
      
        if($this->request->is(['post','put'])){
           $filme = $this->Filmes->patchEntity($filme, $this->request->data);
           
           if($this->Filmes->save($filme)){
              $this->Flash->success('Filme editado com sucesso');
              return $this->redirect(['action' => 'index']);
           }else{
              $this->Flash->error('Filme não foi editado, por gentileza tentar novamente');
           }
        }
      
        $this->set(compact('filme','generos','diretores'));
      
      }
      

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filme = $this->Filmes->get($id);
        if($this->Filmes->delete($filme)){
            $this->Flash->success('Filme deletado com sucesso');
        }else{
            $this->Flash->error('Filme nao pode ser deletado, verificar e tentar novamente');
        }
        return $this->redirect(['action' =>'index']);      
    }
}