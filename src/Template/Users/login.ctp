<?= $this->Html->css('old') ?>
<div class="inline" style="font-size: 25px; padding: 50px;">
    <span class="fa fa-arrow-left"></span> &nbsp;
    <?= $this->Html->link('Main Page', ['controller' => 'Pages', 'action' => 'home']) ?>
</div>

<div class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <?= $this->Form->create() ?>
                <h1 class="text-center">Log in</h1>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('email', 'Email', ['style' => 'font-weight:bold']);

                    $options = [
                        'type' => 'text', 'name' => 'email',
                        'class' => 'form-control', 'required' => true
                    ];
                    echo $this->Form->control('', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('password', 'Password', ['style' => 'font-weight:bold']);
                    
                    $options = [
                        'type' => 'password', 'name' => 'password',
                        'class' => 'form-control', 'required' => true
                    ];
                    echo $this->Form->control('', $options);
                    ?>
                </div>
                <?= $this->Form->button('Login', ['class' => 'btn btn-dark']) ?>
                <p id="no-account">Don't have an account? Create one 
                <?php
                    $options = ['controller' => 'Users', 'action' => 'add'];
                    echo $this->Html->link('here', '/users/add', $options);
                ?></p>
                <?= $this->Form->end() ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>