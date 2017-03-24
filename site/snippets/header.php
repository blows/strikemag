<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <?= css('assets/css/screen.css') ?>

  <!-- custom css -->
  <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
  <?php echo css($css->url()) ?>
  <?php endforeach ?>
  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/6a356015ff.js"></script>


  <!-- custom javascript -->
  <?php foreach($page->files()->filterBy('extension', 'js') as $js): ?>
  <?php echo js($js->url()) ?>
  <?php endforeach ?>

  <?php if(isset($article)) : ?>
    <style type="text/css">
      <?php if($color = $article->parent()->color()) : ?>
         .card-large:hover {
           background-color: <?php echo $color ?>;
         }
      <?php endif; ?>
    </style>
  <?php endif ?>

</head>
<body>

  <header class="header" role="banner">

      <div class="branding">
        <a href="<?= url() ?>" rel="home"><img src="<?php echo $site->image('strike-logo-white.svg')->url() ?>" alt="STRIKE! Magazine"></a>
      </div>

      <?php snippet('menu') ?>

  </header>
