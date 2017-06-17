<?php snippet('header') ?>

  <main class="main" role="main">

    <?php $class = 'background-' . uniqid(); $colors[$class] = $page; ?>

    <div class="issue group" id="<?php echo $page->uid() ?>">

      <div class="issue-summary text" style="background-color: <?= $page->color() ?>;">
        <div class="issue-summary__image">
          <ul class="rslides">
            <?php foreach($page->images()->sortBy('sort', 'asc') as $image) : ?>
                <li><img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" class="img-responsive" /></li>
            <?php endforeach ?>
          </ul>
          <!-- <figure>
            <img src="<?= $page->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $page->title()->html() ?>" />
          </figure> -->
        </div>
        <div class="issue-summary__detail">
          <h1 class="issue-summary__detail-title"><?= $page->title()->upper()->html() ?>: <?= $page->name()->html() ?></h1>
          <h3 class="issue-summary__detail-printed">PRINTED: <?= $page->date('d/m/Y', 'printed') ?></h3>
          <p class="issue-summary__detail-summary"><?= $page->summary()->html() ?></p>
        </div>
        <div class="issue-summary__detail-buy">
          <button type="button">GET THE ISSUE</button>
        </div>
      </div>

      <div class="issue-contents" style="background-color:<?php echo $page->color1() ?>";>
        <div class="issue-contents__title"><h1><?php echo $page->title()->upper() ?> CONTENTS</h1><i class="fa fa-angle-down" aria-hidden="true"></i></div>
        <div class="issue-contents-group">
          <?php foreach($page->children()->sortBy('sort', 'desc') as $content): ?>
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

    <div class="magazine-more">
      <p class="magazine-more__explore">More Issues</p>
      <div class="magazine-more__issues group">
        <?php foreach($issues->not($latest) as $issue): ?>
          <div class="magazine-more__issue-cover">
            <a href="<?= $issue->url() ?>" alt="<?= $issue->title()->html() ?>: <?= $issue->name()->html() ?>">
              <div class="magazine-more__issue-hover">
                <h5><?= $issue->title()->html() ?>: <?= $issue->name()->html() ?></h5>
                <img src="<?= $issue->coverimage()->toFile()->url() ?>" alt="STRIKE! <?= $issue->title()->html() ?>" />
              </div>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>

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

  </main>

<?php snippet('footer') ?>
