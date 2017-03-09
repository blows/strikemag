  <footer class="footer cf" role="contentinfo">
    <div class="branding">
      <ul>
      <?php foreach($site->find('home', 'magazine', 'contributors') as $subpage): ?>
        <li>
          <a href="<?php echo $subpage->url() ?>">
          <?php echo html($subpage->title()) ?>
          </a>
        </li>
        <?php endforeach ?>
        <li class="">
          <a href="http://www.strikemag.bigcartel.com">Shop</a>
        </li>
      </ul>
    </div>
    <nav class="navigation" role="navigation">
      <ul>
      <?php foreach($site->find('home', 'magazine') as $subpage): ?>
        <li>
          <a href="<?php echo $subpage->url() ?>">
          <?php echo html($subpage->title()) ?>
          </a>
        </li>
        <?php endforeach ?>
        <li class="">
          <a>FB</a>
          <a>TW</a>
          <a>IG</a>
        </li>
      </ul>
    </nav>
  </footer>

</body>
</html>
