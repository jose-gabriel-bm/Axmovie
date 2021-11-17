<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

    
<div class="users index large-10 medium-10 columns content">
    <h3>Lista de Reservas</h3>
        <?php echo $this->Html->link(__('Adicionar nova Reserva '),
        ['controller' => 'reservas', 'action' => 'adicionar']);  
        ?>
<div class="dropdown">
    <button class="mainmenubtn">Pesquisar</button>
    <div class="dropdown-child">
        <a>
            <?php
                echo $this->Form->create(null, ['type' => 'get']);
        	    echo $this->Form->input(
                'nome',[
                    'label' => false, 
        		    'placeholder' => 'Nome do Cliente' ]);
                echo $this->Form->input('titulo', 
        		    ['label' => false, 
        		    'placeholder' => 'Nome Filme' ]);

                echo $this->Form->select(
                    'status', [                                            
                        'Aberta' => 'Aberta',
                        'Fechada' => 'Fechada',
                    ],
                    ['empty' => 'Selecionar Status'],
                );
                echo $this->Form->button('Pesquisar');
                echo $this->Form->end();
            ?>     
        </a>
    </div>
</div> 
</div>
    <div class="users index large-10 medium-10 columns content " style="padding-top: 0px !important;">
       
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_cliente', 'Cliente') ?></th>
                    <th><?= $this->Paginator->sort('id_filme', 'Filme') ?></th>
                    <th><?= $this->Paginator->sort('data_inicio_locacao', 'Data de Inicio Locação') ?></th>
                    <th><?= $this->Paginator->sort('data_limite_devolucao', 'Data Limite de Devolução') ?></th>
                    <th style="text-align: center;"><?= $this->Paginator->sort('data_devolucao', 'Data Devolução') ?></th>
                    <th style="text-align: center;"><?= $this->Paginator->sort('status', 'Status') ?></th>
                    <th style="text-align: center;"><?= $this->Paginator->sort('açoes', 'Ações') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva) : ?>
                    <tr>
                        <td><?php echo $reserva->cliente->nome; ?></td>
                        <td><?php echo $reserva->filme->titulo; ?></td>
                        <td><?php echo $reserva->data_inicio_locacao; ?></td>
                        <td><?php echo $reserva->data_limite_devolucao; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo !$reserva->data_devolucao ? "-" : $reserva->data_devolucao; ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $reserva->opcoes_status; ?></td>

                        <td style="text-align: center; vertical-align: middle;">


                            <?php
                            if ($reserva->status == 1) {

                                echo $this->Html->link(
                                    __(' Editar '),
                                    ['controller' => 'reservas', 'action' => 'edit', $reserva->id]
                                );

                                echo $this->Html->link(
                                    __(' Detalhes'),
                                    ['controller' => 'reservas', 'action' => 'view', $reserva->id]
                                );

                                echo $this->Html->link(
                                    __(' Fechar Reserva '),
                                    ['controller' => 'reservas', 'action' => 'fechamento', $reserva->id]
                                );
                            } else {
                                echo $this->Html->link(
                                    __(' Detalhes'),
                                    ['controller' => 'reservas', 'action' => 'view', $reserva->id]
                                );
                            }

                            // echo $this->Form->postlink(('Deletar'), ['action' => 'delete',$reserva->id ],
                            // ['confirm' => 'Realmente deseja apagar o usuario?', $reserva->id ]); 
                            // 
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