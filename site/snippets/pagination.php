<?php if($pagination->hasPages()): ?>
  <nav class="pagination">

    <?php if($pagination->hasPrevPage()): ?>
      <a class="pagination-item left" href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">
        BACK
      </a>
    <?php else: ?>
      <span class="pagination-item left is-inactive">
        BACK
      </span>
    <?php endif ?>

    <?php if($pagination->hasNextPage()): ?>
      <a class="pagination-item right" href="<?= $pagination->nextPageURL() ?>" rel="next" title="older articles">
        NEXT
      </a>
    <?php else: ?>
      <span class="pagination-item right is-inactive">
        NEXT
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>

<!-- <?= (new Asset("assets/images/arrow-right.svg"))->content() ?> -->
