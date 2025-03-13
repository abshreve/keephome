<?php
$image = get_sub_field('banner_background_image');
$image_tablet = get_sub_field('background_tablet_image');
$image_mobile_bk = get_sub_field('background_mobile_image');
$image_mobile_front = get_sub_field('mobile_image_front');
$cta = get_sub_field('banner_cta');
$cta2 = get_sub_field('cta2');
$icons = get_sub_field('show_icons_in_buttons');?>

<div class="banner-signup">
  <div class="banner-signup__bg banner-signup__bg--desktop" style="background-image: url('<?= $image['url'] ?>')"></div>
  <div class="banner-signup__bg banner-signup__bg--tablet" style="background-image: url('<?= $image_tablet['url'] ?>')"></div>
  <div class="banner-signup__bg banner-signup__bg--mobile" style="background-image: url('<?= $image_mobile_bk['url'] ?>')"></div>
  <div class="banner__inner">
    <div class="banner__text">
      <h3><?= get_sub_field('header_text') ?></h3><?php
      if (get_sub_field('description')) : ?>
        <p><?= get_sub_field('description') ?></p><?php
      endif;?>

      <div class="banner-signup__buttons"><?php
        if (!empty($cta['url']) && !empty($cta['title'])) : ?>
          <a href="<?= $cta['url'] ?>" <?= (!empty($cta['target'])) ? 'target="'.$cta['target'].'"' : null ?> title="<?= $cta['title'] ?>" class="button button--single-line w-100 max-w--350p mb--20 banner__cta<?= (empty($cta2['url']) && empty($cta2['title'])) ? '_one' : '' ?>">
            <?= ($icons) ?'<i class="fab fa-apple" aria-hidden="true"></i>' : '' ?>
            <?= $cta['title'] ?>
          </a><?php
        endif;
        if (!empty($cta2['url']) && !empty($cta2['title'])) : ?>
          <a href="<?= $cta2['url'] ?>" <?= (!empty($cta2['target'])) ? 'target="'.$cta2['target'].'"' : null ?> title="<?= $cta2['title'] ?>" class="button button--single-line w-100 max-w--350p banner__cta">
            <?= ($icons) ? '<i class="fab fa-android" aria-hidden="true"></i>' : '' ?>
            <?= $cta2['title'] ?>
          </a><?php
        endif; ?>
        <img src="<?= $image_mobile_front['url'] ?>" class="banner-signup__mobile-img" alt="" />
      </div>
    </div>
  </div>
</div>