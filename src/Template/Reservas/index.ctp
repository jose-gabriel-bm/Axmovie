<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users index large-10 medium-10 columns content">
    <h3>Lista de Reservas</h3>
    <nav class="large-2 medium-2 ">
        <ul class="side-nav">
        <?php echo $this->Html->link(__('Adicionar nova Reserva '), ['controller' => 'reservas','action' =>'adicionar']); ?>  
        </ul>
    </nav>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Filme</th>
                <th>Usuario</th>
                <th>Multa Atraso</th>
                <th>total a pagar</th>
                <th>Criada em:</th>
                <th>Data Limite Devolucao</th>
                <th>Data Devolucao</th>
                <th>Status</th>
                <th>Açoes</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?php echo $reserva->id; ?></td>
                <td><?php echo $reserva->id_cliente; ?></td>
                <td><?php echo $reserva->id_filme; ?></td>
                <td><?php echo $reserva->id_usuario; ?></td>
                <td><?php echo $reserva->valor_multa_atraso; ?></td>
                <td><?php echo $reserva->valor_total_pagar; ?></td>
                <td><?php echo $reserva->created; ?></td>
                <td><?php echo $reserva->data_limite_devolucao; ?></td>
                <td><?php echo $reserva->data_devolucao; ?></td>
                <td><?php echo $reserva->opcoes_status; ?></td>
                
                <td>
                <?php echo $this->Html->link(__(' Visualizar '), 
                ['controller' => 'reservas', 'action' => 'view', $reserva->id]);

                echo $this->Html->link(__(' Editar '), 
                ['controller' => 'reservas', 'action' => 'edit', $reserva->id]);
                
                echo $this->Form->postlink(('Deletar'), ['action' => 'delete',$reserva->id ],
                ['confirm' => 'Realmente deseja apagar o usuario?', $reserva->id ]); 
                ?> 

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