<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]); ?>
    </ul>
</nav>
<div class="large-9 medium-9 columns content">
    <div class="large-7 medium-7 columns content">
        <label>
            <h5><b>Adicionar Contato</b></h5>
        </label>
        <?php
            echo $this->Form->create();
            echo $this->Form->control('Codigo_Pais', ['default' => '55']);
            echo $this->Form->control('DDD', ['default' => '62']);
            echo $this->Form->control('Celular', ['required' => true]);
        ?>
        <label>
            Principal ?
        </label>
        <?php
            echo $this->Form->radio('Principal', ['Não ', 'Sim'], ['required' => true]);
        ?>
        <label>
            whatsapp ?
        </label>
        <?php
            echo $this->Form->radio('Whatsapp', ['Não ', 'Sim'], ['required' => true]);
            echo $this->Form->button('Cadastrar');
            echo $this->Form->end(); 
        ?>
    </div>
    
    <div>
        <label>
            <h5><b>Contatos</b></h5>
        </label>
        <table>
            <thead>
                <tr>
                    <th>DDD</th>
                    <th>Celular</th>
                    <th>Principal</th>
                    <th>Whatsapp</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente->contatos as $contato ) : ?>
                    <tr>
                        <td><?php echo $contato['ddd']; ?></td>
                        <td><?php echo $contato['numero']; ?></td>
                        <td><?php echo $contato['numero_principal']; ?></td>
                        <td><?php echo $contato['possui_whatsapp']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="users view large-1 medium-1 columns content"></div>