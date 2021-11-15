<?= $this->element('cabecalho') ?>
<?= $this->element('menulateral') ?>

<div class="users index large-10 medium-10 columns">
    <h3 style="margin-bottom:0rem;color: #4d8f97;">Relatorios Prontos</h3>
    <table class='relatorio-container'>

        <tr>
            <td>
                <?php
                    echo $this->Form->create(null,['url' => ['action' => 'relatorio']]);
                    echo $this->Form->control('selecaoRelatorio', [
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
            <td>
                <?php
                    echo $this->Form->control('de_data_devolucao',
                    [
                        'type' => 'date',
                        'maxYear' => date('Y') + 0,
                        'minYear' => date('Y') -4,
                        'label' => 'De:',
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
                        'label' => 'Ate:',
                    ]);
                ?>
            </td>
            <td >
                <?php 
                    echo $this->Form->postButton('Baixar Relatorio',['controller' => 'Relatorios', 'action' => 'relatorio']);
                    echo $this->Form->end(); 
                ?>
            </td>
         
            <td>
                <?= $this->Html->link('Download ', '/relatorios/faturamento/Relatorio.xlsx', ['download' => 'Relatorio.xlsx', 'class' => 'btn btn-sm btn-success']) ?>
            </td>
        </tr>
    </table>
</div>
