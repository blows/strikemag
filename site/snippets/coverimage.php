<?php if($item->coverimage()->isNotEmpty()): ?>
  <figure>
    <img src="<?= $item->coverimage()->toFile()->focusCrop(500, 350)->url(); ?>" alt="" />
  </figure>
<?php endif ?>
