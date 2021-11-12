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
            <?= $this->Html->link(__('Relatorios'),['controller' => 'Relatorios','action' =>'index'])?>
        </li>          
        <li class="heading">
            <?= $this->Html->link(__(' Sair '),['controller' => 'Users', 'action' => 'logout', '_full' => true]);?>
        </li> 
    </ul>
</nav>