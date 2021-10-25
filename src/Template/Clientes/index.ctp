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

    <h3>Lista de Clientes</h3>

    <nav class="large-2 medium-2 ">
        <ul class="side-nav">
            <?php echo $this->Html->link(__('Adicionar novo Cliente '), ['controller' => 'clientes', 'action' => 'adicionar']); ?>
        </ul>
    </nav>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Status</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>

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
                            __(' Adicionar Contato '),
                            ['controller' => 'clientes', 'action' => 'adicionarContato', $cliente->id]
                        );
                        echo $this->Html->link(
                            __(' Adicionar Endereco '),
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