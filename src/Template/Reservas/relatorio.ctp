<?= $this->element('cabecalho') ?>
<?= $this->element('menulateral') ?>

<div class="users index large-10 medium-10 columns">
    <h3 style="margin-bottom:0rem;color: #4d8f97;">Relatorios Prontos</h3>
    <table class='relatorio-container'>
        <tr>
            <td><?php
            echo $this->Form->create(NULL);
                echo $this->Form->input('selecaoRelatorio', [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => [
                        'FATURAMENTO' => 'FATURAMENTO',
                        'ARRECADAÇÃO DE MULTA' => 'ARRECADAÇÃO DE MULTA',
                        '10 CLIENTES QUE MAIS ATRASAM' => '10 CLIENTES QUE MAIS ATRASAM',
                    ],
                    'label' => 'Selecionar Relatorio',
                ]);
                ?>
            </td>
        </tr>
        <tr>
            <td>
            <?php
                echo $this->Form->control('de_data_devolucao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => 'De:',
                ]
                );?>
            </td>
            <td>
            <?php
                echo $this->Form->control('ate_data_devolucao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => 'Ate:',
                ]
                );?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?php echo $this->Form->button('Baixar Relatorio'); ?>
                <?php echo $this->Form->end(); ?>
            </td>
        </tr>
    </table>

</div>
<div class="users index large-10 medium-10 columns">
    <h3 style="margin-bottom:0rem;color: #4d8f97;">Relatorio Personalizados</h3>
    <table class='relatorio-container'>
        <tr>
            <td>     
            <?php 
            echo $this->Form->create();    
             echo $this->Form->input(
                'id_cliente', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => $cliente,
                    'label'=>'Cliente'
                ]
            );?>
            </td>
            <td>
                <?php echo $this->Form->input('id_filme', 
                [
                'type' => 'select',
                'multiple' => false,
                'options' => $filme,
                'label'=>'Filme'
                ]
            );?>
            </td>
            <td>
            <?php
                echo $this->Form->control('de_data_devolucao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => '(Data devolução)De:',
                ]
                );?>
            </td>
            <td>
            <?php
                echo $this->Form->control('ate_data_devolucao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => '(Data devolução)Ate:',
                ]
                );?>
            </td>
        </tr>
        <tr>
            <td>
            <?php
                echo $this->Form->control('de_data_inicio_locacao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => '(Data de inicio locação)De:',
                ]);
            ?>
            </td>
            <td>
            <?php
                echo $this->Form->control('ate_data_inicio_locacao',
                [
                'type' => 'datetime',
                'minYear' => date('Y') +1,
                'maxYear' => date('Y') + 10,
                'label' => '(Data de inicio locação)ate:',
                ]);
            ?>
            </td>
            <td></td>
            <td style="text-align: center; vertical-align: middle;">
                <?php echo $this->Form->button('Gerar Relatorio'); ?>
                <?php echo $this->Form->end(); ?>
            </td>
        </tr>
    </table>

</div>