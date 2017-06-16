<article class="card-large">
<a href="<?= $article->url() ?>">

  <?php if ($article->coverimage()->isNotEmpty()) : ?>
    <div class="card-large-image">
      <?php $ci = $article->coverimage()->toFile() ?>
      <figure>
        <img src="<?php echo $ci->focusCrop(500, 350)->url(); ?>" alt="" />
      </figure>
    </div>
  <?php endif; ?>

  <header class="card-large-info">
    <div class="card-large-info__group">
      <h3 class="card-large-info__issue">
        (<?= $article->category()->upper()->html() ?>) <?php if ($article->printed()->isNotEmpty()) : ?><?= $issue->title()->upper()->html() ?><?php endif; ?>
      </h3>
      <h2 class="card-large-info__title" style="color: <?= $article->parent()->color() ?>">
        <?= $article->title()->upper()->html() ?>
      </h2>
        <?php foreach ($article->contributor()->split() as $name): ?>
              <h3 class="card-large-info__contributor" style="color: <?= $article->parent()->color() ?>">
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
