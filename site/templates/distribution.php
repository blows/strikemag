<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="about main text" role="main">

    <article class="about-text">

      <section class="about-section">
        <h1><?= $page->title()->html() ?></h1>
        <p><?= $page->distribution()->kirbytext() ?></p>
      </section>

      <section class="about-stockists">

        <h2>Stockists</h2>

        <ul class="stockists">
          <?php foreach($page->stockists()->toStructure() as $stockist): ?>
            <a href="<?= $stockist->link()->url() ?>" target="_blank">
              <li class="stockists_stock">
                <div><p class="stockists_country"><?= $stockist->country()->html() ?></p>
                <p class="stockists_city"><?= $stockist->city()->html() ?></p>
                <p class="stockists_stockist"><?= $stockist->stockist()->html() ?></p></div>
              </li>
            </a>
          <?php endforeach ?>
        </ul>

      </section>
    </article>

  </main>

<?php snippet('footer') ?>
