<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users index large-10 medium-10 columns content">
    <h3 style="margin-bottom:0rem ;">Lista de Usuarios</h3>
            
            <?php 
                if ($verificacaoPerfil == 1){echo $this->Html->link(__('Adicionar novo Usuario '),
                    ['controller' => 'users', 'action' => 'add']); } 
            ?> 

<div class="dropdown">
    <button class="mainmenubtn" style="margin-bottom: 30px" onclick="openDropDown()">Pesquisar</button>
    <div class="dropdown-child">
        <a><?php
                echo $this->Form->create(null, ['type' => 'get']);
        	    echo $this->Form->input(
                'nome',[
                    'label' => false, 
        		        'placeholder' => 'Nome do cliente' ]);
        	    echo $this->Form->input('email', 
        		    ['label' => false, 
        		    'placeholder' => 'Email' ]);
                echo $this->Form->select(
                    'perfil', [                                            
                        'Administrador' => 'Administrador',
                        'Atendente' => 'Atendente',
                    ],
                    ['empty' => 'Selecionar Perfil'],
                );
                echo $this->Form->select(
                    'status', [                                            
                        'Ativo' => 'Ativo',
                        'Inativo' => 'Inativo',
                    ],
                    ['empty' => 'Selecionar Status'],
                );
                echo $this->Form->button('Pesquisar');
                echo $this->Form->end();
            ?>     
        </a>
    </div>
</div>   

    <table>
        <thead>
            <tr >
                <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                <th><?= $this->Paginator->sort('id_perfil', 'Perfil'); ?></th>
                <th><?= $this->Paginator->sort('status', 'Status'); ?></th>
                <th><?= $this->Paginator->sort('açoes', 'Ações')?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>                
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->perfi->perfil ?></td>
                <td><?php echo $usuario->opcoes_status; ?></td>
                <td>
                <?php echo $this->Html->link(__(' Detalhes '), 
                ['controller' => 'Users', 'action' => 'view', $usuario->id]);

                if($verificacaoPerfil == 1){
                    echo $this->Html->link(__(' Editar '), 
                    ['controller' => 'Users', 'action' => 'edit', $usuario->id]);
                }
                ?> 
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<<' .__('Primeira'));?>
            <?php echo $this->Paginator->prev('<' .__('Anterior'));?>
            <?php echo $this->Paginator->numbers();?>
            <?php echo $this->Paginator->next(__('Proxima').'>');?>
            <?php echo $this->Paginator->last(__('Ultima').'>>');?>
        </ul>
        <p>
            <?php
                echo $this->Paginator->counter(['format' => __('Pagina {{page}} 
                de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}')]);  
            ?>
        </p>
    </div>
</div>
<script>
    function openDropDown() {
        document.querySelectorAll('.dropdown-child')[0].classList.toggle('show-menu-dw');
    }
</script>