<?php
$subheading_a = get_sub_field('subheading_one');
$subheading_b = get_sub_field('subheading_two');
$cta_a = get_sub_field('cta_one_link');
$cta_b = get_sub_field('cta_two_link');?>

<div class="column-two" style="background-color: <?= get_sub_field('background_Color') ?>">
  <div class="banner___inner container">
    <div class="row">

      <div class="banner___text col-12 col-lg-6"><?php
        if (!empty($subheading_a)) : ?>
          <h5 class="subheading"><?= $subheading_a ?></h5>
        <?php endif; ?>
		<?php if ( is_page( '11501' ) ) { ?>
			<h1 class="h2"><?= get_sub_field('heading_one') ?></h1>
		<?php } else { ?>
			<h3 class="h2"><?= get_sub_field('heading_one') ?></h3>
		<?php } ?>
        <p><?= get_sub_field('paragraph_one') ?></p><?php
        if (!empty($cta_a)) :?>
          <a href="<?= $cta_a['url'] ?>" <?= (!empty($cta_a['target'])) ? 'target="'.$cta_a['target'].'"' : null ?> title="<?= $cta_a['title'] ?>" class="banner__cta_button">
            <?= $cta_a['title'] ?>
          </a>
        <?php endif; ?>
      </div>

      <div class="banner___text col-12 col-lg-6"><?php
        if (!empty($subheading_b)) : ?>
          <h5 class="subheading"><?= $subheading_b ?></h5>
        <?php endif; ?>
        <h3><?= get_sub_field('heading_two') ?></h3>
        <p class="paragraph"><?= get_sub_field('paragraph_two'); ?></p><?php
        if (!empty($cta_b)) :?>
          <a href="<?= $cta_b['url'] ?>" class="banner__cta_button">
            <?= $cta_b['title'] ?>
          </a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>
