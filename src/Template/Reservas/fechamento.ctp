<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>

<div class="users index large-6 medium-6 columns content">
    <h3> Fechamento de Reserva<h3>
    <?php

        echo $this->Form->create($reserva);
        
        echo $this->Form->input('id_cliente', 
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $cliente,
            'label'=>'Cliente',
            'disabled' => true
        ]
        );
        echo $this->Form->input('id_filme', 
        [
            'type' => 'select',
            'multiple' => false,
            'options' => $filme,
            'label'=>'Filme',
            'disabled' => true
        ]
        );
        echo $this->Form->control('data_inicio_locacao',['disabled' => true]);
        echo $this->Form->control('data_limite_devolucao',['disabled' => true]);
        echo $this->Form->control('data_devolucao',['disabled' => true]);
        echo $this->Form->control('valor_multa_atraso',['disabled' => true, 'label'=>'Multa por atraso']);
        echo $this->Form->control('valor_total_pagar',['disabled' => true, 'label'=>'Total a pagar']);

        

        echo $this->Html->link(__('Voltar '), ['controller' => 'Reservas','action' =>'index']);  
        echo $this->Form->button(' Finalizar ');
        echo $this->Form->end();

?>

</div>


<div class="users view large-4 medium-4 columns content">
    <table border>
        <caption style="background-color:#2d7177">Tabela de Preços</caption>
        <tr >
            <td>Valor locaçao /Hr: </td>
            <td><?php echo '00,15' ?></td>
        </tr>
        <tr>
            <td>Valor Multa / Hr: </td>
            <td><?php echo 'valor da Locaçao  +  00,10'; ?></td>
        </tr>      
    </table>
</div>
   
