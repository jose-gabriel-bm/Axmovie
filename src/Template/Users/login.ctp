<div class="login" >

        <h1 class="login-header">Faça seu Login</h1>                     
        <?= $this->Form->create('post', ['class' => 'login-container']) ?>  
        <?= $this->Form->control('username', [
                'class' => 'form-control',
                'placeholder' => 'Usuario', 
                'label' => false,
                'required' => true
        ]) ?>
        <?= $this->Form->control('password', [
                'class' => 'form-control',
                'placeholder' => 'Senha', 
                'label' => false,
                'required' => true
        ]) ?>
        <?= $this->Form->button(__('Logar',['class' => 'login-container'])) ?>
        <?= $this->Form->end() ?>
</div>