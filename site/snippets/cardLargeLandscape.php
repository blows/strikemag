<article class="card-large">
<a href="<?= $article->url() ?>">

  <?php if ($article->hasImages()) : ?>
    <div class="card-large-image">
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
      <?php else : ?>
        <?php $ci = $article->images()->first() ?>
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

  <div class="card-large-info">
    <div class="card-large-info__group">
      <p class="card-large-info__title">
        <?= $article->title()->widont() ?>
        <?php if($sub = $article->subtitle()->isNotEmpty()): ?>:<span> <?= $article->subtitle() ?></span><?php endif ?>
      </p>
      <?php foreach ($article->contributor()->split() as $name): ?>
        <p class="card-large-info__contributor">
          <?php echo $pages->find('contributors/' . $name)->title()->html() ?>
        </p>
      <?php endforeach; ?>
    </div>
    <p class="card-large-info__issue">
      <?php if ($article->parent()->printed()->isNotEmpty()) : ?><?php echo $article->parent()->title() ?> <?php else: ?><?php echo $article->date('d F Y', 'uploaded') ?> <?php endif; ?>(<?= $article->category()->upper()->html() ?>)
    </p>
  </div>

</a>
</article>
