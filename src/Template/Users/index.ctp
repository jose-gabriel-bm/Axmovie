<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>

<div class="users index large-10 medium-10 columns content">
    <h3>Lista de Usuarios</h3>
    <table>
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Status</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($usuarios as $usuario): ?>
            <tr>                
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->perfi->perfil ?></td>
                
                <td><?php echo $usuario->opcoes_status; ?></td>
                <td>
                <?php echo $this->Html->link(__(' Visualizar '), 
                ['controller' => 'Users', 'action' => 'view', $usuario->id]);

                echo $this->Html->link(__(' Editar '), 
                ['controller' => 'Users', 'action' => 'edit', $usuario->id]);
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