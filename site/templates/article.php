<?php snippet('header') ?>

  <main style="background-image: linear-gradient(lightgrey, <?= $page->parent()->color() ?>, <?= $page->parent()->color2() ?>);" class="main center" role="main">

    <article class="article center">

      <?php $contributor = $pages->find('contributors/' . $page->contributor()) ?>
      <?php $issue = $pages->find('magazine/' . $page->printed()) ?>

      <header class="article-info center">
        <?php if ($page->printed()->isNotEmpty()) : ?>
          <h3 class="article-header__issue"><?php echo $issue->title()->upper() ?></h3>
        <?php endif; ?>
        <div class="article-header">
          <h1 class="article-header__title"><?= $page->title()->upper()->html() ?></h1>
          <a href="<?php echo $pages->find('contributors')->url() . "#" . $contributor->uid() ?>"><h2 class="article-header__contributor"><?php echo $contributor->title()->upper()->html() ?></h2></a>
          <p class="article-header__summary"><?= $page->summary()->html() ?></p>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
          <div class="article-printed center">
            <figure>
              <img class="article-printed__cover" style="background-color: <?= $page->parent()->color() ?>" src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
            </figure>
            <div class="article-printed__info" style="background-color: <?= $page->parent()->color2() ?>">
              <p>Printed: <?= $issue->date('d/m/Y', 'printed') ?></p>
              <p>Uploaded: <?= $page->date('d/m/Y', 'uploaded') ?></p>
              <p>Get the issue <a href="shop">here</a></p>
            </div>
          </div>
        <?php endif; ?>
        <!-- <hr /> -->
      </header>

      <!-- <?php snippet('coverimage', $page) ?> -->

      <div class="text center">
        <?= $page->text()->kirbytext() ?>
      </div>

    </article>

    <?php snippet('prevnext', ['flip' => true]) ?>

  </main>

<?php snippet('footer') ?>
