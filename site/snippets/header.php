<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0"> -->
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">

  <?php if($page->isHomepage()): ?>
    <title><?php echo html($site->title()) ?></title>
  <?php else: ?>
    <title><?php echo html($site->title() . ' – ' . $page->title()) ?></title>
  <?php endif ?>

  <meta name="description" content="<?= $site->description()->html() ?>">

  <!-- OpenGraph Tags -->
  <meta name="DC.Title" content="<?php echo html($page->title()) ?>" />
  <meta name="DC.Creator" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Rights" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Publisher" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Description" content="<?php echo html($page->summary()) ?>"/ >
  <meta name="DC.Language" content="de_DE" />
  <meta property="og:title" content="<?php echo html($page->title()) ?> | <?php echo html($site->title()) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo html($site->url()) ?>" />
  <?php if ($page->coverimage()->isNotEmpty()): ?>
    <meta property="og:image" content="<?php echo html($page->coverimage()->toFile()->url()) ?>" />
  <?php endif; ?>
  <meta property="og:description" content="<?php echo html($page->summary()) ?>" />
  <meta itemprop="name" content="<?php echo html($page->title()) ?> | <?php echo html($site->title()) ?>">
  <meta itemprop="description" content="<?php echo html($page->summary()) ?>">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo url('/favicon.ico') ?>" />
  <link rel="apple-touch-icon" href="<?php echo url('assets/images/icons/icons/iOS/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url('assets/images/icons/iOS/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url('assets/images/icons/iOS/apple-touch-icon-114x114.png') ?>" />

  <!-- Adaptive Images -->
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script>

  <script>
    // Picture element HTML5 shiv
    document.createElement( "picture" );
  </script>
  <script src="assets/js/picturefill.min.js" async></script>

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
