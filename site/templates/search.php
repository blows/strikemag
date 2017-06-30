<?php snippet('header') ?>

  <main class="main" role="main">

    <?php $colors = []; ?>

    <section class="online-nav">
      <div class="online-nav__search">
        <form class="search" method="post" action="<?= page('online/search')->url() ?>">
        <input type="search" name="q" placeholder="Search" value="<?php echo (!empty($query)) ? esc($query) : '' ?>">
        <!-- <input type="submit" value="Search"> -->
        </form>
      </div>

      <div class="online-nav__filter">
        <a href="<?php echo page('online')->url() ?>" class="button">BACK</a>
      </div>
    </section>



    <section class="online-archive group">
      <?php if($results->count()) : ?>
        <?php foreach($results as $result): ?>
          <?php $parent = $result->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php snippet('cardLargeLandscape', array(
          'article' => $result,
          'contributor' => $pages->find('contributors/' . $result->contributor()),
          'issue' => $pages->find('magazine/' . $result->printed()),
          'box' => $box
          )) ?>
        <?php endforeach ?>
      <?php else : ?>
        <p>No results found.</p>
      <?php endif ?>

    </section>

    <style>
      <?php foreach($colors as $box => $parent): ?>
        .<?= $box ?> {
          border-color: <?= $parent->color() ?>;
        }

        .<?= $box ?>:hover, .<?= $box ?>:focus {
          background: <?= $parent->color() ?> !important;
        }
      <?php endforeach ?>
    </style>

  </main>

<?php snippet('footer') ?>
