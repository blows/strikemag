<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <?php $colors = []; ?>
      <?php $box = 'background-' . uniqid(); $colors[$box] = $page; ?>
      <?php $word = 'word-' . uniqid(); $colors[$word] = $page; ?>

      <div class="issue group" id="<?php echo $page->uid() ?>">

        <div class="issue-summary text">
          <div class="issue-summary__image">
            <div id="issue-slider">
              <?php foreach($page->images()->sortBy('sort', 'asc') as $image) : ?>
                  <img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" />
              <?php endforeach ?>
            </div>
          </div>
          <div class="issue-summary__detail">
            <h1 class="issue-summary__detail-title"><?= $page->title()->html() ?><?php if ($page->name()->isNotEmpty()): ?>: <span class="bold-italic"><?= $page->name()->html() ?></span><?php endif ?></h1>
            <p class="issue-summary__detail-summary"><?= $page->summary()->html() ?></p>
            <p class="issue-summary__detail-printed">Printed: <?= $page->date('F Y', 'printed') ?></p>
          </div>
          <?php if ($page->buy()->isNotEmpty()): ?>
            <div class="issue-summary__detail-buy">
              <a class="button" href="<?= $page->buy()->html() ?>" target="_blank">Get the issue</a>
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
          <ul class="issue-contents-group">
            <li class="issue-contents__title">
              <p>Contents</p>
            </li>
            <?php foreach($page->children()->sortBy('sort', 'desc') as $content): ?>
              <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>

                <?php if($content->isVisible()): ?>
                  <li class="issue-contents__content">
                    <a href="<?= $content->url() ?>">
                    <p class="issue-contents__content-title"><?= $content->title()->html() ?></p>
                    <p class="issue-contents__content-contributor">
                      &mdash;<?php foreach ($content->contributor()->split() as $name): ?>
                            <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
                      <?php endforeach; ?>
                    </p></a>
                  </li>
                <?php else: ?>
                  <li class="issue-contents__content offline">
                    <p class="issue-contents__content-title"><?= $content->title()->html() ?></p>
                    <p class="issue-contents__content-contributor">
                      &mdash;<?php foreach ($content->contributor()->split() as $name): ?>
                          <span><?php echo $pages->find('contributors/' . $name)->title()->html() ?></span>
                      <?php endforeach; ?>
                    </p>
                  </li>
                <?php endif ?>

            <?php endforeach ?>
          </ul>
        </div>

        <div class="issue-cards">
          <?php foreach($page->children()->visible()->sortBy('sort', 'desc') as $content): ?>

            <?php $ci = $content->coverimage()->toFile() ?>

            <?php if($ci->orientation() == 'portrait'): ?>
              <?php snippet('cardLargePortrait', array(
              'article' => $content,
              'contributor' => $pages->find('contributors/' . $content->contributor()),
              'issue' => $pages->find('magazine/' . $content->printed())
              )) ?>

            <?php else: ?>
              <?php snippet('cardLargeLandscape', array(
              'article' => $content,
              'contributor' => $pages->find('contributors/' . $content->contributor()),
              'issue' => $pages->find('magazine/' . $content->printed())
              )) ?>
            <?php endif ?>

          <?php endforeach ?>
        </div>

      </div>

      <div class="magazine-more">
        <p class="magazine-more__explore">More issues</p>
        <div class="magazine-more__issues group">
          <?php foreach($issues as $issue): ?>

            <?php $box = 'background-' . uniqid(); $colors[$box] = $issue; ?>

            <?php $image = $issue->coverimage()->toFile(); ?>

            <div class="magazine-more__issue-cover">
              <a href="<?= $issue->url() ?>" alt="<?= $issue->title()->html() ?>: <?= $issue->name()->html() ?>">
                <img src="<?php echo thumb($image, array('width' => 600, 'quality' => 70), false) ?>" alt="STRIKE! <?= $issue->title()->html() ?>"
                sizes="(max-width: 450px) 40vw, 28vw"
                srcset="<?php echo thumb($image, array('width' => 270, 'quality' => 70), false) ?> 270w,
                 <?php echo thumb($image, array('width' => 322, 'quality' => 70), false) ?> 322w,
                 <?php echo thumb($image, array('width' => 405, 'quality' => 70), false) ?> 405w,
                 <?php echo thumb($image, array('width' => 510, 'quality' => 70), false) ?> 510w,
                 <?php echo thumb($image, array('width' => 615, 'quality' => 70), false) ?> 615w" />
              </a>
              <div class="magazine-more__issue-details">
                <p><?= $issue->title()->html() ?>, <?= $issue->date('M Y', 'printed') ?></p>
                <p class="italic">
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
