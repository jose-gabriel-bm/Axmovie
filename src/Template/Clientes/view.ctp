<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users view large-6 medium-6 columns content">
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
                <td><?php echo $cliente->opcoes_status; ?></td>
            </tr>
        </div>
    </table>

    <table>
        <label>
            <h5><b>Endereço</b></h5>
        </label>

        <tr> 
            <td>Logradouro:</td>
            <td><?php echo $cliente->enderecos[0]->logradouro; ?></td>
        </tr>
        <tr> 
            <td>numero: </td>
            <td><?php echo $cliente->enderecos[0]->numero; ?></td>
        </tr>
        <tr> 
            <td>Bairro: </td>
            <td><?php echo $cliente->enderecos[0]->bairro;  ?></td>
        </tr>
        <tr>
            <td>Cep: </td>
            <td><?php echo $cliente->enderecos[0]->cep;  ?></td>
        </tr>
        <tr>
            <td>Complemento: </td>
            <td><?php echo $cliente->enderecos[0]->complemento;  ?></td>
        </tr>
      
    </table>
    <table>
        <label>
            <h5><b>Contato</b></h5>
        </label>

        <tr> 
            <td>Codigo Pais: </td>
            <td><?php echo $cliente->contatos[0]->codigo_pais; ?></td>
        </tr>
        <tr> 
            <td>DDD: </td>
            <td><?php echo $cliente->contatos[0]->ddd;?></td>
        </tr>
        <tr> 
            <td>Celular: </td>
            <td><?php echo $cliente->contatos[0]->numero; ?></td>
        </tr>

        <tr>
            <td>Principal: </td>
            <td><?php echo  $cliente->contatos[0]->numero_principal; ?></td>
        </tr>

        <tr>
            <td>Whatsapp: </td>
            <td><?php echo  $cliente->contatos[0]->possui_whatsapp; ?></td>
        </tr>
       
    </table>
    <?PHP echo $this->Html->link(__('Voltar  '), ['controller' => 'Clientes','action' =>'index']);?>

</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>
