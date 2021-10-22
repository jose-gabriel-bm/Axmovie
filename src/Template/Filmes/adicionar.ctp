<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>

<div class="large-9 medium-9 columns content">

<h3>Cadastro de Filme</h3>

<?php

    echo $this->Form->create($filme);

    echo $this->Form->control('titulo',['required' => true]);
    echo $this->Form->input(
        'id_genero', 
        [
            'type' => 'select',
            'multiple' => false,
            'options' =>  $generos,
            'label'=>'Genero'
        ]);
    echo $this->Form->control('id_usuario' ,['required' => true]);
    echo $this->Form->input(
        'id_diretor', 
        [
            'type' => 'select',
            'multiple' => false,
            'options' =>  $diretores,
            'label'=>'Diretor'
        ]);
    ?>
    <label>Lancamento*</label>
    <?php
    echo $this->Form->radio('lancamento', ['Não', 'Sim']);
    echo $this->Form->control('valor_compra',['required' => true]);
    ?>
    <label>Status*</label>
    <?php
    echo $this->Form->radio('status', ['Inativo', 'Ativo']);

    echo $this->Form->input(
        'idioma', 
        [
            'type' => 'select',
            'multiple' => false,
            'options' => ['Ingles' => 'ingles','Japones' => 'Japones','Chines' => 'Chines','Portugues' => 'Portugues','Hindi' => 'Hindi','Espanhol' =>'Espanhol'],
            'label'=>'Idioma'
        ]
    );

    echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index'],['required' => true]);
    echo $this->Form->button('Cadastrar');

    echo $this->Form->end();
?>
</div>