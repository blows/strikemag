<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

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
            <h1 class="issue-summary__detail-title"><?= $page->title()->upper()->html() ?><?php if ($page->name()->isNotEmpty()): ?>: <?= $page->name()->upper()->html() ?><?php endif ?></h1>
            <h3 class="issue-summary__detail-printed">PRINTED: <?= $page->date('d.m.Y', 'printed') ?></h3>
            <p class="issue-summary__detail-summary"><?= $page->summary()->html() ?></p>
          </div>
          <?php if ($page->buy()->isNotEmpty()): ?>
            <div class="issue-summary__detail-buy">
              <a class="button <?= $box ?> <?= $word ?>" href="<?= $page->buy()->html() ?>" target="_blank">GET THE ISSUE</a>
            </div>
          <?php endif ?>
        </div>

        <?= js('assets/js/iis.min.js') ?>

        <script>
        var slider = new IdealImageSlider.Slider({
          selector: '#issue-slider',
          height: 600, // Required but can be set by CSS
          interval: 99999999,
          effect: 'fade',
          transitionDuration: 0
        });
        slider.start();</script>

        <div class="issue-contents">
          <div class="issue-contents-group">
            <?php foreach($page->children()->sortBy('sort', 'desc') as $content): ?>
              <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>

                <?php if($content->isVisible()): ?>
                  <div class="issue-contents__content <?= $box ?>">
                    <a href="<?= $content->url() ?>">
                    <h1 class="issue-contents__content-title"><?= $content->title()->html() ?></h1>
                    <h3 class="issue-contents__content-contributor">
                      &mdash;<?php foreach ($content->contributor()->split() as $name): ?>
                            <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
                      <?php endforeach; ?>
                    </h3></a>
                  </div>
                <?php else: ?>
                  <div class="issue-contents__content <?= $box ?> offline">
                    <h1 class="issue-contents__content-title"><?= $content->title()->html() ?></h1>
                    <h3 class="issue-contents__content-contributor">
                      &mdash;<?php foreach ($content->contributor()->split() as $name): ?>
                          <span><?php echo $pages->find('contributors/' . $name)->title()->html() ?></span>
                      <?php endforeach; ?>
                    </h3>
                  </div>
                <?php endif ?>

            <?php endforeach ?>
          </div>
        </div>

        <div class="issue-cards">
          <?php foreach($page->children()->visible()->sortBy('sort', 'desc') as $content): ?>

            <?php snippet('cardPortrait', array(
            'article' => $content,
            'contributor' => $pages->find('contributors/' . $content->contributor()),
            'issue' => $pages->find('magazine/' . $content->printed())
            )) ?>

          <?php endforeach ?>
        </div>

      </div>

      <div class="magazine-more">
        <p class="magazine-more__explore">More Issues</p>
        <div class="magazine-more__issues group">
          <?php foreach($issues as $issue): ?>

            <?php $box = 'background-' . uniqid(); $colors[$box] = $issue; ?>

            <?php $image = $issue->coverimage()->toFile(); ?>

            <div class="magazine-more__issue-cover">
              <a href="<?= $issue->url() ?>" alt="<?= $issue->title()->html() ?>: <?= $issue->name()->html() ?>">
                <img src="<?php echo thumb($image, array('width' => 690, 'height' => 946, 'quality' => 100), false) ?>" alt="STRIKE! <?= $issue->title()->html() ?>" sizes="100vw"
                srcset="<?php echo thumb($image, array('width' => 504, 'height' => 691, 'quality' => 70), false) ?> 600w,
                 <?php echo thumb($image, array('width' => 460, 'height' => 575, 'quality' => 70), false) ?> 800w,
                 <?php echo thumb($image, array('width' => 690, 'height' => 946, 'quality' => 70), false) ?> 1200w,
                 <?php echo thumb($image, array('width' => 930, 'height' => 1275, 'quality' => 70), false) ?> 1600w,
                 <?php echo thumb($image, array('width' => 1174, 'height' => 1610, 'quality' => 70), false) ?> 2000w" />
              </a>
              <div class="magazine-more__issue-details">
                <p><?= $issue->title()->html() ?>, <?= $issue->date('M Y', 'printed') ?></p>
                <p>
                  <?php if ($issue->name()->isNotEmpty()): ?><?= $issue->name()->html() ?><?php endif ?>
                </p>
              </div>
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
