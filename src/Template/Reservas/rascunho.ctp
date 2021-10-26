    echo $this->Form->input(
        'id_cliente',
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $cliente,
            'label' => 'Cliente',
            'disabled' => true
        ]
    );
    echo $this->Form->input(
        'id_filme',
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $filme,
            'label' => 'Filme',
            'disabled' => true
        ]
    );
    echo $this->Form->control('data_inicio_locacao', ['disabled' => true]);
    echo $this->Form->control('data_limite_devolucao', ['disabled' => true]);
    echo $this->Form->control('valor_total_pagar', ['label' => 'Total a pagar']);


    echo "Cliente: $cliente[$idCliente]";
    echo "Filme: $filme[$idFilme]";


        
        
   