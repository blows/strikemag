<article class="card-large">
<a href="<?= $article->url() ?>">

  <?php if ($article->coverimage()->isNotEmpty()) : ?>
    <div class="card-large-image">
      <?php snippet('coverimage', $article) ?>
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
