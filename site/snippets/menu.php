<nav class="navigation" role="navigation">
  <ul class="menu">
    <a href="<?= $site->activePage()->url() ?>">
      <?php if( $page->parents()->count() > 0 ) {
   echo $site->activePage()->parents()->last()->title();
} else { echo $site->activePage()->title(); } ?>
    </a>
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
