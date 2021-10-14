<div class="users view large-12 medium-12 columns content">
    <h3><?php echo $usuario->nome;  ?></h3>
    <table>
        <tr>
            <th>ID: </th>
            <td><?php echo $usuario->id; ?></td>
        </tr>
        <tr>
            <th>Perfil: </th>
            <td><?php echo $usuario->id_perfil; ?></td>
        </tr>
        <tr>
            <th>Nome: </th>
            <td><?php echo $usuario->nome; ?></td>
        </tr>
        <tr> 
            <th>E-mail: </th>
            <td><?php echo $usuario->email; ?></td>
        </tr>
        <tr>
            <th>Status: </th>
            <td><?php echo $usuario->status; ?></td>
        </tr>
        <tr>
            <th>Cadastrado em: </th>
            <td><?php echo $usuario->created; ?></td>
        </tr>
        <tr>
            <th>Modificado em: </th>
            <td><?php echo $usuario->modified; ?></td>
        </tr>
    </table>
</div>