<?php snippet('header') ?>

  <main style="background-color: <?= $page->parent()->color() ?>" class="main" role="main">

    <article class="article">

      <header class="article-header">
        <h1><?= $page->title()->html() ?></h1>
        <div class="intro text">
          <?= $page->date('F jS, Y') ?>
        </div>
        <hr />
      </header>

      <!-- <?php snippet('coverimage', $page) ?> -->

      <div class="text">
        <?= $page->text()->kirbytext() ?>
      </div>

    </article>

    <?php snippet('prevnext', ['flip' => true]) ?>

  </main>

<?php snippet('footer') ?>
