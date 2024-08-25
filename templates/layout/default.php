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
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= (isset($title)) ? $title . 'Quran' : 'Quran' ?>
  </title>
  <?= $this->Html->meta('icon') ?>
  <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
  <meta name="turbolinks-cache-control" content="no-cache"/>
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
  <?= $this->Vite->assets('js/main.js', \Cake\Core\Configure::read('IS_DEV')) ?>
</head>

<body>
  <?= $this->element('navbar') ?>
  <div class="container">
    <!-- <img src="<?= $this->GlideImg->generate('img.jpg', 200, 200); ?>" alt=""> -->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>

  <?= $this->element('footer') ?>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <?= $this->Html->script('app.js') ?>
</body>
</body>

</html>
