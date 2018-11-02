<?= $this->Html->css('old') ?>
<div class="inline" style="font-size: 25px; padding: 50px;">
    <span class="fa fa-arrow-left"></span> &nbsp;
    <?= $this->Html->link('Main Page', ['controller' => 'Pages', 'action' => 'home']) ?>
</div>

<h2 class="text-center mb-4">Sign in</h2>
<div class="w-100 mx-auto">
    <?= $this->Form->create(false, ['class' => 'login-form']) ?>
    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('email', 'Email', ['style' => 'font-weight:bold']);

        $options = [
            'type' => 'text', 'name' => 'email', 'label' => false,
            'class' => 'form-control', 'required' => true, 'value' => 'example@example.com'
        ];
        echo $this->Form->control('', $options);
        ?>
    </div>
    <div class="form-group mx-auto w-75 login-field">
        <?php
        echo $this->Form->label('password', 'Password', ['style' => 'font-weight:bold']);
        
        $options = [
            'type' => 'password', 'name' => 'password', 'label' => false,
            'class' => 'form-control', 'required' => true, 'value' => 'password'
        ];
        echo $this->Form->control('', $options);
        ?>
    </div>
    <?= $this->Form->button('Login', ['class' => 'btn btn-dark mx-auto']) ?>
    <p class="text-center mt-2">For testing use the username <b><i>example@example.com</i></b> and the password <b><i>password</i></b> (these are the default values).</p>
    <p id="no-account" class="text-center">Don't have an account? Create one 
    <?php
        $options = ['controller' => 'Users', 'action' => 'add'];
        echo $this->Html->link('here', '/users/add', $options);
    ?></p>

    <?php
        $options = ['controller' => 'Users', 'action' => 'add', 'class' => 'text-center'];
        echo $this->Html->link('I forgot my password', '/users/forgotPassword', $options);
    ?>
    <?= $this->Form->end() ?>
</div>
