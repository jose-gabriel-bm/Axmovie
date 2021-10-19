<div class="users view large-6 medium-6 columns content">
    <h3><?php echo $filme->titulo;  ?></h3>
    <table>
        <tr>
            <th>ID: </th>
            <td><?php echo $filme->id; ?></td>
        </tr>
        <tr>
            <th>Titulo: </th>
            <td><?php echo $filme->titulo; ?></td>
        </tr>
        <tr>
            <th>Genero: </th>
            <td><?php echo $filme->id_genero; ?></td>
        </tr>
        <tr> 
            <th>Usuario: </th>
            <td><?php echo $filme->id_usuario; ?></td>
        </tr>
        <tr> 
            <th>Diretor: </th>
            <td><?php echo $filme->id_diretor; ?></td>
        </tr>
        <tr> 
            <th>lancamento?: </th>
            <td><?php echo $filme->opcoes_lancamento; ?></td>
        </tr>
        <tr> 
            <th>Valor do Filme: </th>
            <td><?php echo $filme->valor_compra; ?></td>
        </tr>
        <tr>
            <th>Status: </th>
            <td><?php echo $filme->opcoes_status; ?></td>
        </tr>
        <tr>
            <th>Idioma: </th>
            <td><?php echo $filme->idioma; ?></td>
        </tr>
        <tr>
            <th>Cadastrado em: </th>
            <td><?php echo $filme->created; ?></td>
        </tr>
        <tr>
            <th>Modificado em: </th>
            <td><?php echo $filme->modified; ?></td>
        </tr>
    </table>
    <?PHP echo $this->Html->link(__('Cancelar  '), ['controller' => 'Filmes','action' =>'index'],['required' => true]);
    ?>
</div>
