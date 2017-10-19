<?php snippet('header') ?>

  <main class="main" role="main">

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

    <section class="online-archive">
      <?php if($results->count()) : ?>
        <?php foreach($results as $result): ?>
          <?php $parent = $result->parent() ?>

          <?php $ci = $result->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $result,
            'contributor' => $pages->find('contributors/' . $result->contributor()),
            'issue' => $pages->find('magazine/' . $result->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $result,
            'contributor' => $pages->find('contributors/' . $result->contributor()),
            'issue' => $pages->find('magazine/' . $result->printed())
            )) ?>
          <?php endif ?>
        <?php endforeach ?>
      <?php else : ?>

        <p>No results found.</p>
        
      <?php endif ?>

    </section>

  </main>

<?php snippet('footer') ?>
