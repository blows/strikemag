  <footer class="footer group" role="contentinfo">

    <div class="footer-newsletter">
      <p>Sign up to our newsletter to stay up to date with all STRIKE! activity</p>
      <?php snippet('newsletter') ?>
    </div>

    <div class="footer-nav">
      <ul class="footer-socials">
        <li><a href="<?php echo $site->facebook()->html() ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
        <li><a href="<?php echo $site->twitter()->html() ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="<?php echo $site->instagram()->html() ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>

  </footer>

  <?= js('assets/js/jquery.min.js') ?>
  <?= js('assets/plugins/embed/js/embed.js') ?>
  <!-- <?= js('assets/js/iis.min.js') ?> -->
  <?= js('assets/js/script.js') ?>

</body>
</html>
