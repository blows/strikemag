<article class="card-large-portrait">
<a href="<?= $article->url() ?>" class="">

  <?php if ($article->coverimage()->isNotEmpty()) : ?>
    <div class="card-large-portrait-image">
      <?php $ci = $article->coverimage()->toFile() ?>
      <figure>
        <img src="<?php echo $ci->focusCrop(448, 672)->url(); ?>" alt="" />
      </figure>
    </div>
  <?php endif; ?>

  <div class="card-large-portrait-info">
      <div class="card-large-portrait-info__group">
        <p class="card-large-portrait-info__title">
          <?= $article->title()->html() ?>
        </p>
        <?php foreach ($article->contributor()->split() as $name): ?>
          <p class="card-large-portrait-info__contributor">
            <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
          </p>
        <?php endforeach; ?>
      </div>
      <p class="card-large-portrait-info__issue">
        <?php if ($article->parent()->printed()->isNotEmpty()) : ?><?php echo $article->parent()->title() ?> <?php else: ?><?php echo $article->date('d F Y', 'uploaded') ?> <?php endif; ?>(<?= $article->category()->upper()->html() ?>)
      </p>
  </div>

</a>
</article>
