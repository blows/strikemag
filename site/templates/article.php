<?php snippet('header') ?>

  <main style="background-image: linear-gradient(lightgrey, <?= $page->parent()->color() ?> 15%, <?= $page->parent()->color() ?> 50%, <?= $page->parent()->color2() ?>);" class="main" role="main">

    <article class="article group">

      <header class="article-info">
          <h3 class="article-header__issue" style="color: <?= $page->parent()->color() ?>">
            (<?= $page->category()->upper()->html() ?>) <?php if ($page->printed()->isNotEmpty()) : ?><?php echo $issue->title()->upper() ?><?php endif; ?>
          </h3>
        <div class="article-header">
          <h1 class="article-header__title" style="color: <?= $page->parent()->color() ?>"><?= $page->title()->upper()->html() ?></h1>

          <h2 class="article-header__contributor">
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a style="color: <?= $page->parent()->color() ?>" href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
            </a>
          <?php endforeach; ?>
          </h2>

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

      <div class="article-share">
        <p>Estimated Read Time: <?php echo $page->text()->readingtime(array(
          'format' => '{minutesCount} {minutesLabel}',
          'format.alt' => '{secondsCount} {secondsLabel}',
          'format.alt.enable' => true
          )); ?>
        </p>
        <p>Share:
          <a href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->tinyurl()); ?>%20<?php echo ('via @strikeyo')?>" target="blank" title="Tweet this">
            Twitter
          </a>
          <a href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
            Facebook
          </a>
          <a href="mailto:?Subject=<?= $page->title() ?>&body=<?php echo rawurlencode ($page->url()); ?>" target="_top">
            Email
          </a>
        </p>
      </div>

      <div class="text group">
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
