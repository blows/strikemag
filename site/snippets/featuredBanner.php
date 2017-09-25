<section class="home-featured" style="background-image: url(<?= $featuredimage; ?>)">
    <?php $back = 'back-' . uniqid(); $colors[$back] = $post->parent()->color(); ?>
    <a href="<?php echo $post->url(); ?>" class="home-featured-text <?= $back ?>">
      <h2 class="home-featured-title">
        <?php echo $post->title()->upper()->widont(); ?>
      </h2>
      <?php foreach ($post->contributor()->split() as $name): ?>
            <h3 class="home-featured-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
      <?php endforeach; ?>
    </a>
</section>
