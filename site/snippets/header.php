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

  <meta name="description" content="<?= $site->description() ?>">

  <!-- OpenGraph Tags -->
  <?php if($page->isHomepage()): ?>
    <meta name="DC.Title" content="<?php echo html($site->title()) ?>" />
  <?php else: ?>
    <meta name="DC.Title" content="<?php echo html($site->title() . ' – ' . $page->title()) ?>" />
  <?php endif ?>
  <meta name="DC.Creator" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Rights" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Publisher" content="<?php echo html($site->author()) ?>" />
  <meta name="DC.Description" content="<?php echo html($page->summary()) ?>" />
  <meta name="DC.Language" content="en_GB" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@strikeyo" />
  <meta name="twitter:creator" content="@strikeyo" />
  <?php if($page->isHomepage()): ?>
    <meta property="og:title" content="<?php echo html($site->title()) ?>" />
  <?php else: ?>
    <meta property="og:title" content="<?php echo html($site->title() . ' – ' . $page->title()) ?><?php if ($page->subtitle()->isNotEmpty()): ?>: <?= $page->subtitle()->html() ?><?php endif ?>" />
  <?php endif ?>
  <meta property="og:site_name" content="<?php echo html($site->title()) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo html($site->url()) ?>" />
  <?php if ($page->coverimage()->isNotEmpty()): ?>
    <meta property="og:image" content="<?php echo html($page->coverimage()->toFile()->url()) ?>" />
  <?php else: ?>
    <meta property="og:image" content="<?php echo html($site->image('strike-logo-square.png')->url()) ?>" />
  <?php endif; ?>
  <?php if ($page->summary()->isNotEmpty()): ?>
    <meta property="og:description" content="<?php echo html($page->summary()) ?>" />
  <?php else: ?>
    <meta property="og:description" content="<?php echo html(page('info')->summary()) ?>" />
  <?php endif; ?>
  <meta itemprop="name" content="<?php echo html($page->title()) ?> | <?php echo html($site->title()) ?>">
  <meta itemprop="description" content="<?php echo html($page->summary()) ?>">

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo url('/favicon.ico') ?>" />
  <link rel="apple-touch-icon" href="<?php echo url('assets/images/icons/icons/iOS/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url('assets/images/icons/iOS/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url('assets/images/icons/iOS/apple-touch-icon-114x114.png') ?>" />

  <!-- CSS -->
  <?= css('assets/css/screen.css') ?>
  <?= css('assets/plugins/embed/css/embed.css') ?>

  <!-- custom css -->
  <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
  <?php echo css($css->url()) ?>
  <?php endforeach ?>

  <!-- Adaptive Images -->
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script>

  <script>
    // Picture element HTML5 shiv
    document.createElement( "picture" );
  </script>
  <?= js('assets/js/picturefill.min.js', true) ?>

  <!-- Font Awesome -->
  <script async src="https://use.fontawesome.com/6a356015ff.js"></script>

  <!-- Piwik -->
  <script type="text/javascript">
    var _paq = _paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
    _paq.push(["setCookieDomain", "*.strikemag.org"]);
    _paq.push(["setDomains", ["*.strikemag.org","*.strikemag.org","*.www.strikemag.org","*.www.strikemag.org"]]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//www.thisblows.uk/analytics/";
      _paq.push(['setTrackerUrl', u+'piwik.php']);
      _paq.push(['setSiteId', '5']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Piwik Code -->

</head>
<body>

  <header class="header" role="banner">

      <?php snippet('menu') ?>

  </header>
