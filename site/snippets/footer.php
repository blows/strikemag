  <footer class="footer cf" role="contentinfo">
    <div class="footer-left">
      <ul>
      <?php foreach($site->find('home', 'magazine', 'contributors') as $subpage): ?>
        <li>
          <a href="<?php echo $subpage->url() ?>">
          <?php echo html($subpage->title()->upper()) ?>
          </a>
        </li>
        <?php endforeach ?>
        <li class="">
          <a href="http://www.strikemag.bigcartel.com">SHOP</a>
        </li>
      </ul>
    </div>
    <div class="footer-right">
      <ul>
      <?php foreach($site->find('home', 'magazine') as $subpage): ?>
        <li>
          <a href="<?php echo $subpage->url() ?>">
          <?php echo html($subpage->title()->upper()) ?>
          </a>
        </li>
        <?php endforeach ?>
        <li class="">
          <a href="http://www.strikemag.org" target="_blank">FB</a>
          <a href="http://www.strikemag.org" target="_blank">TW</a>
          <a href="http://www.strikemag.org" target="_blank">IG</a>
        </li>
      </ul>
    </div>
  </footer>

  <?= js('assets/js/jquery.min.js') ?>
  <?= js('assets/js/script.js') ?>

</body>
</html>
