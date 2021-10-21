<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
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
        'label'=>'Cliente'
    ]
);
echo $this->Form->input('id_filme', 
    [
        'type' => 'select',
        'multiple' => false,
        'options' => $filme,
        'label'=>'Filme'
    ]
);
echo $this->Form->control('data_inicio_locacao',
    [ 
    'type' => 'datetime',
    'minYear' => date('Y') +1, 
    'maxYear' => date('Y') + 10,
    
    ]
    );
echo $this->Form->control('data_limite_devolucao',
    [ 
    'type' => 'datetime',
    'dateFormat' => 'dd-MM-yyyy', 
    'minYear' => date('Y') +1, 
    'maxYear' => date('Y') + 10,
    ]
    );

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Reservas','action' =>'index']);
echo $this->Form->button('Cadastrar');

echo $this->Form->end();
?>
</div>