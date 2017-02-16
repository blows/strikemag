<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>
      <div class="intro text">
        <?= $page->intro()->kirbytext() ?>
      </div>
      <hr />
    </header>

    <div class="text wrap">

      <?= $page->text()->kirbytext() ?>

      <?php foreach($page->children()->visible()->sortBy('sort', 'desc') as $issue): ?>
        <div class="issue">
          <div class="issue-summary">
            <div class="issue-summary__image">
              <figure>
                <img src="<?= $issue->coverimage()->toFile()->uri() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </figure>
            </div>
            <div class="issue-summary__detail">
              <h1 class="issue-summary__detail-title"><?= $issue->title()->html() ?>: <?= $issue->name()->html() ?></h1>
              <p class="issue-summary__detail-summary"><?= $issue->summary()->html() ?></p>
            </div>
          </div>
          <div class="issue-contents">
            <?php foreach($issue->children()->visible()->sortBy('sort', 'desc') as $content): ?>
              <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>
              <div class="issue-contents__content">
                <a href="<?= $content->url() ?>"><h1 class="issue-contents__content-title"><?= $content->title()->html() ?></h1></a>
                <a href="<?= $contributor->url() ?>"><h3 class="issue-contents__content-title"><?= $contributor->title() ?></h3></a>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>

    </div>

  </main>

<?php snippet('footer') ?>
