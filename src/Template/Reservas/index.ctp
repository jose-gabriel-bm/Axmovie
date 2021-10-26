    <nav class="large-2 medium-2 columns" id="actions-sidebar">
        <ul class="side-nav">

            <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]); ?>
        </ul>
    </nav>

    <div class="users index large-10 medium-10 columns content">
    <h3>Lista de Reservas</h3>
    <table>
        <tr>
            <td><?php echo $this->Html->link(__('Adicionar nova Reserva '),
                        ['controller' => 'reservas', 'action' => 'adicionar']
                ); ?></td>
            <td ></td>
            <td style="text-align: right;">
            <?php
                echo $this->Form->create(null, ['type' => 'get']);
	            echo $this->Form->input('search', 
		        ['label' => false, 
		        'placeholder' => 'Digite aqui nome do cliente' ]);?></td>

            <td style="text-align: center;"><?php echo $this->Form->button('Pesquisar')?> </td>
        </tr>
    </table>
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