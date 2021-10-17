<div class="users index large-12 medium-12 columns content">
    <h3>Lista de Clientes</h3>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Status</th>
            
                <!-- <th>Numero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Cep</th> --> 

                <!-- <th>Codigo Pais</th>
                <th>DDD</th>
                <th>Celular</th>
                <th>Principal</th>
                <th>Whatsapp</th> -->
                <th>Açoes</th>       
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            
            <tr>
                <td><?php echo $cliente->nome;?></td>
                <td><?php echo $cliente->cpf;?></td>
                <td><?php echo $cliente->email;?></td>
                <td><?php echo $cliente->status;?></td>

                <!-- id_cliente;
                codigo_pais;
                ddd;
                numero => $cliente[Celular],
                principal;
                whatsapp; -->

                <td>
                <?php echo $this->Html->link(__(' Visualizar '), 
                ['controller' => 'clientes', 'action' => 'view', $cliente->id]);

                echo $this->Html->link(__(' Editar '), 
                ['controller' => 'clientes', 'action' => 'edit', $cliente->id]);
                
                echo $this->Form->postlink(('Deletar'), ['action' => 'delete',$cliente->id ],
                ['confirm' => 'Realmente deseja apagar o usuario?', $cliente->id ]); 
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




            
            
            

            
    


                  
             
           