<nav class="large-2 medium-2 columns" id="actions-sidebar">
        <ul class="side-nav">

            <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
            <li class="heading"><?= $this->Html->link(__(' Sair '), ['controller' => 'Users', 'action' => 'logout', '_full' => true]); ?>
        </ul>
    </nav>
    <div class="users index large-6 medium-6 columns content">
        <h3><?php echo 'Fechamento de Reserva';  ?></h3>
        <table style="border: 0px">
            <tr>
                <td>Cliente:</td>
                <td><?php echo $cliente[$idCliente]?></td>
            </tr>
            <tr>
                <td>Filme:</td>
                <td><?php echo $filme[$idFilme]?></td>
            </tr>
            <tr>
                <td>Data de inicio locação:</td>
                <td><?php echo $reserva->data_inicio_locacao->format('d/m/Y H:i:s')?></td>
            </tr>
            <tr>
                <td>Data limite para a devolução:</td>
                <td><?php echo $reserva->data_limite_devolucao->format('d/m/Y H:i:s')?></td>
            </tr>

            <!-- Inicio Formulario -->
                <?php echo $this->Form->create($reserva);?>
            <tr>
                <td  >Valor Multa por atraso:</td>
                <td ><?php echo $this->Form->control('valor_multa_atraso', ['label' => false]);?></td>
            </tr>
            <tr>
                <td >Valor Locação:</td>
                <td ><?php echo $this->Form->control('valor_locacao', ['label' => false]);?></td>
            </tr>
            <tr >
                <td colspan="2"><?php echo $this->Form->control('observacoes', ['type' => 'textArea']);?></td>
            </tr>
            <tr>

            </tr> 
            <tr>
                <td ></td>
                <td  style="text-align: right;"><?php echo $this->Html->link(__('Voltar '), 
                    ['controller' => 'Reservas', 'action' => 'index']);
                    echo $this->Form->control(
                        'status',
                        [
                            'type' => 'hidden',
                            'value' => '0'
                        ]);
                    echo $this->Form->control(
                        'id_usuario',
                        [
                            'type' => 'hidden',
                            'options' => $idLogado
                        ]);            
    
                    echo $this->Form->button(' Finalizar ');
                    echo $this->Form->end();?>
                </td>
            </tr>            
        </table>

    </div>
    <div class="users view large-4 medium-4 columns content">
        <table border>
            <caption style="background-color:#2d7177">Tabela de Preços</caption>
            <tr>
                <td>Valor locaçao /Hr: </td>
                <td><?php echo '00,15' ?></td>
            </tr>
            <tr>
                <td>Valor Multa / Hr: </td>
                <td><?php echo 'valor da Locaçao  +  00,10'; ?></td>
            </tr>
        </table>
    </div>