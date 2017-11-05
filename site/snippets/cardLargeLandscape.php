<article class="card-large <? if ($article->printed()->isEmpty()): ?><?= 'card-online' ?><? endif ?>">
<a href="<?= $article->url() ?>">

  <?php if ($article->hasImages()) : ?>
    <div class="card-large-image">
        <?php if ($ci = $article->coverimage()->toFile()): ?>
        <figure>
          <img alt="<?= html($article->title()) ?>"
          src="<?php echo thumb($ci, array('width' => 672, 'height' => 448, 'quality' => 100, 'crop' => true), false) ?>"
          sizes="(max-width: 450px) 90vw, (max-width: 768px) 53vw, (max-width: 1440px) 34vw"
          srcset="<?php echo thumb($ci, array('width' => 750.266, 'height' => 433.1, 'quality' => 70, 'crop' => true), false) ?> 325.133,
           <?php echo thumb($ci, array('width' => 812.8, 'height' => 540.5, 'quality' => 70, 'crop' => true), false) ?> 406.4w,
           <?php echo thumb($ci, array('width' => 970, 'height' => 646.066, 'quality' => 70, 'crop' => true), false) ?> 285w" />
        </figure>
      <?php endif ?>
    </div>
  <?php endif; ?>

  <div class="card-large-info">
    <div class="card-large-info__group">
      <p class="card-large-info__title">
        <?= $article->title()->widont() ?><?php if($sub = $article->subtitle()->isNotEmpty()): ?>: <span><?= $article->subtitle()->widont() ?></span>
        <?php endif ?>
      </p>
      <p class="card-large-info__contributors">
        by <?php foreach ($article->contributor()->split() as $name): ?><span class="card-large-info__contributor"><?php echo $pages->find('contributors/' . $name)->title()->html() ?></span><?php endforeach; ?>
      </p>
    </div>
    <p class="card-large-info__issue">
      <?php if ($article->parent()->printed()->isNotEmpty()) : ?><?php echo $article->parent()->title() ?><?php if ($article->parent()->name()->isNotEmpty()): ?> <?= $article->parent()->name()->html() ?><?php endif ?><?php else: ?><?php echo $article->date('d F Y', 'uploaded') ?> <?php endif; ?>
    </p>
  </div>

</a>
</article>
