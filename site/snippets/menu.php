<nav class="navigation" role="navigation">

    <a href="" class="navigation-menu">MENU</a>

  <ul class="menu">
    <li class="branding menu-item<?= r(page('home')->isOpen(), ' is-active') ?>">
      <a href="<?= url() ?>" rel="home"><img src="<?php echo $site->image('strike-logo-white.svg')->url() ?>" alt="STRIKE! Magazine"></a>
    </li>
    <?php foreach($pages->visible() as $item): ?>
    <li class="menu-item<?= r($item->isOpen(), ' is-active') ?>">
      <a href="<?php e($item->ext_url()->isNotEmpty(), $item->ext_url(), $item->url()) ?>" <?php e($item->ext_url()->isNotEmpty(), 'target="_blank"', '') ?>>
        <?php echo html($item->title()->upper()) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>

</nav>
