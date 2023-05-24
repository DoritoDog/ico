<div class="dropdown user">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
        <?= $this->Html->image($user->profile_image, ['width' => 35, 'height' => 35]) ?>
        &nbsp;
        <?= h($user->full_name) ?>
    </button>
    <div class="dropdown-menu">
        <?= $this->Html->link('Sign out', ['action' => 'logout'], ['class' => 'dropdown-item']) ?>
    </div>
</div>

<div class="container mt-3">
    <div class="row pt-5">
        <div class="col-sm-6">
        <h3 class="pink ml-5"><span class="fa fa-gear"></span> Account</h3>
            <div class="form-group inline">
            <?= $this->Form->create($user, ['url' => ['action' => 'profile'], 'type' => 'post']) ?>

            <div class="form-group">
                <?php
                echo $this->Form->label('first_name', 'First name', ['class' => 'bold pink']);
                echo $this->Form->control('first_name', ['class' => 'dark-input', 'label' => false]);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->label('last_name', 'Last name', ['class' => 'bold pink']);
                echo $this->Form->control('last_name', ['class' => 'dark-input', 'label' => false]);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->label('email', 'Email', ['class' => 'bold pink']);
                echo $this->Form->control('email', ['class' => 'dark-input', 'label' => false]);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->label('wallet_address', 'Wallet Address', ['class' => 'bold pink']);
                $options = ['class' => 'dark-input', 'label' => false];
                echo $this->Form->control('wallet_address', $options);
                ?>
            </div>
            <div class="form-group">
                <?= $this->Form->label('country_id', 'Country', ['class' => 'bold pink']); ?>
                <?php
                $options = array();
                foreach ($countries as $country)
                    $options[$country->id] = $country->name;

                echo $this->Form->select('country_id', $options, ['class' => 'dark-input']);
                ?>
            </div>

            <?= $this->Form->button('Save Changes', ['class' => 'btn profile-btn']) ?>
            <?= $this->Form->end()  ?>
            </div>
        </div>
        <div class="col-sm-6">
            <h3 class="pink ml-5"><span class="fa fa-vcard"></span> Security</h3>
            <?php
                echo $this->Form->create('url', ['action' => 'sendResetCode']);
                $options = ['class' => 'btn profile-btn mt-2', 'id' => 'reset-button'];
                echo $this->Form->button('Reset Password', $options);
                echo $this->Form->end();
            ?>
            <button class="btn profile-btn mt-2">Enable Two-Factor Authentication</button>
        </div>
    </div>
</div>
