

<div class="large-3 medium-3 columns content">
</div>  


<div class="large-5 medium-5 columns content">

<?= $this->Form->create('post',['class' => 'form-signin']) ?>


<h1 class="h3 mb-3 font-weight-normal ">Faça seu Login</h1>

        <!-- <?= $this->Flash->danger(); ?> -->

    <div class="form-group">
            <label >Usuario</label>
            <?= $this->Form->control('username',['class' => 'form-control',  
            'placeholder' => 'DIgite seu usuario', 'label' => false])?>
    </div>
    <div class="form-group">
            <label >Senha</label>
            <?= $this->Form->control('password',['class' => 'form-control',  
            'placeholder' => 'Digite sua Senha', 'label' => false])?>
    </div>  
   
    <?= $this->Form->button(__('Logar',),['class' => 'btn btn-lg btn-primary btn-block',]) ?>
    <br>
    Ainda nao e cadastrado?
    <?= $this->Html->link(__('Cadastre-se'), ['controller' => 'Users','action' =>'add']) ?> 
    <?= $this->Form->end() ?>
  </div>  

  <div class="large-4 medium-4 columns content">

</div>  
