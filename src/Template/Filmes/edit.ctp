<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users index large-6 medium-6 columns content">
<h3> Editar Filme<h3>
<?php

echo $this->Form->create($filme);

echo $this->Form->control('titulo');
echo $this->Form->control('id_genero' );
echo $this->Form->control('id_usuario');
echo $this->Form->control('id_diretor');?>

<label>Lancamento</label>
<?php
echo $this->Form->radio('lancamento', ['Não', 'Sim']);
echo $this->Form->control('valor_compra');
echo $this->Form->radio('status', ['Inativo', 'Ativo']);
echo $this->Form->select('idioma', ['Ingles', 'Japones','Chines','Portugues','Hindi','Espanhol'],
['empty' => 'Selecione idioma']);

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index'],['required' => true]);
echo $this->Form->button('Salvar');

echo $this->Form->end();

?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>