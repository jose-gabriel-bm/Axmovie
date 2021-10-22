<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li> 
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>
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
echo $this->Form->control('Codigo_Pais',['default' => '55']);
echo $this->Form->control('DDD',['default' => '62']);
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
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>