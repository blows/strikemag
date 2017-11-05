<article class="card-large-portrait <? if ($article->printed()->isEmpty()): ?><?= 'card-online' ?><? endif ?>">
<a href="<?= $article->url() ?>">

  <?php if ($article->coverimage()->isNotEmpty()) : ?>
    <div class="card-large-portrait-image">
      <?php if ($ci = $article->coverimage()->toFile()): ?>
      <figure>
        <img alt="<?= html($article->title()) ?>"
        src="<?php echo thumb($ci, array('width' => 448, 'height' => 672, 'quality' => 100, 'crop' => true), false) ?>"
        sizes="(max-width: 450px) 90vw, (max-width: 768px) 35vw, (max-width: 1440px) 25vw"
        srcset="<?php echo thumb($ci, array('width' => 433.1, 'height' => 750.266, 'quality' => 70, 'crop' => true), false) ?> 216.55w,
         <?php echo thumb($ci, array('width' => 540.5, 'height' => 812.8, 'quality' => 70, 'crop' => true), false) ?> 270.683w,
         <?php echo thumb($ci, array('width' => 646.066, 'height' => 970, 'quality' => 70, 'crop' => true), false) ?> 323.033w" />
      </figure>
    <?php endif ?>
    </div>
  <?php endif; ?>

  <div class="card-large-portrait-info">
      <div class="card-large-portrait-info__group">
        <p class="card-large-portrait-info__title">
          <?= $article->title() ?><?php if($sub = $article->subtitle()->isNotEmpty()): ?>: <span><?= $article->subtitle()->widont() ?></span><?php endif ?>
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
