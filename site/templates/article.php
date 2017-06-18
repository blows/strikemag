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
                  <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                      IMAGE: <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
                  </a>
                <?php endforeach; ?>
              </figcaption>
            <?php endif; ?>
          </figure>
        <?php endif; ?>

        <?= $page->text()->kirbytext() ?>

        <div class="article-credit">

          <h2 class="article-credit__contributor">
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
            </a>
          <?php endforeach; ?>
          </h2>

          <div class="article-end">
            <p class="article-end__chat">IF YOU LIKED THIS, PLEASE</p>
            <p class="article-end__support"><a href="" class="button article-end__button">SUBSCRIBE</a>
            <a href="" class="button article-end__button">DONATE</a></p>
            <p class="article-end__share">SHARE<br>
              <a href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->tinyurl()); ?>%20<?php echo ('via @strikeyo')?>" target="blank" title="Tweet this">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="mailto:?Subject=<?= $page->title() ?>&body=<?php echo rawurlencode ($page->url()); ?>" target="_top">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </a>
            </p>
          </div>

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
