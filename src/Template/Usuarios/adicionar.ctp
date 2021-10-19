
<div class="large-9 medium-9 columns content">

<h3>Cadastro de Usuario</h3>

<?php
echo $this->Form->create($usuario);

echo $this->Form->control('nome',['required' => true]);
echo $this->Form->control('id_perfil' ,['required' => true]);
echo $this->Form->control('email',['required' => true]);
echo $this->Form->control('password',['required' => true]);
 

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Usuarios','action' =>'login']);
echo $this->Form->button('Cadastrar');

echo $this->Form->end();
?>
</div>