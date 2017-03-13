<?php snippet('header') ?>

  <main style="background-image: linear-gradient(lightgrey, <?= $page->parent()->color() ?> 15%, <?= $page->parent()->color() ?> 50%, <?= $page->parent()->color2() ?>);" class="main center" role="main">

    <article class="article">

      <?php $contributor = $pages->find('contributors/' . $page->contributor()) ?>
      <?php $issue = $pages->find('magazine/' . $page->printed()) ?>

      <header class="article-info">
        <?php if ($page->printed()->isNotEmpty()) : ?>
          <h3 class="article-header__issue" style="color: <?= $page->parent()->color() ?>"><?php echo $issue->title()->upper() ?></h3>
        <?php endif; ?>
        <div class="article-header">
          <h1 class="article-header__title" style="color: <?= $page->parent()->color() ?>"><?= $page->title()->upper()->html() ?></h1>
          <a href="<?php echo $pages->find('contributors')->url() . "#" . $contributor->uid() ?>"><h2 class="article-header__contributor" style="color: <?= $page->parent()->color() ?>"><?php echo $contributor->title()->upper()->html() ?></h2></a>
          <p class="article-header__summary"><?= $page->summary()->html() ?></p>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
          <a href="shop">
            <div class="article-printed">
              <figure>
                <img class="article-printed__cover" style="background-color: <?= $page->parent()->color() ?>" src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </figure>
              <div class="article-printed__info" style="background-color: <?= $page->parent()->color2() ?>">
                <p>Printed: <?= $issue->date('d/m/Y', 'printed') ?></p>
                <p>Uploaded: <?= $page->date('d/m/Y', 'uploaded') ?></p>
                <p>Get the issue here</p>
              </div>
            </div>
          </a>
        <?php endif; ?>
        <!-- <hr /> -->
      </header>

      <div class="text">
        <?= $page->text()->kirbytext() ?>

        <div class="article-end">
          <a class="article-end__contributor" href="<?php echo $pages->find('contributors')->url() . "#" . $contributor->uid() ?>"><h2 class="article-header__contributor" style="color: <?= $page->parent()->color() ?>"><?php echo $contributor->title()->upper()->html() ?></h2></a>
          <?php if ($page->printed()->isNotEmpty()) : ?>
            <p class="article-end__printed">PRINTED: <?= $issue->date('d/m/Y', 'printed') ?></p>
          <?php endif; ?>
          <p class="article-end__uploaded">UPLOADED: <?= $page->date('d/m/Y', 'uploaded') ?></p>
        </div>
      </div>

    </article>

    <?php snippet('prevnext', ['flip' => true]) ?>

  </main>

<?php snippet('footer') ?>
