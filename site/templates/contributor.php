<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>
      <div class="intro text">
        <?= $page->intro()->kirbytext() ?>
      </div>
      <hr />
    </header>

    <div class="text wrap">
      <?= $page->text()->kirbytext() ?>
    </div>


    <article class="contributor">

      <h1><?php echo $page->title()->html() ?></h1>

      <figure>
        <img src="<?php echo $page->profilepic()->url() ?>">
      </figure>

      <ul class="articles">
        <?php foreach($articles->filterBy('contributor', $page->uid()) as $article): ?>
        <li><a href="<?php echo $article->url() ?>">TXT: <?php echo $article->title() ?></a></li>
        <?php endforeach ?>
        <?php foreach($articles->filterBy('artwork', $page->uid()) as $article): ?>
        <li><a href="<?php echo $article->url() ?>">IMG: <?php echo $article->title() ?></a></li>
        <?php endforeach ?>
      </ul>

    </article>


  </main>

<?php snippet('footer') ?>
