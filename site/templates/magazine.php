<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <?php $colors = []; ?>
      <?php $issue = $issues->first() ?>
        <?php $box = 'background-' . uniqid(); $colors[$box] = $issue; ?>
        <?php $word = 'word-' . uniqid(); $colors[$word] = $issue; ?>

        <div class="magazine-more">
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
            background-color: <?= $issue->color() ?>;
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
