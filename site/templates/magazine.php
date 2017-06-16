<?php snippet('header', array('issues' => $issues)) ?>

  <main class="main" role="main">

    <div class="magazine">

      <?= $page->text()->kirbytext() ?>

      <?php $colors = []; ?>
      <?php foreach($issues as $issue): ?>
        <?php $class = 'background-' . uniqid(); $colors[$class] = $issue; ?>

        <div class="issue group" id="<?php echo $issue->uid() ?>">

          <div class="issue-summary text" style="background-color: <?= $issue->color() ?>;">
            <div class="issue-summary__image">
              <ul class="rslides">
                <?php foreach($issue->images()->sortBy('sort', 'asc') as $image) : ?>
                    <li><img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" class="img-responsive" /></li>
                <?php endforeach ?>
              </ul>
              <!-- <figure>
                <img src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </figure> -->
            </div>
            <div class="issue-summary__detail">
              <h1 class="issue-summary__detail-title"><?= $issue->title()->upper()->html() ?>: <?= $issue->name()->html() ?></h1>
              <h3 class="issue-summary__detail-printed">PRINTED: <?= $issue->date('d/m/Y', 'printed') ?></h3>
              <p class="issue-summary__detail-summary"><?= $issue->summary()->html() ?></p>
            </div>
            <div class="issue-summary__detail-buy">
              <button type="button">GET THE ISSUE</button>
            </div>
          </div>

          <div class="issue-contents" style="background-color:<?php echo $issue->color1() ?>";>
            <div class="issue-contents__title"><h1><?php echo $issue->title()->upper() ?> CONTENTS</h1><i class="fa fa-angle-down" aria-hidden="true"></i></div>
            <div class="issue-contents-group">
              <?php foreach($issue->children()->sortBy('sort', 'desc') as $content): ?>
                <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>
                <div class="issue-contents__content <?= $class ?>">
                  <?php if($content->isVisible()): ?>
                    <a href="<?= $content->url() ?>"><p class="issue-contents__content-online">ONLINE</p>
                    <h1 class="issue-contents__content-title"><?= $content->title()->upper()->html() ?></h1>
                    <?php foreach ($content->contributor()->split() as $name): ?>
                          <h3 class="issue-contents__content-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
                    <?php endforeach; ?></a>
                  <?php else: ?>
                    <h1 class="issue-contents__content-title"><?= $content->title()->html()->upper() ?></h1>
                    <?php foreach ($content->contributor()->split() as $name): ?>
                          <h3 class="issue-contents__content-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
                    <?php endforeach; ?>
                  <?php endif ?>
                </div>
              <?php endforeach ?>
            </div>
          </div>

        </div>

      <?php endforeach ?>

      <style>
  <?php foreach($colors as $class => $issue): ?>
    .<?= $class ?> {
      background: <?= $issue->color1() ?>;
    }

    .<?= $class ?>:hover, .<?= $class ?>:focus {
      background: <?= $issue->color() ?>;
    }
  <?php endforeach ?>
</style>

    </div>

  </main>

<?php snippet('footer') ?>
