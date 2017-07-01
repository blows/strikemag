<?php snippet('header') ?>

  <main class="main" role="main">

    <?php $colors = []; ?>

    <!-- <header class="">
      <h1><?= $page->title()->html() ?></h1>

      <?php if($pagination->page() == 1):?>
        <div class="intro text">
          <?= $page->text()->kirbytext() ?>
        </div>
      <?php endif ?>
    </header> -->

    <?php $uid = $page->featuredarticle(); ?>
    <?php $post = $pages->index()->findBy('uid', $uid); ?>
    <section class="home-featured" style="background-image: url(<?= $post->coverimage()->toFile()->url(); ?>)">

        <?php $back = 'back-' . uniqid(); $colors[$back] = $post->parent()->color(); ?>

        <a href="<?php echo $post->url(); ?>" class="home-featured-text <?= $back ?>">
          <h2 class="home-featured-title">
            <?php echo $post->title()->upper()->widont(); ?>
          </h2>

          <?php foreach ($post->contributor()->split() as $name): ?>
                <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
          <?php endforeach; ?>

        </a>

    </section>

    <!-- <h2 class="section-header">RECENT</h2> -->
    <section class="online-recent">
      <?php if($articles->count()): ?>
        <?php foreach($articles->limit(2) as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>


          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <section class="home-support">
      <?php snippet('support') ?>
    </section>

    <!-- <h2 class="section-header">ARCHIVE</h2> -->
    <section class="online-archive">
      <?php if($articles->count()): ?>
        <?php foreach($articles->limit(3) as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

    <?php $uid = $page->featuredarticle2(); ?>
    <?php $post = $pages->index()->findBy('uid', $uid); ?>
    <section class="home-featured" style="background-image: url(<?= $post->coverimage()->toFile()->url(); ?>)">

        <?php $back = 'back-' . uniqid(); $colors[$back] = $post->parent()->color(); ?>

        <a href="<?php echo $post->url(); ?>" class="home-featured-text <?= $back ?>">
          <h2 class="home-featured-title">
            <?php echo $post->title()->upper()->widont(); ?>
          </h2>

          <?php foreach ($post->contributor()->split() as $name): ?>
                <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
          <?php endforeach; ?>

        </a>

    </section>

    <!-- <h2 class="section-header">ARCHIVE</h2> -->
    <section class="online-recent">
      <?php if($archives->count()): ?>
        <?php foreach($archives->shuffle()->limit(5) as $article): ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>
    </section>

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
