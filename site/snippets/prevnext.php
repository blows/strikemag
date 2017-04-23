<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

if($page->hasNextVisible() || $page->hasPrevVisible()): ?>
  <nav class="pagination <?= !@$flip ?: ' flip' ?>">

    <?php if($page->hasPrevVisible()): ?>
      <div class="pagination-item <?= $directionPrev ?>"><a href="<?= $page->prevVisible()->url() ?>" rel="prev" title="<?= $page->prevVisible()->title()->html() ?>">
        BACK
      </a></div>
    <?php else: ?>
      <div class="pagination-item <?= $directionPrev ?> is-inactive"><span>
        BACK
      </span></div>
    <?php endif ?>

    <?php if($page->hasNextVisible()): ?>
      <div class="pagination-item <?= $directionNext ?>"><a href="<?= $page->nextVisible()->url() ?>" rel="next" title="<?= $page->nextVisible()->title()->html() ?>">
        NEXT
      </a></div>
    <?php else: ?>
      <div class="pagination-item <?= $directionNext ?> is-inactive"><span>
        NEXT
      </span></div>
    <?php endif ?>

  </nav>
<?php endif ?>
