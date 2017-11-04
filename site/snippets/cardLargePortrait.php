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
          <?= $article->title()->upper() ?><?php if($sub = $article->subtitle()->isNotEmpty()): ?>:<br />
            <span><?= $article->subtitle()->upper() ?></span><?php endif ?>
        </p>
        <p class="card-large-info__contributors">
          by <?php foreach ($article->contributor()->split() as $name): ?><span class="card-large-info__contributor"><?php echo $pages->find('contributors/' . $name)->title()->html() ?></span><?php endforeach; ?>
        </p>
      </div>
      <p class="card-large-portrait-info__issue">
        <?php if ($article->parent()->printed()->isNotEmpty()) : ?><?php echo $article->parent()->title() ?><?php if ($article->parent()->name()->isNotEmpty()): ?> <?= $article->parent()->name()->html() ?><?php endif ?><?php else: ?><?php echo $article->date('d F Y', 'uploaded') ?> <?php endif; ?>
  </div>

</a>
</article>
