
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
        <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]);?> 
    </ul>
</nav>

<div class="users view large-8 medium-8 columns content">
    
   <h3><?php echo $cliente->nome;  ?></h3>
    <table>
    <div>
            <label>
                <h5><b>Dados pessoais</b></h5>
            </label>
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
        <label>
            <h5><b>Contatos</b></h5>
        </label>
        
    <table>
        <thead>
            <tr>
                <th>DDD</th>
                <th>Celular</th>
                <th>Principal</th>
                <th>Whatsapp</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($cliente->contatos as $contato ) : ?>
                <tr>
                    <td><?php echo $contato['ddd']; ?></td>
                    <td><?php echo $contato['numero']; ?></td>
                    <td><?php echo $contato['numero_principal']; ?></td>
                    <td><?php echo $contato['possui_whatsapp']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <label>
            <h5><b>Endereçõs</b></h5>
        </label>    
    <table>
        <thead>
            <tr>
                <th>Logradouro</th>
                <th>Numero</th>
                <th>Bairro</th>
                <th>Cep</th>
                <th>Complemento</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($cliente->enderecos as $endereco ) : ?>
                <tr>
                    <td><?php echo $endereco['logradouro']; ?></td>
                    <td><?php echo $endereco['numero']; ?></td>
                    <td><?php echo $endereco['bairro']; ?></td>
                    <td><?php echo $endereco['cep']; ?></td>
                    <td><?php echo $endereco['complemento']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?PHP echo $this->Html->link(__('Voltar  '), ['controller' => 'Clientes','action' =>'index']);?>
</div>
<div class="users view large-2 medium-2 columns content"></div>

