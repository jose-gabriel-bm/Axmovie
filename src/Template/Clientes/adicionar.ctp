<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="large-6 medium-6 columns content">

    <h3>Cadastro de Clientes</h3>
    <div>
        <label>
            <h5><b>Dados pessoais</b></h5>
        </label>
        <?php

        echo $this->Form->create(null);
        echo $this->Form->control('nome', ['required' => true , 'label'=> 'Nome']);
        echo $this->Form->control('cpf', ['required' => true, 'label'=> 'CPF']);
        echo $this->Form->control('email',['label'=> 'E-mail']);
        echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes', 'action' => 'index']);
        echo $this->Form->button('Cadastrar');
        echo $this->Form->end(); ?>

</div>
