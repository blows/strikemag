<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <?= css('assets/css/screen.css') ?>

</head>
<body>

  <header class="header" role="banner">

      <div class="branding">
        <a href="<?= url() ?>" rel="home"><img src="<?php echo $site->image('strike-logo-white.svg')->url() ?>" alt="STRIKE! Magazine"></a>
      </div>

      <?php snippet('menu') ?>

  </header>
