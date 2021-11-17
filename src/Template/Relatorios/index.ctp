<?= $this->element('cabecalho') ?>
<?= $this->element('menulateral') ?>

<div class="users index large-10 medium-10 columns ">
    
    <h3 style="margin-bottom:0rem;color: #4d8f97;">Relatorios</h3>
    <table class='relatorio-container'>

        <tr>
            <td>
                <?php
                echo $this->Form->create(null);
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
                echo $this->Form->control(
                    'de_data_devolucao',
                    [
                        'type' => 'date',
                        'maxYear' => date('Y') + 0,
                        'minYear' => date('Y') - 4,
                        'label' => 'De:',
                    ]
                );
                ?>
            </td>
            <td>
                <?php
                echo $this->Form->control(
                    'ate_data_devolucao',
                    [
                        'type' => 'date',
                        'minYear' => date('Y') - 4,
                        'maxYear' => date('Y') + 0,
                        'label' => 'Ate:',
                    ]
                );
                ?>
            </td>
            <td style="text-align: right;">
                <?php
                echo $this->Form->button('Gerar Relatorio');
                echo $this->Form->end();
                ?>
            </td>
        </tr>
        <?php if($requisicaoRelatorio != 'INDEFINIDO'):?>
        <tr>
            <td></td>
            <td colspan="2" style="text-align: center;"> 
                <button type="submit" 
                onclick="window.location.href='/relatorios/Relatorio.xlsx'">Baixar Relatorio</button> 
            </td>
            <td></td>
        </tr>
       <?php endif;?>
    </table>

    <div class="users index large-12 medium-12  " style="padding-top: 8px !important;">

        <table class='relatorio-container'>
            <thead>
                <tr>
                    <?php foreach ($cabecalhos as $cabecalho) : ?>
                        <th style="text-align: center;"><?= $this->Paginator->sort($cabecalho) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
            <?php if($requisicaoRelatorio == 'FATURAMENTO'):
                foreach ($query as $linha) : ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $linha->id;?></td>
                        <td style="text-align: center;"><?php echo $linha->data_devolucao;?></td>
                        <td style="text-align: center;"><?php echo $linha->valor_total_pagar;?></td>
                        <td><?php echo $linha->filme->titulo;?></td>
                        <td><?php echo $linha->cliente->nome;?></td>
                    </tr>
                <?php endforeach; 
            endif;?>
            <?php if($requisicaoRelatorio == 'ARRECADAÇÃO DE MULTA'):
                foreach ($query as $linha) : ?>
                    <tr>
                        <td><?php echo $linha->id;?></td>
                        <td><?php echo $linha->data_devolucao;?></td>
                        <td><?php echo $linha->data_limite_devolucao;?></td>
                        <td><?php echo $linha->valor_multa_atraso;?></td>
                        <td><?php echo $linha->valor_locacao;?></td> 
                        <td><?php echo $linha->filme->titulo;?></td>
                        <td><?php echo $linha->cliente->nome;?></td>
                    </tr>
                <?php endforeach; 
            endif;?>
            <?php if($requisicaoRelatorio == '10 CLIENTES QUE MAIS ATRASAM'):
                foreach ($query as $linha) : ?>
                    <tr>
                        <td><?php echo $linha->id; ?></td>
                        <td><?php echo $linha->valor_multa_atraso; ?></td>
                        <td><?php echo $linha->data_devolucao; ?></td>
                        <td><?php echo $linha->data_limite_devolucao; ?></td>
                        <td><?php echo $linha->cliente->nome; ?></td> 
                    </tr>
                <?php endforeach; 
            endif;?>            
            </tbody>
        </table>
 
    </div>
</div>