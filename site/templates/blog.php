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
        <form id="filters" method="post">
            <?php foreach($category as $item): ?>
              <?php if(!$item) continue ?>
              <button class="button" <?php e(isset($data['category']) && $data['category'] == $item, ' selected') ?> value="<?php echo $item ?>" name="category" onclick="this.form.submit()"><?php echo $item->upper()?></button>
            <?php endforeach ?>
        </form>
      </div>
    </section>

    <section class="online-archive group">
      <?php if($cards->count()): ?>
        <?php foreach($cards as $article): ?>
          <?php if(!$article) continue ?>

          <?php $parent = $article->parent() ?>
          <?php $box = 'background-' . uniqid(); $colors[$box] = $parent; ?>

          <?php if($article->coverimage()->isNotEmpty()): ?>

            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>


          <?php else: ?>
            <?php snippet('cardLargeLandscape', array(
            'article' => $article,
            'contributor' => $pages->find('contributors/' . $article->contributor()),
            'issue' => $pages->find('magazine/' . $article->printed()),
            'box' => $box
            )) ?>

          <?php endif ?>

        <?php endforeach ?>

      <?php else: ?>
        <p>Where did all of the articles go?</p>
      <?php endif ?>

    </section>



    <?php snippet('pagination') ?>

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
