<div class="large-9 medium-9 columns content">

<h3>Cadastro de Filme</h3>

<?php
echo $this->Form->create($filme);

echo $this->Form->control('titulo',['required' => true]);
echo $this->Form->control('id_genero' ,['required' => true]);
echo $this->Form->control('id_usuario',['required' => true]);
echo $this->Form->control('id_diretor',['required' => true]);
echo $this->Form->control('lancamento',['required' => true]);
echo $this->Form->control('valor_compra',['required' => true]);
echo $this->Form->control('status' ,['required' => true]);
echo $this->Form->control('idioma',['required' => true]);

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index']);
echo $this->Form->button('Cadastrar');

echo $this->Form->end();
?>
</div>