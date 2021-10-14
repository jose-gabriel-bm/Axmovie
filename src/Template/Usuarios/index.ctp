<div class="users index large-12 medium-12 columns content">
    <h3>Lista de Usuarios</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>ID Perfil</th>
                <th>Status</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario->id; ?></td>
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->id_perfil; ?></td>
                <td><?php echo $usuario->status; ?></td>
                <td>
                <?= $this->Html->link(__(' Visualizar '), 
                ['controller' => 'usuarios', 'action' => 'view', $usuario->id],
                ['class' => 'btn btn-outline-primary btn-sm']) ?> 

                <?= $this->Html->link(__(' Editar '), 
                ['controller' => 'usuarios', 'action' => 'edit', $usuario->id],
                ['class' => 'btn btn-outline-primary btn-sm']) ?> 

                

                 Deletar</td>
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