<div class="large-5 medium-5 container2">
        <h1 class="h3 mb-3 font-weight-normal ">Faça seu Login</h1>
        <?= $this->Form->create('post', ['class' => 'form-signin']) ?>    
        <div class="form-group">
        <label>Usuario</label>
                <?= $this->Form->control('username', [
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu usuario', 
                        'label' => false,
                        'required' => true
                ]) ?>
        </div>
        <div class="form-group">
        <label>Senha</label>
                <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'placeholder' => 'Digite sua Senha', 
                        'label' => false,
                        'required' => true
                ]) ?>
        </div>

        <?= $this->Form->button(__('Logar',), ['class' => 'btn btn-lg btn-primary btn-block',]) ?>
        <br>
        <?= $this->Form->end() ?>
</div>
