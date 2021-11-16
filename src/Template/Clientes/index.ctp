<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users index large-10 medium-10 columns content">

    <h3>Lista de Clientes</h3>

    <?php echo $this->Html->link(__('Adicionar novo Cliente '), ['controller' => 'clientes', 'action' => 'adicionar']); ?>

<div class="dropdown">
    <button class="mainmenubtn">Pesquisar</button>
    <div class="dropdown-child">
        <a>
            <?php
                echo $this->Form->create(null, ['type' => 'get']);
        	    echo $this->Form->input(
                'nome',[
                    'label' => false, 
        		        'placeholder' => 'Nome do cliente' ]);
        	    echo $this->Form->input('email', 
        		    ['label' => false, 
        		    'placeholder' => 'Email']);
                echo $this->Form->input('cpf', 
        		    ['label' => false, 
        		    'placeholder' => 'CPF' ]);
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
                <th><?= $this->Paginator->sort('nome', 'Nome')?></th>
                <th><?= $this->Paginator->sort('cpf', 'CPF')?></th>
                <th><?= $this->Paginator->sort('email', 'E-mail')?></th>
                <th><?= $this->Paginator->sort('status', 'Status')?></th>
                <th><?= $this->Paginator->sort('açoes', 'Ações')?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente ) : ?>
               
                <tr>
                    <td><?php echo $cliente->nome; ?></td>
                    <td><?php echo $cliente->cpf; ?></td>
                    <td><?php echo $cliente->email; ?></td>
                    <td><?php echo $cliente->opcoes_status; ?></td>

                    <td>
                        <?php echo $this->Html->link(
                            __(' Visualizar '),
                            ['controller' => 'clientes', 'action' => 'view', $cliente->id]
                        );

                        echo $this->Html->link(
                            __(' Editar '),
                            ['controller' => 'clientes', 'action' => 'edit', $cliente->id]
                        );

                        echo $this->Html->link(
                            __('Contatos '),
                            ['controller' => 'clientes', 'action' => 'adicionarContato', $cliente->id]
                        );
                        echo $this->Html->link(
                            __(' Endereços '),
                            ['controller' => 'clientes', 'action' => 'adicionarEndereco', $cliente->id]
                        );

                        ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<<' . __('Primeira')); ?>
            <?php echo $this->Paginator->prev('<' . __('Anterior')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('Proxima') . '>'); ?>
            <?php echo $this->Paginator->last(__('Ultima') . '>>'); ?>
        </ul>
        <p>
            <?php

            echo $this->Paginator->counter(['format' => __('Pagina {{page}} 
                de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}')]);

            ?>
        </p>
    </div>
</div>