<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="">
      <h1><?= $page->title()->html() ?></h1>

      <?php
      // This page uses a separate controller to set variables, which can be used
      // within this template file. This results in less logic in your templates,
      // making them more readable. Learn more about controllers at:
      // https://getkirby.com/docs/developer-guide/advanced/controllers
      if($pagination->page() == 1):
      ?>
        <div class="intro text">
          <?= $page->text()->kirbytext() ?>
        </div>
      <?php endif ?>
    </header>

    <section class="">
      <?php if($articles->count()): ?>
        <?php foreach($articles as $article): ?>

          <article class="card-large">

            <div class="card-large-image">
              <?php snippet('coverimage', $article) ?>
            </div>

            <header class="card-large-info">
              <h2 class="card-large-info__title">
                <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a>
              </h2>
            </header>

          </article>

        <?php endforeach ?>
      <?php else: ?>
        <p>This blog does not contain any articles yet.</p>
      <?php endif ?>
    </section>

    <?php snippet('pagination') ?>

  </main>

<?php snippet('footer') ?>
