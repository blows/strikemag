<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <?php $issue = $issues->first() ?>

        <div class="magazine-more">
          <div class="magazine-more__issues group">
            <?php foreach($issues as $issue): ?>

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
                  <p><?= $issue->title()->html() ?> <?php if ($issue->name()->isNotEmpty()): ?><?= $issue->name()->html() ?><?php endif ?></p>
                  <p><?= $issue->date('F Y', 'printed') ?></p>
                </div>
              </div>

            <?php endforeach ?>
          </div>
        </div>

    </div>

  </main>

<?php snippet('footer') ?>
