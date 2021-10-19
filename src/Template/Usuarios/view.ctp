<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users view large-7 medium-7 columns content">
    <h3><?php echo $usuario->nome;  ?></h3>
    <table>
        <tr>
            <td>ID: </td>
            <td><?php echo $usuario->id; ?></td>
        </tr>
        <tr>
            <td>Perfil: </td>
            <td><?php echo $usuario->id_perfil; ?></td>
        </tr>
        <tr>
            <td>Nome: </td>
            <td><?php echo $usuario->nome; ?></td>
        </tr>
        <tr> 
            <td>E-mail: </td>
            <td><?php echo $usuario->email; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $usuario->opcoes_status; ?></td>
        </tr>
        <tr>
            <td>Cadastrado em: </td>
            <td><?php echo $usuario->created; ?></td>
        </tr>
        <tr>
            <td>Modificado em: </td>
            <td><?php echo $usuario->modified; ?></td>
        </tr>
    </table>
    <?PHP echo $this->Html->link(__('Voltar  '), ['controller' => 'Usuarios','action' =>'index']);?>

</div>

<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>