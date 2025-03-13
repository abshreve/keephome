<?php
$bk_image = get_sub_field('cta_background_image');
$logo = get_sub_field('logo');
$cta = get_sub_field('cta_button_link');
$cta2 = get_sub_field('cta_button_link_2'); ?>

<div class="banner-cta">
  <div class="banner__inner_cta"  <?= $bk_image ? get_bk_image_set($bk_image) : null ?> <?= $bk_image ? 'data-component="image-bk"' : null ?>>
    <div class="banner__text_cta">
      <?= get_component('components', 'image', ['image' => $logo, 'classes' => 'logo']) ?>
      <h2><?= get_sub_field('cta_header') ?></h2>
      <p><?= get_sub_field('cta_text') ?></p><?php
      if($cta || $cta2){?>
        <div class="banner-cta__links"><?php
          if ($cta) {?> <a href="<?= $cta['url'] ?>" title="<?= $cta['alt'] ? $cta['alt'] : $cta['title'] ?>" <?= (!empty($cta['target'])) ? 'target="'.$cta['target'].'"' : null ?> class="button button--single-line w-100 max-w--350p btn--<?= get_sub_field('cta_1_color')? get_sub_field('cta_1_color') : 'trans-teal' ?>"><?= $cta['title'] ?></a><?php }
          if ($cta2) {?> <a href="<?= $cta2['url'] ?>" title="<?= $cta2['alt'] ? $cta2['alt'] : $cta2['title'] ?>" <?= (!empty($cta2['target'])) ? 'target="'.$cta2['target'].'"' : null ?> class="button button--single-line w-100 max-w--350p btn--<?= get_sub_field('cta_2_color')? get_sub_field('cta_2_color') : 'trans-teal' ?>"><?= $cta2['title'] ?></a><?php }?>
        </div><?php
      }?>
    </div>
  </div>
</div>
