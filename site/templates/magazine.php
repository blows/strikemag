<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="magazine">

      <div class="magazine-intro">
        <p>Explore all the back issues of our quarterly publication.</p>
      </div>

      <?php $colors = []; ?>
      <?php $issue = $issues->first() ?>
        <?php $class = 'background-' . uniqid(); $colors[$class] = $issue; ?>

        <div class="issue group" id="<?php echo $issue->uid() ?>">

          <div class="issue-summary text">
            <div class="issue-summary__image" style="background-color: <?= $issue->color() ?>;">
              <ul class="rslides">
                <?php foreach($issue->images()->sortBy('sort', 'asc') as $image) : ?>
                    <li><img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>" class="img-responsive" /></li>
                <?php endforeach ?>
              </ul>
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

          <div class="issue-contents">
            <!-- <div class="issue-contents__title"><h1><?php echo $issue->title()->upper() ?> CONTENTS</h1><i class="fa fa-angle-down" aria-hidden="true"></i></div> -->
            <div class="issue-contents-group">
              <?php foreach($issue->children()->sortBy('sort', 'desc') as $content): ?>
                <?php $contributor = $pages->find('contributors/' . $content->contributor()) ?>

                  <?php if($content->isVisible()): ?>
                    <div class="issue-contents__content <?= $class ?>">
                    <a href="<?= $content->url() ?>">
                    <h1 class="issue-contents__content-title"><?= $content->title()->upper()->html() ?></h1>
                    <?php foreach ($content->contributor()->split() as $name): ?>
                          <h3 class="issue-contents__content-contributor"><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></h3>
                    <?php endforeach; ?></a>
                    </div>
                  <?php else: ?>
                    <div class="issue-contents__content <?= $class ?> offline">
                    <h1 class="issue-contents__content-title"><?= $content->title()->html()->upper() ?></h1>
                    <h3 class="issue-contents__content-contributor">
                      <?php foreach ($content->contributor()->split() as $name): ?>
                          <span><?php echo $pages->find('contributors/' . $name)->title()->upper()->html() ?></span>
                      <?php endforeach; ?>
                    </h3>
                    </div>
                  <?php endif ?>

              <?php endforeach ?>
            </div>
          </div>

        </div>

        <div class="magazine-more">
          <p class="magazine-more__explore">MORE ISSUES</p>
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
      border-color: <?= $issue->color() ?>;
    }

    .<?= $class ?>:hover, .<?= $class ?>:focus {
      background: <?= $issue->color() ?>;
    }

    .<?= $class ?>:hover.offline, .<?= $class ?>:focus.offline {
      background: transparent;
    }
  <?php endforeach ?>
</style>

    </div>

  </main>

<?php snippet('footer') ?>
