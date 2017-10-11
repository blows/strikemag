<article class="card-portrait <? if ($article->printed()->isEmpty()): ?><?= 'card-portrait__online' ?><? endif ?>">
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
            <img src="<?php echo thumb($ci, array('width' => 300, 'quality' => 100), false) ?>" alt="<?= html($article->title()) ?>"
            sizes="(max-width: 450px) 54vw, (max-width: 768px) 29vw, (max-width: 960px) 22vw, (max-width: 1200px) 22vw, (max-width: 1440px) 24vw, 25vw"
            srcset="<?php echo thumb($ci, array('width' => 250, 'quality' => 70), false) ?> 250w,
                    <?php echo thumb($ci, array('width' => 280, 'quality' => 70), false) ?> 280w,
                    <?php echo thumb($ci, array('width' => 350, 'quality' => 70), false) ?> 350w,
                    <?php echo thumb($ci, array('width' => 500, 'quality' => 70), false) ?> 500w" />
          </figure>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <p class="card-portrait-info__summary">
      <?= $article->summary()->html() ?>
    </p>

    <p class="card-portrait-info__issue">
      <?if ($article->printed()->isNotEmpty()): ?>
        <?= $article->parent()->title()->html() ?>
      <? else: ?>
        <?= $article->date('d.m.y', 'uploaded')?>
      <? endif; ?>(<?= $article->category()->title()->html() ?>)
    </p>
  </div>

</a>
</article>
