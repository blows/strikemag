<nav class="navigation" role="navigation">
    <a href="<?= $site->activePage()->url() ?>">
      <?php if( $page->parents()->count() > 0 ) {
   echo $site->activePage()->parents()->last()->title();
} else { echo $site->activePage()->title()->upper(); } ?>
    </a>
    <button class="hamburger">&#9776;</button>
    <button class="cross">&#735;</button>
  <ul class="menu">
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?= $item->url() ?>"><?= $item->title()->upper() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
