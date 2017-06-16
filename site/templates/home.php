<?php snippet('header') ?>

  <main class="main" role="main">

    <!-- <header class="">
      <h1><?= $page->title()->html() ?></h1>

      <?php if($pagination->page() == 1):?>
        <div class="intro text">
          <?= $page->text()->kirbytext() ?>
        </div>
      <?php endif ?>
    </header> -->


    <section class="home-featured group">
      <?php $uids = $page->featuredarticle()->split(); ?>
      <?php foreach($uids as $post): ?> <?php $post = $pages->index()->findBy('uid', $post); ?>
        <a href="<?php echo $post->url(); ?>" class="home-featured-text">
          <h2 class="home-featured-title">
            <?php echo $post->title(); ?>
          </h2>

            <?php foreach ($post->contributor()->split() as $name): ?>
                  <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
            <?php endforeach; ?>

        </a>
        <?php if($post->coverimage()->isNotEmpty()): ?>
          <img src="<?php echo $post->coverimage()->toFile()->focusCrop(1000, 450)->url(); ?>" alt="<?php echo $post->title(); ?>"/>
        <?php else: ?>
          <img src="<?php echo $pages->find('home')->images()->sortBy('sort', 'asc')->first()->focusCrop(1000, 450)->url(); ?>" alt="<?php echo $post->title(); ?>"/>
        <?php endif ?>
      <?php endforeach ?>
    </section>

    <h2 class="section-header">RECENT</h2>
    <section class="online-recent group">
      <?php if($articles->count()): ?>
        <?php foreach($articles as $article): ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
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

    <?php if ($page->banner1()->isNotEmpty()) : ?>
      <div class="home-banner group">
        <?php $ci = $page->banner1()->toFile() ?>
        <a href="<?php echo $page->link1()->html() ?>">
          <figure>
            <img src="<?php echo $ci->focusCrop(1000, 450)->url(); ?>" alt="" />
          </figure>
        </a>
      </div>
    <?php endif ?>

    <h2 class="section-header">ARCHIVE</h2>
    <section class="online-archive group">
      <?php if($archives->count()): ?>
        <?php foreach($archives->shuffle() as $article): ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
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

    <section class="home-support">
      <?php snippet('support') ?>
    </section>

  </main>

<?php snippet('footer') ?>
