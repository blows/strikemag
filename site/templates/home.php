<?php snippet('header') ?>

  <main class="main" role="main">

    <?php $colors = []; ?>

    <?php $chunks = $articles->limit(12)->chunk(3);
          $chunk1 = $chunks->nth(0);
          $chunk2 = $chunks->nth(1);
          $chunk3 = $chunks->nth(2);
          $chunk4 = $chunks->nth(3);
    ?>

    <!-- Featured Banner 1 -->
    <?php $back = 'back-' . uniqid(); $colors[$back] = $post->parent()->color(); ?>

    <a href="<?php echo $post->url(); ?>">
      <section class="home-featured" style="background-image: url(<?= $featuredimage; ?>)">
      <div class="home-featured-text">
        <h2 class="home-featured-title">
          <?php echo $post->title()->upper()->widont(); ?>
        </h2>
        <?php foreach ($post->contributor()->split() as $name): ?>
              <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
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

          <?php snippet('cardPortrait', array(
          'article' => $article,
          'contributor' => $pages->find('contributors/' . $article->contributor()),
          'issue' => $pages->find('magazine/' . $article->printed()),
          'box' => $box
          )) ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <section class="home-support">
      <?php snippet('support') ?>
    </section>

    <!-- Pieces 2 -->
    <section class="online-recent">
      <?php if($articles->count()): ?>
        <?php foreach($chunk2 as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php snippet('cardPortrait', array(
          'article' => $article,
          'contributor' => $pages->find('contributors/' . $article->contributor()),
          'issue' => $pages->find('magazine/' . $article->printed()),
          'box' => $box
          )) ?>

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
          <?php echo $post2->title()->upper()->widont(); ?>
        </h2>
        <?php foreach ($post2->contributor()->split() as $name): ?>
              <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
        <?php endforeach; ?>
      </div>
      </section>
    </a>

    <!-- Pieces 3 -->
    <section class="online-recent">
      <?php if($articles->count()): ?>
        <?php foreach($chunk3 as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php snippet('cardPortrait', array(
          'article' => $article,
          'contributor' => $pages->find('contributors/' . $article->contributor()),
          'issue' => $pages->find('magazine/' . $article->printed()),
          'box' => $box
          )) ?>

        <?php endforeach ?>

        <?php foreach($chunk4 as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php snippet('cardPortrait', array(
          'article' => $article,
          'contributor' => $pages->find('contributors/' . $article->contributor()),
          'issue' => $pages->find('magazine/' . $article->printed()),
          'box' => $box
          )) ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <!-- Banner Image -->
    <?php if ($page->banner1()->isNotEmpty()) : ?>
      <div class="home-banner">
        <?php $ci = $page->banner1()->toFile() ?>
        <a href="<?php echo $page->link1()->html() ?>">
          <figure>
            <img src="<?php echo $ci->focusCrop(1000, 450)->url(); ?>" alt="" />
          </figure>
        </a>
      </div>
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

<?php snippet('footer') ?>
