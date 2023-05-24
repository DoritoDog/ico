<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <!-- Animate.css -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">

  <!-- Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Highlight.js -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

  <?= $this->Html->script('JavaScript') ?>
  <?= $this->Html->css('StyleSheet') ?>

  <style>
  body { background: #131313; }
  </style>
</head>
<body>
  <?= $this->Flash->render() ?>
  <div id="sidebar">
    <h5>Dashboard
      <button type="button" id="sidebarCollapse">
        <span class="fa fa-navicon"><span>
      </button>
    </h5>
    <ul class="list-unstyled">
      <li>
        <?php echo $this->Html->link(
            $this->Html->tag('span', '', array('class' => 'fa fa-home')),
            ['action' => 'index'],
            ['escape' => FALSE]
        ); ?>
        <?= $this->Html->link('Home', ['action' => 'index'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-credit-card-alt')),
              ['action' => 'buyAndTransfer'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('Buy & Transfer Tokens', ['action' => 'buyAndTransfer'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-globe')),
              ['action' => 'news'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('News', ['action' => 'news'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-area-chart')),
              ['action' => 'icoStatistics'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('ICO Statistics', ['action' => 'icoStatistics'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-cube')),
              ['action' => 'blockExplorer'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('Block Explorer', ['action' => 'blockExplorer'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-address-book')),
              ['action' => 'profile'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('Account', ['action' => 'profile'], ['class' => 'sidebar-link']) ?>
      </li>
      <li>
          <?php
          echo $this->Html->link(
              $this->Html->tag('span', '', array('class' => 'fa fa-user')),
              ['action' => 'logout'],
              ['escape' => FALSE]
          );
          ?>
          <?= $this->Html->link('Sign out', ['action' => 'logout'], ['class' => 'sidebar-link']) ?>
      </li>
    </ul>
  </div>

  <div id="content">
    <?= $this->fetch('content') ?>
  </div>
</body>
</html>
