<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine-intro">
      <p>Explore all the back issues of our quarterly publication.</p>
    </div>

    <?php $colors = []; ?>
    <?php $box = 'background-' . uniqid(); $colors[$box] = $page; ?>
    <?php $word = 'word-' . uniqid(); $colors[$word] = $page; ?>

    <div class="issue group" id="<?php echo $page->uid() ?>">

      <div class="issue-summary text">
        <div class="issue-summary__image" style="background-color: <?= $page->color() ?>;">
          <div id="issue-slider" style="background-color: <?= $page->color() ?>;">
            <?php foreach($page->images()->sortBy('sort', 'asc') as $image) : ?>
                <img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" />
            <?php endforeach ?>
          </div>
        </div>
        <div class="issue-summary__detail">
          <h1 class="issue-summary__detail-title"><?= $page->title()->upper()->html() ?><?php if ($page->name()->isNotEmpty()): ?>&mdash;<?= $page->name()->upper()->html() ?><?php endif ?></h1>
          <h3 class="issue-summary__detail-printed">PRINTED: <?= $page->date('d/m/Y', 'printed') ?></h3>
          <p class="issue-summary__detail-summary"><?= $page->summary()->html() ?></p>
        </div>
        <?php if ($page->buy()->isNotEmpty()): ?>
          <div class="issue-summary__detail-buy">
            <a class="button <?= $box ?> <?= $word ?>" href="<?= $page->buy()->html() ?>" target="_blank">GET THE ISSUE</a>
          </div>
        <?php endif ?>
      </div>

      <div class="issue-contents">
        <!-- <div class="issue-contents__title"><h1><?php echo $page->title()->upper() ?> CONTENTS</h1><i class="fa fa-angle-down" aria-hidden="true"></i></div> -->
        <div class="issue-contents-group">
          <?php foreach($page->children()->sortBy('sort', 'desc') as $content): ?>
            <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>

              <?php if($content->isVisible()): ?>
                <div class="issue-contents__content <?= $box ?>">
                  <a href="<?= $content->url() ?>">
                  <h1 class="issue-contents__content-title"><?= $content->title()->upper()->html() ?></h1>
                  <h3 class="issue-contents__content-contributor">
                    <?php foreach ($content->contributor()->split() as $name): ?>
                          <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
                    <?php endforeach; ?>
                  </h3></a>
                </div>
              <?php else: ?>
                <div class="issue-contents__content <?= $box ?> offline">
                  <h1 class="issue-contents__content-title"><?= $content->title()->html()->upper() ?></h1>
                  <h3 class="issue-contents__content-contributor">
                    <?php foreach ($content->contributor()->split() as $name): ?>
                        <span><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></span>
                    <?php endforeach; ?>
                  </h3>
                </div>
              <?php endif ?>

          <?php endforeach ?>
        </div>
      </div>

    </div>

    <div class="magazine-more">
      <p class="magazine-more__explore">MORE ISSUES</p>
      <div class="magazine-more__issues group">
        <?php foreach($issues->not($latest) as $issue): ?>
          <div class="magazine-more__issue-cover">
            <a href="<?= $issue->url() ?>" alt="<?= $issue->title()->html() ?>: <?= $issue->name()->html() ?>">
              <div class="magazine-more__issue-hover">
                <h5><?= $issue->title()->upper()->html() ?><?php if ($issue->name()->isNotEmpty()): ?>&mdash;<?= $issue->name()->upper()->html() ?><?php endif ?></h5>
                <img src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </div>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>

  <style>
  <?php foreach($colors as $box => $issue): ?>
    .<?= $box ?> {
      border-color: <?= $issue->color() ?>;
    }

    .<?= $box ?>:hover, .<?= $box ?>:focus {
      background: <?= $issue->color() ?> !important;
    }

    .<?= $box ?>:hover.offline, .<?= $box ?>:focus.offline {
      background: transparent !important;
    }

    .<?= $word ?> {
      color: <?= $issue->color() ?> !important;
    }

    .<?= $word ?>:hover, .<?= $word ?>:focus {
      color: white !important;
    }
  <?php endforeach ?>
  </style>

  </main>

<?php snippet('footer') ?>
