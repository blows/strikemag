<nav class="about-menu">
  <ul>
    <?php foreach($site->find('about', 'about/submissions', 'about/distribution') as $subpage): ?>
    <li>
      <a href="<?php echo $subpage->url() ?>">
        <?php echo html($subpage->title()) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
