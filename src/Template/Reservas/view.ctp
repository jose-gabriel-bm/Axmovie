<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users view large-10 medium-10 columns content">
    <h3><?php echo 'Visualizar reserva';  ?></h3>
    <table>
        <tr>
            <td>Cliente: </td>
            <td><?php echo $reserva->id_cliente; ?></td>
        </tr>
        <tr>
            <td>Filme: </td>
            <td><?php echo $reserva->id_filme; ?></td>
        </tr>
        <tr> 
            <td>Usuario: </td>
            <td><?php echo $reserva->id_usuario; ?></td>
        </tr>
        <tr> 
            <td>Multa por Atraso: </td>
            <td><?php echo $reserva->valor_multa_atraso; ?></td>
        </tr>
        <tr> 
            <td>Total a pagar reserva: </td>
            <td><?php echo $reserva->valor_total_pagar; ?></td>
        </tr>
        <tr> 
            <td>Reserva Criada em: </td>
            <td><?php echo $reserva->created; ?></td>
        </tr>
        <tr>
            <td>Data limite Devolução: </td>
            <td><?php echo $reserva->data_limite_devolucao; ?></td>
        </tr>
        <tr>
            <td>Data que foi devolvido: </td>
            <td><?php echo $reserva->data_devolucao; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $reserva->status; ?></td>
        </tr>
       
    </table>
   <?php echo $this->Html->link(__('Voltar  '), ['controller' => 'Reservas','action' =>'index']);
    ?>
</div>