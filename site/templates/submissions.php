<?php snippet('header') ?>

<?php snippet('aboutmenu') ?>

  <main class="main center" role="main">

    <article class="article center">
      <section class="about-text text center">
        <h1>Submissions</h1>
        <p><?= $page->submissions()->kirbytext() ?></p>
      </section>

      <section class="about-text text center">
        <h2>Writing</h2>
        <p><?= $page->writing()->kirbytext() ?></p>
      </section>

      <section class="about-text text center">
        <h2>Art</h2>
        <p><?= $page->art()->kirbytext() ?></p>
      </section>

      <section class="about-text text center">
        <h2>Video</h2>
        <p><?= $page->videox()->kirbytext() ?></p>
      </section>
    </article>

  </main>

<?php snippet('footer') ?>
