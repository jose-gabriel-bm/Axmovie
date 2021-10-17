<div class="large-6 medium-6 columns content">

<h3>Cadastro de Clientes</h3>

<?php
echo $this->Form->create(null); ?>

<div>
<label>
    <h5><b>Dados pessoais</b></h5>
</label>
<?php
echo $this->Form->control('Nome',['required' => true]);
echo $this->Form->control('CPF' ,['required' => true]);
echo $this->Form->control('Email');?>
<label>Status*</label>
<?php
echo $this->Form->radio('status', ['Inativo', 'Ativo'],['required' => true]);
?>
</div>
<div>
<label>
    <h5><b>Endereço</b></h5>
</label>

<?php
echo $this->Form->control('Logradouro',['required' => true]);
echo $this->Form->control('Numero');
echo $this->Form->control('Complemento');
echo $this->Form->control('Bairro',['required' => true]);
echo $this->Form->control('Cidade');
echo $this->Form->control('Cep');
?>
</div>
<label>
    <h5><b>Contato</b></h5>
</label>

<?php
echo $this->Form->control('Codigo Pais');
echo $this->Form->control('DDD');
echo $this->Form->control('Celular',['required' => true]);
?>
<label>Principal ?*</label>
<?php
echo $this->Form->radio('Principal', ['Não ', 'Sim'],['required' => true]);
?>
<label>whatsapp ?*</label>
<?php
echo $this->Form->radio('Whatsapp', ['Não ', 'Sim'],['required' => true]);
?>

<?php
echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes','action' =>'index']);
echo $this->Form->button('Cadastrar');
?>
<?php echo $this->Form->end();?>

</div>