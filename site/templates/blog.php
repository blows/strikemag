<?php snippet('header') ?>

  <main class="main" role="main">

    <section class="online-nav">
      <form class="online-nav__search" method="post" action="<?= page('online/search')->url() ?>">
        <input id="search-input"type="search" name="q" placeholder="Search" value="<?php echo (!empty($query)) ? esc($query) : '' ?>">
        <input id="search-submit" type="submit" value="Search">
      </form>

      <!-- <div class="online-nav__filter">
        <form id="filters" method="post">
            <?php foreach($category as $item): ?>
              <?php if(!$item) continue ?><button class="button" <?php e(isset($data['category']) && $data['category'] == $item, ' selected') ?> value="<?php echo $item ?>" name="category" onclick="this.form.submit()"><?= ucfirst($item) ?></button>
            <?php endforeach ?>
        </form>
      </div> -->
    </section>

    <section class="online-archive">
      <?php if($cards->count()): ?>
        <?php foreach($cards as $article): ?>
          <?php if(!$article) continue ?>

          <?php $parent = $article->parent() ?>
          <?php $ci = $article->coverimage()->toFile() ?>

          <?php if($ci->orientation() == 'portrait'): ?>
            <?php snippet('cardLargePortrait', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>

          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed())
            )) ?>
          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>

    </section>

  </main>

<?php snippet('footer') ?>
