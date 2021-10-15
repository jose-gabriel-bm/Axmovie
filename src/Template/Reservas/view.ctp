<div class="users view large-12 medium-12 columns content">
    <h3><?php echo 'Visualizar reserva';  ?></h3>
    <table>
        <tr>
            <th>ID: </th>
            <td><?php echo $reserva->id; ?></td>
        </tr>
        <tr>
            <th>Cliente: </th>
            <td><?php echo $reserva->id_cliente; ?></td>
        </tr>
        <tr>
            <th>Filme: </th>
            <td><?php echo $reserva->id_filme; ?></td>
        </tr>
        <tr> 
            <th>Usuario: </th>
            <td><?php echo $reserva->id_usuario; ?></td>
        </tr>
        <tr> 
            <th>Multa por Atraso: </th>
            <td><?php echo $reserva->valor_multa_atraso; ?></td>
        </tr>
        <tr> 
            <th>Total a pagar reserva: </th>
            <td><?php echo $reserva->valor_total_pagar; ?></td>
        </tr>
        <tr> 
            <th>Reserva Criada em: </th>
            <td><?php echo $reserva->created; ?></td>
        </tr>
        <tr>
            <th>Data limite Devolução: </th>
            <td><?php echo $reserva->data_limite_devolucao; ?></td>
        </tr>
        <tr>
            <th>Data que foi devolvido: </th>
            <td><?php echo $reserva->data_devolucao; ?></td>
        </tr>
        <tr>
            <th>Status: </th>
            <td><?php echo $reserva->status; ?></td>
        </tr>
       
    </table>
</div>