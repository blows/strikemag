<?php snippet('header') ?>

  <main class="main home" role="main">

    <?php $chunks = $articles->limit(12)->chunk(6);
          $chunk1 = $chunks->nth(0);
          $chunk2 = $chunks->nth(1);
    ?>

    <!-- Landing -->
    <div class="home-land" style="background: rgba(0, 0, 0, 0) url(<?= $latestText; ?>) repeat scroll center top / 250px auto">
      <a href="<?= $latestIssue->url() ?>">
        <div class="home-issue" style="background: url(<?= $latestCover; ?>) top/100%;"></div>
      </a>
    </div>

    <!-- Chat -->
    <div class="text-bar">
      <p>STRIKE! is a collective working co-operatively against structural oppression and towards decolonised, intersectional, post-capitalist futures.</p>
      <p>Read about our <a href="<?= $latestIssue->url() ?>">latest publication</a>, and explore all <a href="<?= page('online')->url() ?>">online content</a>.</p>
    </div>

    <!-- Featured Banner 1 -->
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

      <p class="online-recent__head">
        <a href="<?= page('online')->url() ?>">View all online content</a>
      </p>
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

      <p class="online-recent__head">
        <a href="<?= page('online')->url() ?>">View all online content</a>
      </p>
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

<?php snippet('footer') ?>
