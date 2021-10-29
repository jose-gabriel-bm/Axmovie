<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

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
            echo $this->Form->input(
                'id_diretor', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' =>  $diretores,
                    'label'=>'Diretor'
                ]);
        ?>
            <label>
                Lancamento*
            </label>
        <?php
            echo $this->Form->radio('lancamento', ['Não', 'Sim']);
            echo $this->Form->control('valor_compra',['required' => true]);
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