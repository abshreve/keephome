<?php
$link = get_sub_field('cta_1') ? get_sub_field('cta_1') : false;
$link2 = get_sub_field('cta_2') ? get_sub_field('cta_2') : false;
$link_type = ($link || $link2) ? get_sub_field('button_or_link') : null; ?>

<div class="copy-complex">
  <div class="copy__inner">
    <div class="copy__text">
      <h6 class="subheading"><?php echo the_sub_field('subheader_complex'); ?></h6>
      <h1 class="copy__heading">
        <?php echo the_sub_field('header_complex'); ?>
      </h1>
        <h4 class="bold_text"><?php echo the_sub_field('bold_text_'); ?></h4>
      <h5>
        <?php echo the_sub_field('main_text_complex'); ?>
      </h5><?php

      if ($link || $link2) {?>
        <div class="copy-complex__links copy-complex__links--<?=$link_type?>"><?php
          if ($link_type === 'link') {?>
            <?= ($link) ? get_component('components', 'link', array(
              'url' => $link['url'],
              'classes' => 'link--arrow',
              'title' => $link['alt'] !== '' ? $link['alt'] : $link['title'],
              'html' => $link['title'],
              'target' => $link['target']
            )) : null ?>
            <?= ($link2) ? get_component('components', 'link', array(
              'url' => $link2['url'],
              'classes' => 'link--arrow',
              'title' => $link2['alt'] !== '' ? $link2['alt'] : $link2['title'],
              'html' => $link2['title'],
              'target' => $link2['target']
            )) : null;?><?php
          } else {
            if ($link) { ?><a href="<?= $link['url'] ?>" title="<?= $link['alt'] ? $link['alt'] : $link['title'] ?>" <?= (!empty($link['target'])) ? 'target="'.$link['target'].'"' : null ?> class="button button--single-line w-100 max-w-lg-350p btn--<?= get_sub_field('cta_1_color') ? get_sub_field('cta_1_color') : 'blue' ?>"><?= $link['title'] ?></a><?php }
            if ($link2) { ?><a href="<?= $link2['url'] ?>" title="<?= $link2['alt'] ? $link2['alt'] : $link2['title'] ?>" <?= (!empty($link2['target'])) ? 'target="'.$link2['target'].'"' : null ?> class="button button--single-line w-100 max-w-lg--350p btn--<?= get_sub_field('cta_2_color') ? get_sub_field('cta_2_color') : 'blue' ?>"><?= $link2['title'] ?></a><?php }
          }?>
        </div><?php
      }?>
    </div>
  </div>
</div>
