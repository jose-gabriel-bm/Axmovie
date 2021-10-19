<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users view large-6 medium-6 columns content">
    <h3><?php echo $filme->titulo;  ?></h3>
    <table>
        <tr>
            <td>ID: </td>
            <td><?php echo $filme->id; ?></td>
        </tr>
        <tr>
            <td>Titulo: </td>
            <td><?php echo $filme->titulo; ?></td>
        </tr>
        <tr>
            <td>Genero: </td>
            <td><?php echo $filme->id_genero; ?></td>
        </tr>
        <tr> 
            <td>Usuario: </td>
            <td><?php echo $filme->id_usuario; ?></td>
        </tr>
        <tr> 
            <td>Diretor: </td>
            <td><?php echo $filme->id_diretor; ?></td>
        </tr>
        <tr> 
            <td>lancamento?: </td>
            <td><?php echo $filme->opcoes_lancamento; ?></td>
        </tr>
        <tr> 
            <td>Valor do Filme: </td>
            <td><?php echo $filme->valor_compra; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $filme->opcoes_status; ?></td>
        </tr>
        <tr>
            <td>Idioma: </td>
            <td><?php echo $filme->idioma; ?></td>
        </tr>
        <tr>
            <td>Cadastrado em: </td>
            <td><?php echo $filme->created; ?></td>
        </tr>
        <tr>
            <td>Modificado em: </td>
            <td><?php echo $filme->modified; ?></td>
        </tr>
    </table>
    <?PHP echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index'],['required' => true]);
    ?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>
