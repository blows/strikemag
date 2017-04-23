<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/6a356015ff.js"></script>

  <?= css('assets/css/screen.css') ?>

  <!-- custom css -->
  <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
  <?php echo css($css->url()) ?>
  <?php endforeach ?>

  <?php if(isset($issue)) : ?>
    <style type="text/css">

    </style>
  <?php endif ?>

  <!-- custom javascript -->
  <?php foreach($page->files()->filterBy('extension', 'js') as $js): ?>
  <?php echo js($js->url()) ?>
  <?php endforeach ?>

</head>
<body>

  <header class="header nav-down" role="banner">

      <div class="branding">
        <a href="<?= url() ?>" rel="home"><img src="<?php echo $site->image('strike-logo-white.svg')->url() ?>" alt="STRIKE! Magazine"></a>
      </div>

      <?php snippet('menu') ?>

  </header>
