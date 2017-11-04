<nav class="navigation" role="navigation">

  <ul class="menu">
    <li id="branding" class="menu-item<?= r(page('home')->isOpen(), ' is-active') ?>">
      <a href="<?= url() ?>" rel="home"><img src="<?php echo $site->image('strike-logo-white.svg')->url() ?>" alt="STRIKE!"></a>
    </li>
    <li class="menu-head menu-item">
      <a href="<?= url() ?>" rel="home"><?= $site->author() ?></a>
    </li>
    <li class="menu-toggle menu-item" id="menu-toggle">
      <button>MENU</button>
    </li>
    <ul id="menu-drop">
      <?php foreach($pages->visible() as $item): ?>
      <li class="menu-item<?= r($item->isOpen(), ' is-active') ?> menu-item__drop">
        <a href="<?php e($item->ext_url()->isNotEmpty(), $item->ext_url(), $item->url()) ?>" <?php e($item->ext_url()->isNotEmpty(), 'target="_blank"', '') ?>>
          <?php echo html($item->title()->upper()) ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </ul>

</nav>
