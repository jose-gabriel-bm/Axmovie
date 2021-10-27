<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= $this->Html->link(__('Usuarios'),['controller' => 'Users','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Filmes'),['controller' => 'Filmes','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Clientes'),['controller' => 'Clientes','action' =>'index'])?>
        </li>
        <li class="heading">
            <?= $this->Html->link(__('Reservas'),['controller' => 'Reservas','action' =>'index'])?>
        </li>  
        <li class="heading">
            <?= $this->Html->link(__(' Sair '),['controller' => 'Users', 'action' => 'logout', '_full' => true]);?>
        </li> 
    </ul>
</nav>
<div class="large-6 medium-6 container2">
    <h3>Cadastro de Usuario</h3>
    <?php
        echo $this->Form->create($usuario);
        echo $this->Form->control('nome', ['required' => true]);
        echo $this->Form->control('username', ['required' => true, 'label' => 'Usuario']);
        echo $this->Form->input(
            'id_perfil',
            [
                'type' => 'select',
                'multiple' => false,
                'options' => $perfis,
                'default' => '1',
                'label' => 'Perfil'
            ]
        );
        echo $this->Form->control('email', ['required' => true]);
        echo $this->Form->control('password', ['required' => true]);
        echo $this->Html->link(__('Voltar  '), ['controller' => 'Users', 'action' => 'index']);
        echo $this->Form->button('Cadastrar');
        echo $this->Form->end();
    ?>
</div>