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

    <?php foreach($page->children() as $contributor): ?>
    <article class="contributor">

      <h1><a href="<?php echo $contributor->url() ?>"><?php echo $contributor->title()->html() ?><a/></h1>

      <figure>
        <img src="<?php echo $contributor->profilepic()->url() ?>">
      </figure>

    </article>
    <?php endforeach ?>

  </main>

<?php snippet('footer') ?>
