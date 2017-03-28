<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="contributors-intro">
      <h1>Join our <?php echo $page->children()->count() ?> published writers and artists, send us a pitch!</h1>
    </header>

<div class="contributors-flex-center">
    <div class="contributors">

      <?php $alphabetise = alphabetise($page->children()->sortby('title'), array('key' => 'title')); ?>

      <?php foreach($alphabetise as $letter => $items): ?>
        <h4 class="alphabet-letter"><?php echo strtoupper($letter) ?></h4>

            <?php foreach($items as $contributor): ?>
              <article class="contributor" id="<?php echo $contributor->uid() ?>">
                <?php if ($contributor->isVisible()): ?>
                  <a href="<?php echo $contributor->url() ?>">
                <?php endif ?>

                <div class="contributor-wrap">

                  <?php if ($contributor->profilepic()->isNotEmpty()): ?>
                    <figure class="contributor-profilepic">
                      <img src="<?php echo $contributor->profilepic()->toFile()->focusCrop(150, 150)->url() ?>" alt="<?php echo $contributor->title()->html() ?>">
                    </figure>
                  <?php else: ?>
                    <div class="contributor-profilepic" style="background-color: <?php $colors = $page->colors()->split(','); $shuffle = a::shuffle($colors); echo $color = a::first($shuffle); ?>"></div>
                  <?php endif; ?>

                  <div class="contributor-info">
                    <h1 class="contributor-name"><?php echo $contributor->title()->upper()->html() ?></h1>
                    <ul class="contributor-role">
                      <?php foreach($contributor->role()->split(',') as $role): ?>
                      <li><?php echo $role ?></li>
                      <?php endforeach ?>
                    </ul>
                  </div>

                </div>

                <?php if ($contributor->isVisible()): ?>
                  </a>
                <?php endif ?>
              </article>
           	<?php endforeach ?>

      <?php endforeach ?>

    </div>
  </div>

  </main>

<?php snippet('footer') ?>
