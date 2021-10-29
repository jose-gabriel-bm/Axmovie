<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users index large-6 medium-6 columns content">
        <h3> Editar Filme<h3>
<?php
        echo $this->Form->create($filme);
        echo $this->Form->control('titulo');
        echo $this->Form->input(
        'id_genero', 
    [
        'type' => 'select',
        'multiple' => false,
        'options' =>  $generos,
        'label'=>'Genero'
    ]);

        echo $this->Form->input(
        'id_diretor', 
    [
        'type' => 'select',
        'multiple' => false,
        'options' =>  $diretores,
        'label'=>'Diretor'
    ]); 
?>
    <label>Lancamento</label>
<?php
        echo $this->Form->radio('lancamento', ['Não', 'Sim']);
        echo $this->Form->control('valor_compra');
?>
    <label>Status</label>
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

        echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index']);
        echo $this->Form->button('Salvar');

        echo $this->Form->end();
?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>