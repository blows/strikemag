<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="contributors">

      <header class="">
        <h1>Join our <?php echo $page->children()->count() ?> published writers and artists, send us a pitch!</h1>
      </header>

      <div class="">
        <?= $page->text()->kirbytext() ?>
      </div>

      <?php foreach($page->children() as $contributor): ?>
      <article class="contributor" id="<?php echo $contributor->uid() ?>">

        <figure class="contributor-profilepic">
          <img src="<?php echo $contributor->profilepic() ?>" alt="<?php echo $contributor->title()->html() ?>">
        </figure>

        <h1 class="contributor-name"><a href="<?php echo $contributor->url() ?>"><?php echo $contributor->title()->html() ?><a/></h1>

        <p class="contributor-bio"><?php echo $contributor->bio()->html() ?></p>

      </article>
      </a>
      <?php endforeach ?>

    </div>

  </main>

<?php snippet('footer') ?>
