<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="about main text" role="main">

    <article class="about-text">
      <section class="about-section">
        <h1>About Us</h1>
        <p><?= $page->aboutus()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>Contact</h2>
        <p><?= $page->contact()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>Newsletter</h2>
        <p><?= $page->newsletter()->kirbytext() ?></p>
      </section>
    </article>

    <?php snippet('newsletter') ?>

  </main>

<?php snippet('footer') ?>
