<?php

namespace App\Controller;

use App\Controller\AppController;

class FilmesController extends AppController
{

public function index(){
   
    $this->paginate = [
        'limit' => 10,
        'order' => [
        'Filmes.titulo' => 'Desc',]
    ];  

    $busca =  $this->request->query();
    $this->buscaIndex($busca);
 
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

        $requisicao = $this->request->getData();
        $requisicao['id_usuario'] =  $this->Auth->user('id');
        $requisicao['status'] = 1;
        
        $filme = $this->Filmes->patchEntity($filme, $requisicao);

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
    public function buscaIndex($busca)
    {
        $filmes = null;
        
        if ($busca == null) {

            $filmes = $this->Filmes->find('all', [
                'contain' => ['Generos','Diretores']
             ]);

        } else {

            $filmes = $this->Filmes->find('all', [
                'contain' => ['Generos','Diretores']
            ])->where([
                'AND' => [
                    ['titulo LIKE' => "%$busca[titulo]%"],
                    // ['valor_compra LIKE' => "%$busca[valor_compra]%"],
                    ['idioma LIKE' => "%$busca[idioma]%"]
                ]
            ]); 
  
            if($busca['status'] == 'Ativo'):
                $filmes = $filmes->where(['status =' => 1]);
            endif;

            if($busca['status'] == 'Inativo'):
                $filmes = $filmes->where(['status =' => 0]);
            endif;

            if($busca['lancamento'] == 'Sim'):
                $filmes = $filmes->where(['lancamento =' => 1]);
            endif;

            if($busca['lancamento'] == 'Nao'):
                $filmes = $filmes->where(['lancamento =' => 0]);
            endif;
            
        }
        $filmes = $this->paginate($filmes);
        $this->set(compact('filmes'));
    }
    
}