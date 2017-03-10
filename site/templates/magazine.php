<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <?= $page->text()->kirbytext() ?>

      <?php foreach($page->children()->visible()->sortBy('sort', 'desc') as $issue): ?>
        <div class="issue">
          <div class="issue-summary text" style="background-color: <?= $issue->color() ?>;">
            <div class="issue-summary__image">
              <figure>
                <img src="<?= $issue->coverimage()->toFile()->uri() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </figure>
            </div>
            <div class="issue-summary__detail">
              <h1 class="issue-summary__detail-title"><?= $issue->title()->html() ?>: <?= $issue->name()->html() ?></h1>
              <h3 class="issue-summary__detail-printed">PRINTED: <?= $issue->date('d/m/Y', 'printed') ?></h3>
              <p class="issue-summary__detail-summary"><?= $issue->summary()->html() ?></p>
            </div>
            <div class="issue-summary__detail-buy">
              <button type="button">GET THE ISSUE</button>
            </div>
          </div>
          <div class="issue-contents" style="background-color: <?= $issue->color1() ?>;">
            <div class="issue-contents__title"><h1>CONTENTS</h1></div>
            <?php foreach($issue->children()->sortBy('sort', 'desc') as $content): ?>
              <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>
              <div class="issue-contents__content" style="background-color: <?= $issue->color1() ?>;">
                <?php if($content->isVisible()): ?>
                  <p class="issue-contents__content-online">ONLINE</p>
                  <a href="<?= $content->url() ?>"><h1 class="issue-contents__content-title"><?= $content->title()->upper()->html() ?></h1></a>
                  <a href="<?= $contributor->url() ?>"><h3 class="issue-contents__content-contributor"><?= $contributor->title()->upper() ?></h3></a>
                <?php else: ?>
                  <h1 class="issue-contents__content-title"><?= $content->title()->html()->upper() ?></h1>
                  <h3 class="issue-contents__content-contributor"><?= $contributor->title()->upper() ?></h3>
                <?php endif ?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>

    </div>

  </main>

<?php snippet('footer') ?>
