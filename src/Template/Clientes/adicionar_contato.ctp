<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

    <div class="large-5 medium-5 columns content">
        <label>
        <h3><?php echo $cliente->nome;  ?></h3>
            <h5><b>Adicionar Contato</b></h5>
        </label>
        <?php
            echo $this->Form->create();
            echo $this->Form->control('Codigo_Pais', ['default' => '55']);
            echo $this->Form->control('DDD', ['default' => '62']);
            echo $this->Form->control('Celular', ['required' => true]);
        ?>
        <label>
            Principal ?
        </label>
        <?php
            echo $this->Form->radio('Principal', ['Não ', 'Sim'], ['required' => true]);
        ?>
        <label>
            whatsapp ?
        </label>
        <?php
            echo $this->Form->radio('Whatsapp', ['Não ', 'Sim'], ['required' => true]);
            echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes', 'action' => 'index']);
            echo $this->Form->button('Cadastrar');
            echo $this->Form->end(); 
        ?>
    </div> 
 
    <div class="large-5 medium-5 columns topoTabela">
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
                    <th  style="text-align: center;" colspan="2">Ações</th>
                
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente->contatos as $contato ) : ?>
                    <tr>
                        <td><?php echo $contato['ddd']; ?></td>
                        <td><?php echo $contato['numero']; ?></td>
                        <td><?php echo $contato['numero_principal']; ?></td>
                        <td><?php echo $contato['possui_whatsapp']; ?></td>
                        <td>
                        <?php 
                            echo $this->Html->link(__('Editar'), 
                            ['controller' => 'clientes', 'action' => 'editarContato', $contato->id]);
                        ?>
                        </td>
                        <td>
                            <?php echo $this->Form->postlink(('Deletar'), ['controller' => 'clientes','action' => 'deleteContato',$contato->id ],
                            ['confirm' => 'Realmente deseja apagar o contato?', $contato->id ]); 
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
