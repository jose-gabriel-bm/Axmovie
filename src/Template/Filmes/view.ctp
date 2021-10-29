<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users view large-6 medium-6 columns content">
    <h3><?php echo $filme->titulo;  ?></h3>
    <table>
        <tr>
            <td>Titulo: </td>
            <td><?php echo $filme->titulo; ?></td>
        </tr>
        <tr>
            <td>Genero: </td>
            <td><?php echo $filme->genero->genero; ?></td>
        </tr>
        <tr> 
            <td>Diretor: </td>
            <td><?php echo $filme->diretore->nome; ?></td>
        </tr>
        <tr> 
            <td>lancamento?: </td>
            <td><?php echo $filme->opcoes_lancamento; ?></td>
        </tr>
        <tr> 
            <td>Valor do Filme: </td>
            <td><?php echo $filme->valor_compra; ?></td>
        </tr>
        <tr>
            <td>Status: </td>
            <td><?php echo $filme->opcoes_status; ?></td>
        </tr>
        <tr>
            <td>Idioma: </td>
            <td><?php echo $filme->idioma; ?></td>
        </tr>

    </table>
    <?PHP 
        echo $this->Html->link(__('Voltar'), 
        ['controller' => 'Filmes','action' =>'index'],
        ['required' => true]);
    ?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>
