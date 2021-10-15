<div class="large-9 medium-9 columns content">

<h3>Cadastro de Filme</h3>

<?php

use PhpParser\Node\Stmt\Label;

echo $this->Form->create($filme);

echo $this->Form->control('titulo',['required' => true]);
echo $this->Form->control('id_genero' ,['required' => true]);
echo $this->Form->control('id_usuario',['required' => true]);
echo $this->Form->control('id_diretor',['required' => true]);
echo $this->Form->control('lancamento');
echo $this->Form->control('valor_compra',['required' => true]);
echo $this->Form->radio('status', ['Inativo', 'Ativo']);
echo $this->Form->select('idioma', ['Ingles', 'Japones','Chines','Portugues','Hindi','Espanhol'],
['empty' => 'Selecione idioma']);

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index'],['required' => true]);
echo $this->Form->button('Cadastrar');

echo $this->Form->end();
?>
</div>