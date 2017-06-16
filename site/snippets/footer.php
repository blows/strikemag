  <footer class="footer group" role="contentinfo">
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
    <div class="footer-newsletter">
      <p>Sign up to our irregular newsletter receive our irregular newsletter updates</p>
      <?php snippet('newsletter') ?>
    </div>
  </footer>

  <?= js('assets/js/jquery.min.js') ?>
  <?= js('assets/plugins/embed/js/embed.js') ?>
  <?= js('assets/js/responsiveslides.min.js') ?>
  <?= js('assets/js/script.js') ?>

</body>
</html>
