<?= $this->Html->css('old') ?>
<?= $this->Html->script('Register') ?>

<div class="inline" style="font-size: 25px; padding: 50px;">
    <span class="fa fa-arrow-left"></span> &nbsp;
    <?= $this->Html->link('Main Page', ['controller' => 'Pages', 'action' => 'home']) ?>
</div>

<div>
    <h1 class="text-center">Sign up</h1>
    <p class="text-justify w-75 mx-auto">
        In order to participate in the CryptoCoin ICO,
        please fill in the form with accurate details.
        Refer to <a href="#">this</a> blog post for detailed information
        regarding the whitelisting process.
    </p>

    <?= $this->Form->create($user) ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php
                    echo $this->Form->label('first_name', 'First name', ['class' => 'bold']);

                    $options = [
                        'name' => 'first_name', 'class' => 'form-control', 'label' => false,
                        'required' => true, 'placeholder' => 'George'
                    ];
                    echo $this->Form->control('first_name', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('email', 'Email address', ['class' => 'bold']);
                    
                    $options = [
                        'name' => 'email', 'class' => 'form-control', 'type' => 'email',
                        'required' => true, 'placeholder' => 'georgewashington@example.com',
                        'label' => false
                    ];
                    echo $this->Form->control('email', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('password', 'Password', ['class' => 'bold']);
                    
                    $options = [
                        'name' => 'password', 'class' => 'form-control', 'type' => 'password',
                        'required' => true, 'label' => false
                    ];
                    echo $this->Form->control('password', $options);
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php
                    echo $this->Form->label('last_name', 'Last name', ['class' => 'bold']);

                    $options = [
                        'name' => 'last_name', 'class' => 'form-control', 'label' => false,
                        'required' => true, 'placeholder' => 'Washington'
                    ];
                    echo $this->Form->control('last_name', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->label('wallet_address', 'Wallet address', ['class' => 'bold']);

                    $options = [
                        'name' => 'wallet_address', 'class' => 'form-control', 'required' => true,
                        'placeholder' => '0xea69757bee3c454AB364C41B26b4Bfe29fc94E89', 'label' => false
                    ];
                    echo $this->Form->control('wallet_address', $options);
                    ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->label('country_id', 'Country', ['class' => 'bold']); ?>
                    <?php
                    $options = array();
                    foreach ($countries as $country)
                        $options[$country->id] = $country->name;
                    
                    echo $this->Form->select('country_id', $options, ['class' => 'form-control']);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" onchange="toggleSubmit()">
                I agree with the <a href="#">Terms and Conditions.</a>
            </label>
        </div>
        <?php
        $options = [
            'id' => 'reg-submit', 'style' => 'margin-top: 20px', 'class' => 'btn btn-dark',
            'disabled' => true
        ];
        echo $this->Form->button('Submit', $options);
        ?>
    </div>

    <?= $this->Form->end() ?>
</div>