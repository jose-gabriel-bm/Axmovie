<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= $this->Html->link(__('Usuarios'),['controller' => 'Users','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Filmes'),['controller' => 'Filmes','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Clientes'),['controller' => 'Clientes','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Reservas'),['controller' => 'Reservas','action' =>'index'])?>
        </li>  
        <li class="heading">
            <?= $this->Html->link(__(' Sair '),['controller' => 'Users', 'action' => 'logout', '_full' => true]);?>
        </li> 
    </ul>
</nav>
<div class="users index large-6 medium-6 columns content">
    <h3> Editar Usuario<h3>
    <?php
        echo $this->Form->create($usuario);
        echo $this->Form->control('nome');
        echo $this->Form->control('username');
        echo $this->Form->control('email');
        echo $this->Form->control('password',['label '=> 'senha']);?>
    <label>Status</label>
    <?php
        echo $this->Form->radio('status', ['Inativo', 'Ativo']);
        echo $this->Html->link(__('Cancelar  '), ['controller' => 'Users','action' =>'index']);
        echo $this->Form->button('Salvar');
        echo $this->Form->end();
    ?>
</div>

<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>