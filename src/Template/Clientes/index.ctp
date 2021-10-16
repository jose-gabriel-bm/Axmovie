<div class="users index large-12 medium-12 columns content">
    <h3>Lista de Clientes</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>titulo</th>
                <th>id_genero</th>
                <th>id_usuario</th>
                <th>id_diretor</th>
                <th>lancamento?</th>
                <th>valor do Filme</th>
                <th>status</th>
                <th>idioma</th>
                <th>Açoes</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente->id; ?></td>
                <td><?php echo $cliente->titulo; ?></td>
                <td><?php echo $cliente->id_genero; ?></td>
                <td><?php echo $cliente->id_usuario; ?></td>
                <td><?php echo $cliente->id_diretor; ?></td>
                <td><?php echo $cliente->lancamento; ?></td>
                <td><?php echo $cliente->valor_compra; ?></td>
                <td><?php echo $cliente->status; ?></td>
                <td><?php echo $cliente->idioma; ?></td>
                
                <td>
                <?php echo $this->Html->link(__(' Visualizar '), 
                ['controller' => 'filmes', 'action' => 'view', $filme->id]);

                echo $this->Html->link(__(' Editar '), 
                ['controller' => 'filmes', 'action' => 'edit', $filme->id]);
                
                echo $this->Form->postlink(('Deletar'), ['action' => 'delete',$filme->id ],
                ['confirm' => 'Realmente deseja apagar o usuario?', $filme->id ]); 
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