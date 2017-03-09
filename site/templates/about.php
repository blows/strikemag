<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="main center" role="main">

    <article class="article center">
      <section class="about-text text center">
        <h1>About Us</h1>
        <p><?= $page->aboutus()->kirbytext() ?></p>
      </section>

      <section class="about-text text center">
        <h2>Contact</h2>
        <p><?= $page->contact()->kirbytext() ?></p>
      </section>

      <section class="about-text text center">
        <h2>Newsletter</h2>
        <p><?= $page->newsletter()->kirbytext() ?></p>
      </section>
    </article>

    <?php snippet('newsletter') ?>

  </main>

<?php snippet('footer') ?>
