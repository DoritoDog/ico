<div class="page-content">
    <?php echo $this->Form->create($user) ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1 class="text-center">Change Password</h1>
                <div class="form-group inline">
                <?php
                echo $this->Form->label('password', 'New Password', ['class' => 'bold']);
                $options = [
                    'class' => 'form-control', 'label' => false, 'required' => true,
                    'autofocus' => true
                ];
                echo $this->Form->input('password', $options);
                ?>
                </div>
                <div class="form-group">
                <?php 
                    echo $this->Form->label('password', 'Confirm Password', ['class' => 'bold']);
                    $options = ['class' => 'form-control', 'label' => false, 'required' => true];
                    echo $this->Form->input('password', $options);
                ?>
                </div>
                <?php echo $this->Form->button('Save', ['class' => 'btn btn-dark']); ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>