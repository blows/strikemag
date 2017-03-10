<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="about main text" role="main">

    <article class="about-text">
      <section class="about-section">
        <h1>Submissions</h1>
        <p><?= $page->submissions()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>Writing</h2>
        <p><?= $page->writing()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>Art</h2>
        <p><?= $page->art()->kirbytext() ?></p>
      </section>

      <section class="about-section">
        <h2>Video</h2>
        <p><?= $page->videox()->kirbytext() ?></p>
      </section>
    </article>

  </main>

<?php snippet('footer') ?>
