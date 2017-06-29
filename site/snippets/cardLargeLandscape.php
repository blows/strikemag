<article class="card-large">
<a href="<?= $article->url() ?>">

  <?php if ($article->coverimage()->isNotEmpty()) : ?>
    <div class="card-large-image">
      <?php $ci = $article->coverimage()->toFile() ?>
      <figure>
        <img src="<?php echo $ci->focusCrop(630, 420)->url(); ?>" alt="" />
      </figure>
    </div>
  <?php endif; ?>

  <header class="card-large-info">
    <div class="card-large-info__group">
      <h3 class="card-large-info__issue">
        <?php if ($article->parent()->printed()->isNotEmpty()) : ?><?php echo $article->parent()->title()->upper() ?> <?php endif; ?>(<?= $article->category()->upper()->html() ?>)
      </h3>
      <h2 class="card-large-info__title">
        <?= $article->title()->upper()->widont() ?>
      </h2>
        <?php foreach ($article->contributor()->split() as $name): ?>
              <h3 class="card-large-info__contributor">
                <?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?>
              </h3>
        <?php endforeach; ?>
    </div>
    <p class="card-large-info__summary">
      <?= $article->summary()->html() ?>
    </p>
  </header>

</a>
</article>
