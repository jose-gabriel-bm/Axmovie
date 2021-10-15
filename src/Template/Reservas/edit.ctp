<div class="users index large-6 medium-6 columns content">
<h3> Editar Reserva<h3>
<?php

echo $this->Form->create($reserva);

echo $this->Form->control('id_cliente' );
echo $this->Form->control('id_filme');
echo $this->Form->control('id_usuario');
echo $this->Form->control('valor_multa_atraso');
echo $this->Form->control('valor_total_pagar');
echo $this->Form->control('created' );
echo $this->Form->control('data_limite_devolucao');
echo $this->Form->control('data_devolucao' );
echo $this->Form->control('status');

echo $this->Form->button('Salvar');

echo $this->Form->end();

?>
</div>