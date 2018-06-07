<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
    <style>
    .container {
      border: 1px solid black;
      border-radius: 10px;
      padding: 20px;
      margin: 10px auto 5px auto;
      color: black;
      width: 50%;
  }

  .inline {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 50px;
  }

  .inline * {
    margin: 0 20px;
  }

  .row {
      margin: auto;
  }

  body {
    background: white;
    font-family: 'Helvetica Neue';
  }

  p {
      font-size: 18px;
  }
  </style>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>
