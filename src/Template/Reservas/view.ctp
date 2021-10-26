<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>
<div class="users view large-6 medium-6 columns content">
    <h3><?php echo 'Visualizar reserva';  ?></h3>
    <table >
        <tr>
            <td>Cliente: </td>
            <td><?php echo $reserva->cliente->nome; ?></td>
        </tr>
        <tr>
            <td>Filme: </td>
            <td><?php echo $reserva->filme->titulo; ?></td>
        </tr>
        <tr> 
            <td>Reserva Criada em: </td>
            <td><?php echo $reserva->data_inicio_locacao; ?></td>
        </tr>
        <tr>
            <td>Data limite Devolução: </td>
            <td><?php echo $reserva->data_limite_devolucao; ?></td>
        </tr>
        <tr>
            <td>Data que foi Devolvido: </td>
            <td><?php echo !$reserva->data_devolucao ?"-":$reserva->data_devolucao; ?></td>
        </tr>
        <tr> 
            <td>Multa por Atraso: </td>
            <td><?php echo !$reserva->valor_multa_atraso ? "-" :$reserva->valor_multa_atraso; ?></td>
        </tr>
        <tr> 
            <td>Valor Locação: </td>
            <td><?php echo !$reserva->valor_locacao ? "-" :$reserva->valor_locacao; ?></td>
        </tr>
        <tr> 
            <td>Valor total da reserva: </td>
            <td><?php echo !$reserva->valor_total_pagar ?"-":$reserva->valor_total_pagar; ?></td>
        </tr>
        <tr> 
            <td>Observação: </td>
            <td><?php echo !$reserva->observacoes ?"-":$reserva->observacoes; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $reserva->OpcoesStatus; ?></td>
        </tr>
       
    </table>
   <?php echo $this->Html->link(__('Voltar  '), ['controller' => 'Reservas','action' =>'index']);
    ?>
</div>
<div class="large-4 medium-4">