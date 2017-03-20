<?php if($item->coverimage()->isNotEmpty()): ?>
  <?php $ci = $item->coverimage()->toFile() ?>
  <figure>
    <img src="<?php ecco ($ci->isLandscape(), $ci->focusCrop(500, 350)->url(), $ci->focusCrop(350, 500)->url()); ?>" alt="" />
  </figure>
<?php endif ?>
