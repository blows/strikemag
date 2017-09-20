<article class="card-portrait <?= $box ?> <? if ($article->printed()->isEmpty()): ?><?= 'card-portrait__online' ?><? endif ?>">
<a href="<?= $article->url() ?>">

  <div class="card-portrait-info">
    <p class="card-portrait-info__title">
      <?= $article->title()->widont() ?>
    </p>
    <?php foreach ($article->contributor()->split() as $name): ?>
      <span><p class="card-portrait-info__contributor">
        <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
      </p></span>
    <?php endforeach; ?>

    <?php if ($article->hasImages()) : ?>
      <div class="card-portrait-image">
        <?php if ($article->coverimage()->isNotEmpty()) : ?>
          <?php $ci = $article->coverimage()->toFile() ?>
          <figure>
            <img src="<?php echo thumb($ci, array('width' => 672, 'height' => 448, 'quality' => 100), false) ?>" alt="<?= html($article->title()) ?>" sizes="100vw"
            srcset="<?php echo thumb($ci, array('width' => 504, 'height' => 691, 'quality' => 70, 'crop' => true), false) ?> 600w,
             <?php echo thumb($ci, array('width' => 448, 'height' => 298, 'quality' => 70, 'crop' => true), false) ?> 800w,
             <?php echo thumb($ci, array('width' => 672, 'height' => 448, 'quality' => 70, 'crop' => true), false) ?> 1200w,
             <?php echo thumb($ci, array('width' => 896, 'height' => 598, 'quality' => 70, 'crop' => true), false) ?> 1600w,
             <?php echo thumb($ci, array('width' => 1120, 'height' => 746, 'quality' => 70, 'crop' => true), false) ?> 2000w" />
          </figure>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <p class="card-portrait-info__issue">
      <?if ($article->printed()->isNotEmpty()): ?>
        <?= $article->parent()->title()->upper() ?>
      <? else: ?>
        <?= $article->date('d.m.y', 'uploaded')?>
      <? endif; ?>(<?= $article->category()->upper()->html() ?>)
    </p>
    <p class="card-portrait-info__summary">
      <?= $article->summary()->html() ?>
    </p>
  </div>

</a>
</article>
