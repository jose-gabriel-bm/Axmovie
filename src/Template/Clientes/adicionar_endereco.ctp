<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="large-5 medium-5 columns content ">
    <label>
    <h3><?php echo $cliente->nome;  ?></h3>
        <h5><b>Adicionar Endereço</b></h5>
    </label>

    <?php
    echo $this->Form->create();
    echo $this->Form->control('Logradouro', ['required' => true]);
    echo $this->Form->control('Numero');
    echo $this->Form->control('Complemento');
    echo $this->Form->control('Bairro', ['required' => true]);
    echo $this->Form->control('Cidade');
    echo $this->Form->control('Cep');
    echo $this->Html->link(__('Voltar  '), ['controller' => 'Clientes', 'action' => 'index']);
    echo $this->Form->button('Cadastrar');
    echo $this->Form->end();
    ?>
</div>

<div class="users view large-6 medium-6 container4 "> 
</table>
        <label>
            <h5 class="titulo"><b>Endereços</b></h5>
        </label>    
    <table>
        <thead>
            <tr>
                <th>
                    <?= $this->Paginator->sort('logradouro', 'Logradouro')?>
                </th>
                <th>
                    <?= $this->Paginator->sort('numero', 'Numero')?>
                </th>
                <th>
                    <?= $this->Paginator->sort('bairro', 'Bairro')?>
                </th>
                <th>
                    <?= $this->Paginator->sort('cep', 'Cep')?>
                </th>
                <th>
                    <?= $this->Paginator->sort('complemento', 'Complemento')?>
                </th>
                <th>
                    <?= $this->Paginator->sort('acoes', 'Ações')?>
                </th>
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
                    <td>
                        <?php 
                            // echo $this->Html->link(__('Editar'), 
                            // ['controller' => 'clientes', 'action' => 'editarEndereco', $endereco->id]);
                           
                            echo $this->Form->postlink(('Deletar'), 
                            ['controller' => 'clientes','action' => 'deleteEndereco',$endereco->id ],
                            ['confirm' => 'Realmente deseja apagar o endereco?', $endereco->id ]); 
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

