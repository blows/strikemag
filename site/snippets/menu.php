<nav class="navigation" role="navigation">

    <a href="<?= $site->activePage()->url() ?>" class="navigation-page">
      <?php if( $page->parents()->count() > 0 ) {
   echo $site->activePage()->parents()->last()->title()->upper();
} else { echo $site->activePage()->title()->upper(); } ?>
    </a>

    <a href="" class="navigation-menu">MENU</a>

    <i class="hamburger fa fa-bars" aria-hidden="true"></i>
    <i class="cross fa fa-times" aria-hidden="true"></i>

  <ul class="menu">
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?= $item->url() ?>"><?= $item->title()->upper() ?></a>
    </li>
    <?php endforeach ?>
  </ul>

</nav>
