<?php snippet('header') ?>

  <main class="main" role="main">

    <header class="contributors-intro">
      <p>Thank you to all <?php echo $page->children()->count() ?> published contributors.</p>

      <div class="contributors-nav">
        <?php foreach($alphabetise as $letter => $items): ?>
          <a class="button" href="#<? echo $letter ?>"><?php echo strtoupper($letter) ?></a>
        <?php endforeach ?>
      </div>
    </header>

<div class="contributors-flex-center">

      <?php foreach($alphabetise as $letter => $items): ?>
        <p class="alphabet-letter" id="<? echo $letter ?>"><?php echo strtoupper($letter) ?></p>

          <div class="contributors">
            <?php foreach($items as $contributor): ?>
              <?php $profile = $contributor->profilepic()->toFile(); ?>
              <article class="contributor" id="<?php echo $contributor->uid() ?>">
                <?php if ($contributor->isVisible()): ?>
                  <a href="<?php echo $contributor->url() ?>">
                <?php endif ?>

                <div class="contributor-wrap">

                  <?php if ($contributor->profilepic()->isNotEmpty()): ?>
                    <figure class="contributor-profilepic">
                      <span><img src="<?= thumb($profile, array('width' => 300, 'crop' => true))->url() ?>" alt="<?php echo $contributor->title()->html() ?>"></span>
                    </figure>
                  <?php else: ?>
                    <div class="contributor-profilepic" style="background-color: <?php $colors = $page->colors()->split(','); $shuffle = a::shuffle($colors); echo $color = a::first($shuffle); ?>"></div>
                  <?php endif; ?>

                  <div class="contributor-info">
                    <div>
                      <h2 class="contributor-name"><?php echo $contributor->title()->html() ?></h2>
                      <ul class="contributor-role">
                        <?php foreach($contributor->role()->split(',') as $role): ?>
                        <li><?php echo $role ?></li>
                        <?php endforeach ?>
                      </ul>
                    </div>
                    <ul class="contributor-links">
                      <li>
                        <?php foreach($contributor->links()->toStructure() as $link): ?>
                          <a href='<?= $link->url()->html() ?>'><i class='fa <?= $link->icon()->html() ?>'></i></a>
                        <?php endforeach; ?>
                      </li>
                    </ul>
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
