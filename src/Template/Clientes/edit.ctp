<?= $this->element('cabecalho')?>
<?= $this->element('menulateral')?>

<div class="users index large-6 medium-6 columns content">
    <h3> Editar Cliente<h3>

            <div>
                <label>
                    <h5><b>Dados pessoais</b></h5>
                </label>
                <?php
                echo $this->Form->create($cliente);
                echo $this->Form->control('nome', ['label' => 'Nome']);
                echo $this->Form->control('cpf', ['label' => 'CPF']);
                echo $this->Form->control('email', ['label' => 'Email']); ?>
                <label>Status*</label>
                <?php
                echo $this->Form->radio('status', ['Inativo', 'Ativo']);
                ?>
            </div>

            <?php
            echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes', 'action' => 'index']);
            echo $this->Form->button('Salvar');
            echo $this->Form->end();
            ?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>