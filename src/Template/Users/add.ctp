<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="large-6 medium-6 container2">
    <h3>Cadastro de Usuario</h3>
    <?php
        echo $this->Form->create($usuario);
        echo $this->Form->control('nome', ['required' => true]);
        echo $this->Form->control('username', ['required' => true, 'label' => 'Usuario']);
        echo $this->Form->control('email', ['required' => true]);
        echo $this->Form->control('password', ['required' => true]);
        echo $this->Html->link(__('Voltar  '), ['controller' => 'Users', 'action' => 'index']);
        echo $this->Form->button('Cadastrar');
        echo $this->Form->end();
    ?>
</div>