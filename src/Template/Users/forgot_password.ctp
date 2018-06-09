<div class="inline" style="font-size: 25px; padding: 50px;">
    <span class="fa fa-arrow-left"></span> &nbsp;
    <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?>
</div>

<div class="w-50 mx-auto mt-5">
  <?= $this->Form->create(false) ?>

  <h4>Enter the email address associated with your account:</h4>
  <?php
    $options = ['class' => 'form-control', 'placeholder' => 'bill@example.com', 'label' => false];
    echo $this->Form->input('email', $options);
  ?>
  <?= $this->Form->button('Submit', ['class' => 'btn btn-dark mt-3']) ?>

  <?= $this->Form->end() ?>
</div>

<style>
  body {
    background-color: white;
  }
</style>