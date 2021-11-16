<div class="users index large-10 medium-10 columns">
    <h3 style="margin-bottom:0rem;color: #4d8f97;">Relatorio Personalizados</h3>
    <table class='relatorio-container'>
        <tr>
            <td>     
                <?php 
                    echo $this->Form->create();    
                    echo $this->Form->control('id_cliente', 
                    [
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $cliente,
                        'label'=>'Cliente'
                    ]);
                ?>
            </td>
            <td>
                <?php 
                    echo $this->Form->control('id_filme', 
                    [
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $filme,
                        'label'=>'Filme'
                    ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Form->control('de_data_devolucao',
                    [
                        'type' => 'date',
                        'minYear' => date('Y') -4,
                        'maxYear' => date('Y') + 0,
                        'label' => '(Data devolução)De:',
                    ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Form->control('ate_data_devolucao',
                    [
                        'type' => 'date',
                        'minYear' => date('Y') -4,
                        'maxYear' => date('Y') + 0,
                        'label' => '(Data devolução)Ate:',
                    ]);
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                    echo $this->Form->control('de_data_inicio_locacao',
                    [
                        'type' => 'date',
                        'minYear' => date('Y') -4,
                        'maxYear' => date('Y') + 0,
                        'label' => '(Data de inicio locação)De:',
                    ]);
                ?>
            </td>
            <td>
                <?php
                    echo $this->Form->control('ate_data_inicio_locacao',
                    [
                        'type' => 'date',
                        'minYear' => date('Y') -4,
                        'maxYear' => date('Y') + 0,
                        'label' => '(Data de inicio locação)ate:',
                    ]);
                ?>
            </td>
            <td></td>
            <td>
                <?php 
                    echo $this->Form->button('Gerar Relatorio');
                    echo $this->Form->end(); 
                ?>
            </td>
        </tr>
    </table>
</div>

   <!-- <td>
   -->
            <!-- </td>  -->