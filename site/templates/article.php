<?php snippet('header') ?>

  <main class="main" role="main">

    <article class="article">

      <header class="article-info">


        <div class="article-header">
          <h1 class="article-header__title"><?= $page->title()->widont() ?><?php if ($page->subtitle()->isNotEmpty()) : ?>:<?php endif ?></h1>
          <?php if ($page->subtitle()->isNotEmpty()) : ?>
            <h2 class="article-header__subtitle"><?= $page->subtitle()->widont() ?></h2>
          <?php endif ?>

          <div class="article-header__contributor">
            by <?php foreach ($page->contributor()->split() as $name): ?>
                <span><?php echo $pages->find('contributors/' . $name)->title()->html() ?></span>
            <?php endforeach; ?>
          </div>

          <div class="article-header__meta">
            <span>
              <?php if ($page->parent()->printed()->isNotEmpty()) : ?>
                Printed: <a href="<?php echo $page->parent()->url() ?>"><?php echo $issue->title() ?><?php if ($issue->name()->isNotEmpty()): ?> <?= $issue->name() ?><?php endif ?></a>
              <?php else : ?>
                Uploaded: <?= $page->date('d F Y', 'uploaded') ?>
              <?php endif ?>
            </span>

            <span>
              <?= $page->parent()->date('F Y', 'printed') ?>
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

        <div class="article-image">
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
                        <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
                    </a>
                  <?php endforeach; ?>
                </figcaption>
              <?php endif; ?>
            </figure>
          <?php endif; ?>
        </div>
      </header>

      <div class="text">

        <?= $page->text()->kirbytext() ?>

        <div class="article-credit">

        <div class="article-credit__contributor">
          By
          <?php foreach ($page->contributor()->split() as $name): ?>
            <a href="<?php echo $pages->find('contributors')->url() . "#" . $name ?>"><?php echo $pages->find('contributors/' . $name)->title()->html() ?></a>
          <?php endforeach; ?>
        </div>

        <?php if ($page->printed()->isNotEmpty()) : ?>
          <div class="article-end__buy">
            <figure class="article-end__buy-cover" id="end-cover">
              <a href="<?php echo $page->parent()->buy()->html() ?>" target="_blank">
                <img alt="STRIKE! <?= $issue->title()->html() ?>"
                sizes="(max-width: 450px) 57vw, 26vw"
                src="<?php echo thumb($cover, array('width' => 500, 'quality' => 100), false) ?>"
                srcset="<?php echo thumb($cover, array('width' => 196.3, 'quality' => 70), false) ?> 196.3w,
                  <?php echo thumb($cover, array('width' => 254.6, 'quality' => 70), false) ?> 254.6w,
                  <?php echo thumb($cover, array('width' => 306.7, 'quality' => 70), false) ?> 306.7w,
                  <?php echo thumb($cover, array('width' => 368.08, 'quality' => 70), false) ?> 368.08w" />
              </a>
              <figcaption class="article-end__info">
                Printed in <?= $issue->title()->html() ?><?php if ($issue->name()->isNotEmpty()) :?> <?= $issue->name()->widont() ?><?php endif ?>
                  <br /><br />
                  <a href="<?php echo $page->parent()->buy()->html() ?>" target="_blank">Get it here</a>
              </figcaption>
            </figure>
          </div>
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
          <?php $ci = $related->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $related,
            'contributor' => $pages->find('contributors/' . $related->contributor()),
            'issue' => $pages->find('magazine/' . $related->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $related,
            'contributor' => $pages->find('contributors/' . $related->contributor()),
            'issue' => $pages->find('magazine/' . $related->printed())
            )) ?>
          <?php endif ?>
        <?php endforeach ?>
        </ul>
      </section>
    <?php else : ?>
      <section class="article-related">
        <h2 class="article-related__header">MORE</h2>
        <ul>
        <?php foreach($online->not($page)->shuffle()->limit(3) as $more): ?>

          <?php $parent = $more->parent() ?>
          <?php $ci = $related->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $related,
            'contributor' => $pages->find('contributors/' . $related->contributor()),
            'issue' => $pages->find('magazine/' . $related->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $related,
            'contributor' => $pages->find('contributors/' . $related->contributor()),
            'issue' => $pages->find('magazine/' . $related->printed())
            )) ?>
          <?php endif ?>
        <?php endforeach ?>
        </ul>
      </section>
    <?php endif ?>

  </main>

  <!-- <?php snippet('prevnext', ['flip' => true]) ?> -->

<?php snippet('footer') ?>
