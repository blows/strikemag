<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <div class="magazine-intro">
        <p>Explore all the back issues of our quarterly publication.</p>
      </div>

      <?php $colors = []; ?>
      <?php $issue = $issues->first() ?>
        <?php $box = 'background-' . uniqid(); $colors[$box] = $issue; ?>
        <?php $word = 'word-' . uniqid(); $colors[$word] = $issue; ?>

        <div class="issue group" id="<?php echo $issue->uid() ?>">

          <div class="issue-summary text">
            <div class="issue-summary__image" style="background-color: <?= $issue->color() ?>;">
              <div id="issue-slider" style="background-color: <?= $issue->color() ?>;">
                <?php foreach($issue->images()->sortBy('sort', 'asc') as $image) : ?>
                    <img src="<?php echo $image->url() ?>" srcset="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" />
                <?php endforeach ?>
              </div>
            </div>
            <div class="issue-summary__detail">
              <h1 class="issue-summary__detail-title"><?= $issue->title()->upper()->html() ?>: <?= $issue->name()->html() ?></h1>
              <h3 class="issue-summary__detail-printed">PRINTED: <?= $issue->date('d/m/Y', 'printed') ?></h3>
              <p class="issue-summary__detail-summary"><?= $issue->summary()->html() ?></p>
            </div>
            <?php if ($issue->buy()->isNotEmpty()): ?>
              <div class="issue-summary__detail-buy">
                <a class="button <?= $box ?> <?= $word ?>" href="<?= $issue->buy()->html() ?>" target="_blank">GET THE ISSUE</a>
              </div>
            <?php endif ?>
          </div>

          <div class="issue-contents">
            <!-- <div class="issue-contents__title"><h1><?php echo $issue->title()->upper() ?> CONTENTS</h1><i class="fa fa-angle-down" aria-hidden="true"></i></div> -->
            <div class="issue-contents-group">
              <?php foreach($issue->children()->sortBy('sort', 'desc') as $content): ?>
                <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>

                  <?php if($content->isVisible()): ?>
                    <div class="issue-contents__content <?= $box ?>">
                    <a href="<?= $content->url() ?>">
                    <h1 class="issue-contents__content-title"><?= $content->title()->upper()->html() ?></h1>
                    <?php foreach ($content->contributor()->split() as $name): ?>
                          <h3 class="issue-contents__content-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
                    <?php endforeach; ?></a>
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
            <?php foreach($issues as $issue): ?>

              <?php $image = $issue->coverimage()->toFile(); ?>

              <div class="magazine-more__issue-cover">
                <a href="<?= $issue->url() ?>" alt="<?= $issue->title()->html() ?>: <?= $issue->name()->html() ?>">
                  <div class="magazine-more__issue-hover">
                    <h5><?= $issue->title()->upper()->html() ?><?php if ($issue->name()->isNotEmpty()): ?>&mdash;<?= $issue->name()->upper()->html() ?><?php endif ?></h5>
                    <img src="<?php echo thumb($image, array('width' => 364.5, 'height' => 500, 'quality' => 100), false) ?>" alt="STRIKE! <?= $issue->title()->html() ?> class="fill" sizes="100vw" srcset="<?php echo thumb($image, array('width' => 600, 'height' => 823, 'quality' => 70, 'crop' => true), false) ?> 600w,
                     <?php echo thumb($image, array('width' => 800, 'height' => 1097, 'quality' => 70, 'crop' => true), false) ?> 800w,
                     <?php echo thumb($image, array('width' => 1200, 'height' => 1646, 'quality' => 70, 'crop' => true), false) ?> 1200w,
                     <?php echo thumb($image, array('width' => 1600, 'height' => 2194.78, 'quality' => 70, 'crop' => true), false) ?> 1600w,
                     <?php echo thumb($image, array('width' => 2000, 'height' => 2743.5, 'quality' => 70, 'crop' => true), false) ?> 2000w" />
                  </div>
                </a>
              </div>
            <?php endforeach ?>
          </div>
        </div>



      <style>
  <?php foreach($colors as $box => $issue): ?>
    .<?= $box ?> {
      border-color: <?= $issue->color() ?> !important;
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

    </div>

  </main>

<?php snippet('footer') ?>
