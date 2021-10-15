<div class="users index large-6 medium-6 columns content">
<h3> Editar Filme<h3>
<?php

echo $this->Form->create($filme);

echo $this->Form->control('titulo');
echo $this->Form->control('id_genero' );
echo $this->Form->control('id_usuario');
echo $this->Form->control('id_diretor');
echo $this->Form->control('lancamento');
echo $this->Form->control('valor_compra');
echo $this->Form->radio('status', ['Inativo', 'Ativo']);
echo $this->Form->select('idioma', ['Ingles', 'Japones','Chines','Portugues','Hindi','Espanhol'],
['empty' => 'Selecione idioma']);

echo $this->Form->button('Salvar');

echo $this->Form->end();

?>
</div>