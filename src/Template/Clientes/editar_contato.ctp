<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

    <div class="large-4 medium-4 container3">
        <label>
            <h5 class="titulo"><b>Editar Contato</b></h5>
        </label>
        <?php
            echo $this->Form->create($cliente);
            echo $this->Form->control('codigo_pais', ['default' => '55','label' => 'Codigo Pais']);
            echo $this->Form->control('ddd', ['default' => '62','label' => 'DDD']);
            echo $this->Form->control('numero', ['label' => 'Celular','required' => true]);
        ?>
        <label>
            Principal ?
        </label>
        <?php
            echo $this->Form->radio('Principal', ['Não ', 'Sim'], ['required' => true]);
        ?>
        <label>
            whatsapp ?
        </label>
        <?php
            echo $this->Form->radio('Whatsapp', ['Não ', 'Sim'], ['required' => true]);
            echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes', 'action' => 'index']);
            echo $this->Form->button('Cadastrar');
            echo $this->Form->end(); 
        ?>
    </div> 