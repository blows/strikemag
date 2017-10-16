<?php snippet('header') ?>

  <main class="main home" role="main">

    <?php $colors = []; ?>

    <?php $chunks = $articles->limit(12)->chunk(6);
          $chunk1 = $chunks->nth(0);
          $chunk2 = $chunks->nth(1);
    ?>

    <!-- Landing -->
    <div class="home-land" style="background: rgba(0, 0, 0, 0) url(<?= $latestText; ?>) repeat scroll center top / 150px auto">
      <div class="home-issue" style="background: url(<?= $latestCover; ?>) top/100%;">

      </div>
    </div>

    <!-- Featured Banner 1 -->
    <?php $back = 'back-' . uniqid(); $colors[$back] = $post->parent()->color(); ?>

    <a href="<?php echo $post->url(); ?>">
      <section class="home-featured" style="background-image: url(<?= $featuredimage; ?>)">
      <div class="home-featured-text">
        <h2 class="home-featured-title">
          <?php echo $post->title()->widont(); ?>
        </h2>
        <?php foreach ($post->contributor()->split() as $name): ?>
              <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->html() ?></h3>
        <?php endforeach; ?>
      </div>
      </section>
    </a>


    <!-- Pieces 1 -->
    <section class="online-recent">
      <?php if($articles->count()): ?>
        <?php foreach($chunk1 as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>
          <?php $ci = $article->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>
          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <!-- Featured Banner 2 -->
    <a href="<?php echo $post->url(); ?>">
      <section class="home-featured" style="background-image: url(<?= $featuredimage2; ?>)">
      <div class="home-featured-text">
        <h2 class="home-featured-title">
          <?php echo $post2->title()->widont(); ?>
        </h2>
        <?php foreach ($post2->contributor()->split() as $name): ?>
              <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->html() ?></h3>
        <?php endforeach; ?>
      </div>
      </section>
    </a>

    <!-- Pieces 2 -->
    <section class="online-recent">
      <?php if($articles->count()): ?>
        <?php foreach($chunk2 as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>
          <?php $ci = $article->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>
          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <!-- Support -->
    <section class="home-support">
      <?php snippet('support') ?>
    </section>

    <!-- Explore Issues -->
    <section class="home-issues">
      <?php snippet('issues') ?>
    </section>

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

<?php snippet('footer') ?>
