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
        <a href="<?php echo $post->url(); ?>">
          <h2 class="home-featured-title">
            <?php echo $post->title(); ?>
          </h2>
        </a>
        <img src="<?php echo $post->coverimage()->toFile()->focusCrop(1000, 450)->url(); ?>" alt="<?php echo $post->title(); ?>"/>
      <?php endforeach ?>
    </section>

    <h2 class="section-header">RECENT</h2>
    <section class="online-recent group">
      <?php if($articles->count()): ?>
        <?php foreach($articles as $article): ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

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

    <?php snippet('pagination') ?>

  </main>

<?php snippet('footer') ?>
