<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="" role="main">

    <div class="">

      <header>
        <h1><?= $page->title()->html() ?></h1>
        <p><?= $page->distribution()->kirbytext() ?></p>
      </header>

    </div>


    <section class="">

      <h2>Stockists</h2>

      <ul class="stockists">
        <?php foreach($page->stockists()->toStructure() as $stockist): ?>
          <li class="stockists_stockist">

            <a href="<?= $stockist->link()->url() ?>">
              <p class="stockists_country"><?= $stockist->country()->html() ?></p>
              <p class="stockists_city"><?= $stockist->city()->html() ?></p>
              <p class="stockists_stockist"><?= $stockist->stockist()->html() ?></p>
            </a>

          </li>
        <?php endforeach ?>
      </ul>

    </section>

  </main>

<?php snippet('footer') ?>
