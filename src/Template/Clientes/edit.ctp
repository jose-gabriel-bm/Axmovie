<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li class="heading"><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Filmes'), ['controller' => 'Filmes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Clientes'), ['controller' => 'Clientes','action' =>'index']) ?></li>
        <li class="heading"><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas','action' =>'index']) ?></li>  
    </ul>
</nav>
<div class="users index large-6 medium-6 columns content">
<h3> Editar Cliente<h3>
<?php

use App\Model\Entity\Cliente;
use PhpParser\Node\Stmt\Label;

echo $this->Form->create($cliente);
?>
<div>
<label>
    <h5><b>Dados pessoais</b></h5>
</label>
<?php
    echo $this->Form->control('nome',['label' => 'Nome']);
    echo $this->Form->control('cpf',['label' => 'CPF']);
    echo $this->Form->control('email',['label' => 'Email']);?>
<label>Status*</label>
<?php
    echo $this->Form->radio('status', ['Inativo', 'Ativo']);
?>
</div>
<div>
<label>
    <h5><b>Endereço</b></h5>
</label>

<?php
    echo $this->Form->control('logradouro',['value' => $cliente->enderecos[0]->logradouro]);
    echo $this->Form->control('Numero',['value' => $cliente->enderecos[0]->numero ]);
    echo $this->Form->control('Complemento',['value' => $cliente->enderecos[0]->complemento ]);
    echo $this->Form->control('Bairro',['value' => $cliente->enderecos[0]->bairro ]);
    echo $this->Form->control('Cidade',['value' => $cliente->enderecos[0]->id_cidade ]);
    echo $this->Form->control('Cep',['value' => $cliente->enderecos[0]->cep ]);
?>
</div>
<label>
    <h5><b>Contato</b></h5>
</label>

<?php
    echo $this->Form->control('Codigo Pais',['value' => $cliente->contatos[0]->codigo_pais ]);
    echo $this->Form->control('DDD',['value' => $cliente->contatos[0]->ddd ]);
    echo $this->Form->control('Celular',['value' => $cliente->contatos[0]->numero ]);
?>
<label>Principal ?*</label>
<?php
    echo $this->Form->radio('Principal',['Não ', 'Sim'],['value' => $cliente->contatos[0]->principal ]);
?>
<label>whatsapp ?*</label>
<?php
    echo $this->Form->radio('Whatsapp', ['Não ', 'Sim'],['value' => $cliente->contatos[0]->whatsapp ]);
?>

<?php
    echo $this->Html->link(__('Cancelar  '), ['controller' => 'Clientes','action' =>'index']);
    echo $this->Form->button('Salvar');
    echo $this->Form->end();

?>
</div>
<div class="users view large-1 medium-1 columns content"></div>
<div class="users view large-2 medium-2 columns content"></div>