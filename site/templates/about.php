<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="" role="main">

    <header class="about-text">
      <h1>About Us</h1>
      <p><?= $page->aboutus()->kirbytext() ?></p>
    </header>

    <section class="about-text">
      <h2>Contact</h2>
      <p><?= $page->contact()->kirbytext() ?></p>
    </section>

    <section class="about-text">
      <h2>Newsletter</h2>
      <p><?= $page->newsletter()->kirbytext() ?></p>
    </section>

    <?php snippet('newsletter') ?>

  </main>

<?php snippet('footer') ?>
