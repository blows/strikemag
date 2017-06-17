<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="about main text" role="main">

    <article class="about-text">
      <section class="about-section">
        <h1>ABOUT US</h1>
        <p><?= $page->aboutus()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>CONTACT</h2>
        <p><?= $page->contact()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>CONTRIBUTE</h2>
        <p><?= $page->submissions()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>DISTRIBUTE</h2>
        <p><?= $page->distribution()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>STOCKISTS</h2>
        <ul class="stockists">
          <?php foreach($page->stockists()->toStructure() as $stockist): ?>
            <a href="<?= $stockist->link()->url() ?>" target="_blank">
              <li class="stockists_stock">
                <div>
                  <p class="stockists_stockist"><?= $stockist->stockist()->html() ?></p>
                  <p class="stockists_country"><?= $stockist->location()->html() ?></p>
                </div>
              </li>
            </a>
          <?php endforeach ?>
        </ul>
      </section>
    </article>

  </main>

<?php snippet('footer') ?>
