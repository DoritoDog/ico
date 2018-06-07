<div class="container">
  <div class="inline">
    <h1>Welcome Kareem</h1>
    <?=
    $this->Html->image(
      'https://ico.kareemsprojects.site/webroot/img/ethereum-logo.png', 
      ['height' => 50, 'title' => 'Logo', 'alt' => 'h']
      ) ?>
  </div>

  <p>Thanks for creating your CryptoTech account,</p>
  <p>You can monitor your accounts balance and view our token's price in your
  <a href="#">Dashboard</a></p>
  <p>Stay up to date with cryptocurrency news <a href="#">here</a></p>

  <div style="margin-top: 20px">
    <?php
    $options = ['width' => '100%'];
    echo
    $this->Html->image('https://ico.kareemsprojects.site/webroot/img/Landing%20page%20background.png', $options);
    ?>
  </div>

  <p style="margin-top: 50px">
    Best regards, <br>
    The CryptoTech Team
  </p>
</div>