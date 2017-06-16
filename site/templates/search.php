<?php snippet('header') ?>

<!-- <form>
  <input type="search" name="q" value="<?php echo esc($query) ?>">
  <input type="submit" value="Search">
</form> -->

Results for '<?php echo (!empty($query)) ? esc($query) : '' ?>':

<?php if($results->count()) : ?>
<ul>
  <?php foreach($results as $result): ?>
  <li>
    <?php snippet('cardLargeLandscape', array(
    'article' => $result,
    'contributor' => $pages->find('contributors/' . $result->contributor()),
    'issue' => $pages->find('magazine/' . $result->printed())
    )) ?>
  </li>
  <?php endforeach ?>
</ul>
<?php else : ?>
  <p>No results found.</p>
<?php endif ?>

<?php snippet('footer') ?>
