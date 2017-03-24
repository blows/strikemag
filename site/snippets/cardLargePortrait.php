<article class="card-large card-large-portrait portrait">

<a href="<?= $article->url() ?>" class="">
<?php if ($article->coverimage()->isNotEmpty()) : ?>
  <div class="card-large-image">
    <?php $ci = $article->coverimage()->toFile() ?>
    <figure>
      <img src="<?php echo $ci->focusCrop(350, 500)->url(); ?>" alt="" />
    </figure>
  </div>
<?php endif; ?>

<header class="card-large-info">
    <div class="card-large-info__group">
      <?php if ($article->printed()->isNotEmpty()) : ?>
        <h3 class="card-large-info__issue">
          <?= $issue->title()->upper()->html() ?>
        </h3>
      <?php endif; ?>
      <h2 class="card-large-info__title" style="color: <?= $article->parent()->color() ?>">
        <?= $article->title()->upper()->html() ?>
      </h2>
      <h3 class="card-large-info__contributor" style="color: <?= $article->parent()->color() ?>">
        <?= $contributor->title()->upper() ?>
      </h3>
    </div>
    <p class="card-large-info__summary">
      <?= $article->summary()->html() ?>
    </p>
</header>

</a>
</article>
