<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="contributors-intro">
      <h1><?= $page->title() ?></h1>
      <p>Join our <?php echo $page->children()->count() ?> published writers and artists, send us a pitch!</p>

      <div class="contributors-nav">
        <?php foreach($alphabetise as $letter => $items): ?>
          <a href="#<? echo $letter ?>"><?php echo strtoupper($letter) ?></a>
        <?php endforeach ?>
      </div>
    </header>

<div class="contributors-flex-center">

      <?php foreach($alphabetise as $letter => $items): ?>
        <h4 class="alphabet-letter" id="<? echo $letter ?>"><?php echo strtoupper($letter) ?></h4>

          <div class="contributors">
            <?php foreach($items as $contributor): ?>
              <article class="contributor" id="<?php echo $contributor->uid() ?>">
                <?php if ($contributor->isVisible()): ?>
                  <a href="<?php echo $contributor->url() ?>">
                <?php endif ?>

                <div class="contributor-wrap">

                  <?php if ($contributor->profilepic()->isNotEmpty()): ?>
                    <figure class="contributor-profilepic">
                      <span><img src="<?php echo $contributor->profilepic()->toFile()->focusCrop(150, 150)->url() ?>" alt="<?php echo $contributor->title()->html() ?>"></span>
                    </figure>
                  <?php else: ?>
                    <div class="contributor-profilepic" style="background-color: <?php $colors = $page->colors()->split(','); $shuffle = a::shuffle($colors); echo $color = a::first($shuffle); ?>"></div>
                  <?php endif; ?>

                  <div class="contributor-info"><span>
                    <h1 class="contributor-name"><?php echo $contributor->title()->upper()->html() ?></h1>
                    <ul class="contributor-role">
                      <?php foreach($contributor->role()->split(',') as $role): ?>
                      <li><?php echo $role ?></li>
                      <?php endforeach ?>
                    </ul></span>
                  </div>

                </div>

                <?php if ($contributor->isVisible()): ?>
                  </a>
                <?php endif ?>
              </article>
           	<?php endforeach ?>
</div>
      <?php endforeach ?>

  </div>

  </main>

<?php snippet('footer') ?>
