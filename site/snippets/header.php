<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0"> -->
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/6a356015ff.js"></script>

  <?= css('assets/plugins/embed/css/embed.css') ?>
  <?= css('assets/css/screen.css') ?>

  <!-- custom css -->
  <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
  <?php echo css($css->url()) ?>
  <?php endforeach ?>

  <!-- custom javascript -->
  <?php foreach($page->files()->filterBy('extension', 'js') as $js): ?>
  <?php echo js($js->url()) ?>
  <?php endforeach ?>

</head>
<body>

  <header class="header" role="banner">

      <?php snippet('menu') ?>

  </header>
