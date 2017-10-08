<?php snippet('header') ?>

  <main style="background-color: <?= $page->parent()->color() ?>" class="main" role="main">

    <?php $colors = []; ?>

    <article class="article">

      <header class="article-info">
        <div class="article-header">
          <h1 class="article-header__title"><?= $page->title()->widont() ?></h1>
          <?php if ($page->subtitle()->isNotEmpty()) : ?>
            <h2 class="article-header__subtitle"><?= $page->subtitle()->widont() ?></h2>
          <?php endif ?>

          <div class="article-header__contributor">
            <?php foreach ($page->contributor()->split() as $name): ?>
              <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                  <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
              </a>
            <?php endforeach; ?>
          </div>

          <div class="article-header__meta">
            <span>
              <?php if ($page->parent()->printed()->isNotEmpty()) : ?>
                <a href="<?php echo $page->parent()->url() ?>">
                  <?php echo $issue->title()->upper() ?></a>
              <?php endif; ?>(<?= $page->category()->upper()->html() ?>)
            </span>

            <span>
              <?php echo $page->date('d.m.y', 'uploaded') ?>
            </span>

            <span>
              Estimated Read Time: <?php echo $page->text()->readingtime(array(
                'format' => '{minutesCount} {minutesLabel}',
                'format.alt' => '{secondsCount} {secondsLabel}',
                'format.alt.enable' => true
                )); ?>
            </span>
          </div>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
          <a href="<?php echo $page->parent()->url() ?>">
            <div class="article-printed">
              <?php $ci = $issue->coverimage()->toFile() ?>
              <figure>
                <img class="article-printed__cover" src="<?php echo thumb($ci, array('width' => 300, 'quality' => 100), false) ?>" alt="STRIKE! <?= $issue->title()->html() ?>" sizes="100vw"
                srcset="<?php echo thumb($ci, array('width' => 256, 'quality' => 70), false) ?> 899w,
                 <?php echo thumb($ci, array('width' => 320, 'quality' => 70), false) ?> 1200w" />
              </figure>
            </div>
          </a>
        <?php endif; ?>
        <!-- <hr /> -->
      </header>

      <div class="text">
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

        <div class="article-credit__contributor">
          TEXT:
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
            </a>
          <?php endforeach; ?>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
            <a href="<?php echo $page->parent()->buy()->html() ?>" target="_blank">
              <div class="article-end__buy">
                <div class="article-end__buy-cover">
                  <figure id="end-cover">
                    <img class="article-printed__cover" src="<?php echo thumb($ci, array('width' => 300, 'quality' => 100), false) ?>" alt="STRIKE! <?= $issue->title()->html() ?>" sizes="100vw"
                    srcset="<?php echo thumb($ci, array('width' => 256, 'quality' => 70), false) ?> 899w,
                     <?php echo thumb($ci, array('width' => 320, 'quality' => 70), false) ?> 1200w" />
                  </figure>
                </div>
                <div class="article-end__info">
                  <p>Originally published in <?= $issue->title()->html() ?><?php if ($issue->name()->isNotEmpty()) :?>: <?= $issue->name()->html() ?><?php endif ?>, <?= $issue->date('F Y', 'printed') ?>.
                    <br><br>
                    Available from our shop.
                  </p>
                </div>
              </div>
            </a>
        <?php endif; ?>

        </div>
      </div>

    </article>

    <div class="article-end">
      <p class="article-end__chat">IF YOU LIKED THIS, PLEASE</p>
      <p class="article-end__share">SHARE
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
      <p class="article-end__support"><a href="" class="button article-end__button">SUBSCRIBE</a></p>
    </div>

    <?php if($relatedPages->count() > 1): ?>
    <section class="article-related">
      <h2 class="article-related__header">RELATED</h2>
      <ul>
      <?php foreach($relatedPages->not($page)->shuffle()->limit(3) as $related): ?>

        <?php $parent = $related->parent() ?>
        <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

        <?php snippet('cardPortrait', array(
        'article' => $related,
        'contributor' => $pages->find('contributors/' . $related->contributor()),
        'issue' => $pages->find('magazine/' . $related->printed()),
        'box' => $box
        )) ?>
      <?php endforeach ?>
      </ul>
    </section>
  <?php endif ?>

  </main>

  <style>
    <?php foreach($colors as $box => $parent): ?>
      .<?= $box ?> {
        border-color: <?= $parent->color() ?>;
      }

      .<?= $box ?>:hover, .<?= $box ?>:focus {
        background: <?= $parent->color() ?> !important;
      }
    <?php endforeach ?>
  </style>


  <!-- <?php snippet('prevnext', ['flip' => true]) ?> -->

<?php snippet('footer') ?>
