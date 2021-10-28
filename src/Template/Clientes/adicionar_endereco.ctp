<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]); ?>
    </ul>
</nav>
<div class="large-4 medium-4 container3 ">
    <label>
        <h5 class="titulo"><b>Adicionar Endereço</b></h5>
    </label>

    <?php
    echo $this->Form->create();
    echo $this->Form->control('Logradouro', ['required' => true]);
    echo $this->Form->control('Numero');
    echo $this->Form->control('Complemento');
    echo $this->Form->control('Bairro', ['required' => true]);
    echo $this->Form->control('Cidade');
    echo $this->Form->control('Cep');
    echo $this->Html->link(__('Voltar  '), ['controller' => 'Clientes', 'action' => 'index']);
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
    ?>
</div>

<div class="users view large-6 medium-6 container4 "> 
</table>
        <label>
            <h5 class="titulo"><b>Endereços</b></h5>
        </label>    
    <table>
        <thead>
            <tr>
                <th>Logradouro</th>
                <th>Numero</th>
                <th>Bairro</th>
                <th>Cep</th>
                <th>Complemento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente->enderecos as $endereco ) : ?>
                <tr>
                    <td><?php echo $endereco['logradouro']; ?></td>
                    <td><?php echo $endereco['numero']; ?></td>
                    <td><?php echo $endereco['bairro']; ?></td>
                    <td><?php echo $endereco['cep']; ?></td>
                    <td><?php echo $endereco['complemento']; ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

