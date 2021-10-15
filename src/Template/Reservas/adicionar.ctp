<div class="large-9 medium-9 columns content">

<h3>Cadastro de Reserva</h3>

<?php
echo $this->Form->create($reserva);

echo $this->Form->control('id_cliente',['required' => true] );
echo $this->Form->control('id_filme',['required' => true]);
echo $this->Form->control('id_usuario',['required' => true]);
echo $this->Form->control('valor_multa_atraso',['required' => true]);
echo $this->Form->control('valor_total_pagar',['required' => true]);
echo $this->Form->control('created' ,['required' => true]);
echo $this->Form->control('data_limite_devolucao',['required' => true]);
echo $this->Form->control('data_devolucao',['required' => true] );
echo $this->Form->control('status',['required' => true]);

echo $this->Html->link(__('Cancelar  '), ['controller' => 'Reservas','action' =>'index']);
echo $this->Form->button('Cadastrar');

echo $this->Form->end();
?>
</div>