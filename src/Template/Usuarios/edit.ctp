<div class="users index large-6 medium-6 columns content">
<h3> Editar Usuario<h3>
<?php

echo $this->Form->create($usuario);

echo $this->Form->control('nome');
echo $this->Form->control('email');
echo $this->Form->control('password');
echo $this->Form->radio('status', ['Inativo', 'Ativo']);
echo $this->Form->control('id_perfil');

echo $this->Form->button('Salvar');

echo $this->Form->end();

?>
</div>