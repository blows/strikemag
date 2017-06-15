<nav class="navigation" role="navigation">

    <a href="<?= $site->activePage()->url() ?>" class="navigation-page">
      <?php if( $page->parents()->count() > 0 ) {
   echo $site->activePage()->parents()->last()->title()->upper();
} else { echo $site->activePage()->title()->upper(); } ?>
    </a>

    <a href="" class="navigation-menu">MENU</a>

    <i class="hamburger fa fa-bars" id="hamburger" aria-hidden="true"></i>
    <i class="cross fa fa-times" aria-hidden="true"></i>

  <ul class="menu">
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?= $item->url() ?>"><?= $item->title()->upper() ?></a>
    </li>
    <?php endforeach ?>

    <a href="/search" data-auto-route="true" title="search articles" aria-label="search articles" id="search-button" class="icon">
      <i class="fa fa-search" aria-hidden="true"></i>
    </a>


<form class="search" method="post" action="<?= page('search')->url() ?>">
<input type="search" name="q" placeholder="search articles" value="<?php echo (!empty($query)) ? esc($query) : '' ?>">
<!-- <input type="submit" value="Search"> -->
</form>

  </ul>

</nav>
