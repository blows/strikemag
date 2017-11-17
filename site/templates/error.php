<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="article-header">
      <h1 class="article-header__title"><?= $page->title()->html() ?></h1>
      <div class="article-header__meta">
        <?= $page->intro()->kirbytext() ?>
      </div>
    </header>

    <div class="article">
      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>
    </div>

  </main>

<?php snippet('footer') ?>
