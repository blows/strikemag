<?php snippet('header') ?>

  <main style="background-image: linear-gradient(<?= $page->parent()->color() ?> 15%, <?= $page->parent()->color() ?> 50%, <?= $page->parent()->color2() ?>);" class="main" role="main">

    <article class="article group">

      <header class="article-info">
        <div class="article-header">
          <h1 class="article-header__title"><?= $page->title()->upper()->html() ?></h1>
          <?php if ($page->subtitle()->isNotEmpty()) : ?><h1 class="article-header__subtitle"><?= $page->subtitle()->upper()->html() ?></h1><?php endif ?>

          <h2 class="article-header__contributor">
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
            </a>
          <?php endforeach; ?>
          </h2>

          <h3 class="article-header__meta">
            <?php if ($page->printed()->isNotEmpty()) : ?><?php echo $issue->title()->upper() ?> <?php endif; ?>(<?= $page->category()->upper()->html() ?>)
          </h3>

          <h3 class="article-header__meta">
            <?php echo $page->date('d.m.y', 'uploaded') ?>
          </h3>

          <h3 class="article-header__meta">
            <p>Estimated Read Time: <?php echo $page->text()->readingtime(array(
              'format' => '{minutesCount} {minutesLabel}',
              'format.alt' => '{secondsCount} {secondsLabel}',
              'format.alt.enable' => true
              )); ?>
            </p>
          </h3>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
          <a href="<?php echo $page->parent()->buy()->html() ?>" target="_blank">
            <div class="article-printed">
              <figure>
                <img class="article-printed__cover" style="background-color: <?= $page->parent()->color() ?>" src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </figure>
            </div>
          </a>
        <?php endif; ?>
        <!-- <hr /> -->
      </header>

      <div class="text group">
        <?php if($page->media()->isNotEmpty()): ?>
          <figure>
            <?= $page->media()->embed() ?>
          </figure>
        <?php elseif($page->coverimage()->isNotEmpty()) : ?>
          <figure>
            <img src="<?= $page->coverimage()->toFile()->url() ?>">
            <?php if($page->coverimage()->toFile()->credit()->isNotEmpty()) : ?>
              <figcaption>
                <?php foreach ($page->coverimage()->toFile()->credit()->split() as $name): ?>
                  <a style="color: <?= $page->parent()->color() ?>" href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                      <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
                  </a>
                <?php endforeach; ?>
              </figcaption>
            <?php endif; ?>
          </figure>
        <?php endif; ?>

        <?= $page->text()->kirbytext() ?>

        <div class="article-end">

          <h2 class="article-header__contributor">
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a style="color: <?= $page->parent()->color() ?>" href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
            </a>
          <?php endforeach; ?>
          </h2>

          <?php if ($page->printed()->isNotEmpty()) : ?>
            <p class="article-end__printed">PRINTED: <?= $issue->date('d/m/Y', 'printed') ?></p>
          <?php endif; ?>
          <p class="article-end__uploaded">UPLOADED: <?= $page->date('d/m/Y', 'uploaded') ?></p>
        </div>

        <div class="article-end-share">
          <p>Share:
            <a style="color: <?= $page->parent()->color2() ?>" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->tinyurl()); ?>%20<?php echo ('via @strikeyo')?>" target="blank" title="Tweet this">
              Twitter
            </a>
            <a style="color: <?= $page->parent()->color2() ?>" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
              Facebook
            </a>
            <a style="color: <?= $page->parent()->color2() ?>" href="mailto:?Subject=<?= $page->title() ?>&body=<?php echo rawurlencode ($page->url()); ?>" target="_top">
              Email
            </a>
          </p>
        </div>
      </div>

    </article>

    <ul>
    <?php foreach($relatedPages->not($page)->shuffle()->limit(3) as $related): ?>
      <li><a href='<?php echo $related->url(); ?>'><?php echo $related->title(); ?></a></li>
    <?php endforeach ?>
    </ul>

    <?php snippet('support') ?>

  </main>

  <?php snippet('prevnext', ['flip' => true]) ?>

<?php snippet('footer') ?>
