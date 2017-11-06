<?php snippet('header') ?>

  <main class="info main text" role="main">

    <section class="info-nav">
      <a href="#goabout" class="button">About</a>
      <a href="#gocontact" class="button">Contact</a>
      <a href="#gocontribute" class="button">Contribute</a>
      <a href="#godistribute" class="button">Distribute</a>
      <a href="#gostockists" class="button">Stockists</a>
    </section>

    <article class="info-text">

      <div class="info-jump" id="goabout"></div>
      <section class="info-section group" id="about">
        <div class="info-section__wrap">
          <h2>About</h2>
          <?= $page->aboutus()->kirbytext() ?>
        </div>
      </section>

      <div class="info-jump" id="gocontact"></div>
      <section class="info-section group" id="contact">
        <div class="info-section__wrap">
          <h2>Contact</h2>
          <?= $page->contact()->kirbytext() ?>
        </div>
      </section>

      <div class="info-jump" id="gocontribute"></div>
      <section class="info-section group" id="contribute">
        <div class="info-section__wrap">
          <h2>Contribute</h2>
          <?= $page->submissions()->kirbytext() ?>
        </div>
      </section>

      <div class="info-jump" id="godistribute"></div>
      <section class="info-section group" id="distribute">
        <div class="info-section__wrap">
          <h2>Distribute</h2>
          <?= $page->distribution()->kirbytext() ?>
        </div>
      </section>

      <div class="info-jump" id="gostockists"></div>
      <section class="info-section group" id="stockists">
        <div class="info-section__wrap">
          <h2>Stockists</h2>
          <ul class="stockists">
            <?php foreach($page->stockists()->toStructure() as $stockist): ?>
                <li class="stockists_stock">
                  <a href="<?= $stockist->link()->url() ?>" target="_blank">
                    <div>
                      <p class="stockists_stockist"><?= $stockist->stockist() ?></p>
                      <p class="stockists_location"><?= $stockist->location() ?></p>
                    </div>
                  </a>
                </li>
            <?php endforeach ?>
          </ul>
        </div>
      </section>

    </article>

  </main>

<?php snippet('footer') ?>
