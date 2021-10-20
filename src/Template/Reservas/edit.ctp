<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users index large-6 medium-6 columns content">
<h3> Editar Reserva<h3>
<?php

echo $this->Form->create($reserva);

echo $this->Form->control('id_cliente' );
echo $this->Form->control('id_filme');
echo $this->Form->control('data_limite_devolucao');

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Reservas','action' =>'index']);

echo $this->Form->button('Salvar');

echo $this->Form->end();

?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>