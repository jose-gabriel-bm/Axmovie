<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users index large-10 medium-10 columns content">
    <h3>Lista de Filmes</h3>
    <nav class="large-2 medium-2 ">
        <ul class="side-nav">
        <?php echo $this->Html->link(__('Adicionar novo Filme '), ['controller' => 'filmes','action' =>'adicionar']); ?>  
    </ul>
    </nav>

<div class="dropdown">
    <button class="mainmenubtn">Pesquisar</button>
    <div class="dropdown-child">
        <a>
            <?php
                echo $this->Form->create(null, ['type' => 'get']);
        	    echo $this->Form->input(
                'titulo',[
                    'label' => false, 
        		    'placeholder' => 'Nome do Filme' ]);
                echo $this->Form->input('valor_compra', 
        		    ['label' => false, 
        		    'placeholder' => 'Valor do Filme' ]);
                echo $this->Form->input('idioma', 
        		    ['label' => false, 
        		    'placeholder' => 'Idioma' ]);
                echo $this->Form->select(
                    'lancamento', [                                            
                        'sim' => 'Sim',
                        'nao' => 'Nao',
                    ],
                    ['empty' => 'Selecionar Lancamento'],
                );
                echo $this->Form->select(
                    'status', [                                            
                        'Ativo' => 'Ativo',
                        'Inativo' => 'Inativo',
                    ],
                    ['empty' => 'Selecionar Status'],
                );
                echo $this->Form->button('Pesquisar');
                echo $this->Form->end();
            ?>     
        </a>
    </div>
</div> 
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('titulo', 'Titulo')?></th>
                <th><?= $this->Paginator->sort('genero', 'Genero')?></th>
                <th><?= $this->Paginator->sort('id_diretor', 'Diretor')?></th>
                <th><?= $this->Paginator->sort('lancamento', 'Lancamento')?></th>
                <th><?= $this->Paginator->sort('valor_compra', 'valor do Filme')?></th>
                <th><?= $this->Paginator->sort('status', 'Status')?></th>
                <th><?= $this->Paginator->sort('idioma', 'Idioma')?></th>
                <th><?= $this->Paginator->sort('açoes', 'Ações')?></th>    
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
            <tr>

                <td><?php echo $filme->titulo; ?></td>
                <td><?php echo $filme->genero->genero; ?></td>
                <td><?php echo $filme->diretore->nome; ?></td>
                <td><?php echo $filme->opcoes_lancamento; ?></td>
                <td><?php echo 'R$ ',$filme->valor_compra; ?></td>
                <td><?php echo $filme->opcoes_status; ?></td>
                <td><?php echo $filme->idioma; ?></td>
                
                <td>
                <?php echo $this->Html->link(__(' Visualizar '), 
                ['controller' => 'filmes', 'action' => 'view', $filme->id]);
                echo $this->Html->link(__(' Editar '), 
                ['controller' => 'filmes', 'action' => 'edit', $filme->id]);
                
                // echo $this->Form->postlink(('Deletar'), ['action' => 'delete',$filme->id ],
                // ['confirm' => 'Realmente deseja apagar o usuario?', $filme->id ]); 
                // ?> 

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<<' .__('Primeira'));?>
            <?php echo $this->Paginator->prev('<' .__('Anterior'));?>
            <?php echo $this->Paginator->numbers();?>
            <?php echo $this->Paginator->next(__('Proxima').'>');?>
            <?php echo $this->Paginator->last(__('Ultima').'>>');?>
        </ul>
        <p>
            <?php

                echo $this->Paginator->counter(['format' => __('Pagina {{page}} 
                de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}')]);
                
            ?>
        </p>
    </div>
</div>