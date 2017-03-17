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

    <h2 class="section-header">RECENT</h2>
    <section class="online-recent group">
      <?php if($articles->count()): ?>
        <?php foreach($articles as $article): ?>
        <?php $contributor = $pages->find('contributors/' . $article->contributor()) ?>
        <?php $issue = $pages->find('magazine/' . $article->printed()) ?>

          <article class="card-large">
            <a href="<?= $article->url() ?>">
            <?php if ($article->coverimage()->isNotEmpty()) : ?>
              <div class="card-large-image">
                <?php snippet('coverimage', $article) ?>
              </div>
            <?php endif; ?>

            <header class="card-large-info">

                <div class="card-large-info__group">
                  <?php if ($article->printed()->isNotEmpty()) : ?>
                    <h3 class="card-large-info__issue">
                      <?= $issue->title()->upper()->html() ?>
                    </h3>
                  <?php endif; ?>
                  <h2 class="card-large-info__title" style="color: <?= $article->parent()->color() ?>">
                    <?= $article->title()->upper()->html() ?>
                  </h2>
                  <h3 class="card-large-info__contributor" style="color: <?= $article->parent()->color() ?>">
                    <?= $contributor->title()->upper() ?>
                  </h3>
                </div>
                <p class="card-large-info__summary">
                  <?= $article->summary()->html() ?>
                </p>
            </header>
            </a>
          </article>

        <?php endforeach ?>
      <?php else: ?>
        <p>This blog does not contain any articles yet.</p>
      <?php endif ?>
    </section>

    <?php snippet('pagination') ?>

  </main>

<?php snippet('footer') ?>
