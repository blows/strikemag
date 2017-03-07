<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="" role="main">

    <header class="about-text">
      <h1>Submissions</h1>
      <p><?= $page->submissions()->kirbytext() ?></p>
    </header>

    <section class="about-text">
      <h2>Writing</h2>
      <p><?= $page->writing()->kirbytext() ?></p>
    </section>

    <section class="about-text">
      <h2>Art</h2>
      <p><?= $page->art()->kirbytext() ?></p>
    </section>

    <section class="about-text">
      <h2>Video</h2>
      <p><?= $page->videox()->kirbytext() ?></p>
    </section>

  </main>

<?php snippet('footer') ?>
