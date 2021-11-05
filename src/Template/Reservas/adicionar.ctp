<?= $this->element('cabecalho') ?>
<?= $this->element('menulateral') ?>

<div class="large-9 medium-9 columns content">

    <h3>Cadastro de Reserva</h3>

    <?php

    echo $this->Form->create(NULL);

    echo $this->Form->input(
        'id_cliente',
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $cliente,
            'label' => 'Cliente'
        ]
    );
    echo $this->Form->input(
        'id_filme',
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $filme,
            'label' => 'Filme'
        ]
    );
    echo $this->Form->control(
        'data_inicio_locacao',
        [
            'type' => 'datetime',
            'minYear' => date('Y') + 1,
            'maxYear' => date('Y') + 10,

        ]
    );
    echo $this->Form->control(
        'data_limite_devolucao',
        [
            'type' => 'datetime',
            'dateFormat' => 'dd-MM-yyyy',
            'minYear' => date('Y') + 1,
            'maxYear' => date('Y') + 10,
        ]
    );

    echo $this->Html->link(__('Cancelar  '), ['controller' => 'Reservas', 'action' => 'index']);
    echo $this->Form->button('Cadastrar');

    echo $this->Form->end();
    ?>
</div>