<div class="users view large-6 medium-6 columns content">
    <?php pr($cliente) ?>
    <h3><?php echo $cliente->nome;  ?></h3>
    <table>
        <div>
            <label>
                <h5><b>Dados pessoais</b></h5>
            </label>
            <tr>
                <td>ID: </td>
                <td><?php echo $cliente->id; ?></td>
            </tr>
            <tr>
                <td>CPF: </td>
                <td><?php echo $cliente->cpf; ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><?php echo $cliente->email; ?></td>
            </tr>
            <tr> 
                <td>Status: </td>
                <td><?php echo $cliente->status; ?></td>
            </tr>
        </div>
    </table>
    <table>
        <label>
            <h5><b>Endereço</b></h5>
        </label>

        <tr> 
            <td>Diretor: </td>
            <td><?php echo $cliente->id_diretor; ?></td>
        </tr>
        <tr> 
            <td>lancamento?: </td>
            <td><?php echo $cliente->lancamento; ?></td>
        </tr>
        <tr> 
            <td>Valor do cliente: </td>
            <td><?php echo $cliente->valor_compra; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $cliente->status; ?></td>
        </tr>
        <tr>
            <td>Idioma: </td>
            <td><?php echo $cliente->idioma; ?></td>
        </tr>
        <tr>
            <td>Cadastrado em: </td>
            <td><?php echo $cliente->created; ?></td>
        </tr>
        <tr>
            <td>Modificado em: </td>
            <td><?php echo $cliente->modified; ?></td>
        </tr>
    </table>
    <table>
        <label>
            <h5><b>Contato</b></h5>
        </label>

        <tr> 
            <td>Diretor: </td>
            <td><?php echo $cliente->id_diretor; ?></td>
        </tr>
        <tr> 
            <td>lancamento?: </td>
            <td><?php echo $cliente->lancamento; ?></td>
        </tr>
        <tr> 
            <td>Valor do cliente: </td>
            <td><?php echo $cliente->valor_compra; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $cliente->status; ?></td>
        </tr>
        <tr>
            <td>Idioma: </td>
            <td><?php echo $cliente->idioma; ?></td>
        </tr>
        <tr>
            <td>Cadastrado em: </td>
            <td><?php echo $cliente->created; ?></td>
        </tr>
        <tr>
            <td>Modificado em: </td>
            <td><?php echo $cliente->modified; ?></td>
        </tr>
    </table>
</div>

