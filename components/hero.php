<?php
$lookingBtn = get_sub_field('looking_button');
$buyingBtn = get_sub_field('buying_button');
$owningBtn = get_sub_field('owning_button');
$btns = ['btn--opal' => $lookingBtn, 'btn--tuft-bush' => $buyingBtn, 'btn--supernova' => $owningBtn];
$detect = new Mobile_Detect; ?>

<div class="hero d-flex flex-column">
  <div class="hero__inner">
    <div class="hero__image" <?= get_bk_image_set(get_sub_field('background_image')) ?> data-component="image-bk"></div>
    <div class="hero__text">
      <h1><?= the_sub_field('title') ?></h1>
      <span class="hero__description h5"><?= the_sub_field('textarea') ?></span>
      <div class="hero__btns <?= (get_sub_field('show_app_links')) ? 'hero__btns--external' : 'hero__btns--internal' ?>"><?php
        if(get_sub_field('show_app_links')) {
          // Check for a specific platform with the help of the magic methods:
          if( $detect->isiOS() || $detect->isAndroidOS() ){
            if( $detect->isiOS() ){?>
              <a href="<?= get_field('ios-link', 'option') ?>" title="Link to app store app" target="_blank" class="button btn--blue download-btn"><?= get_component('components', 'svg',['icon' => 'apple', 'title' => '', 'height' => 18, 'width' => 15, 'viewbox' => '0 0 15 18']) ?> iOS</a><?php
            }
            if( $detect->isAndroidOS() ){?>
              <a href="<?= get_field('android-link', 'option') ?>" title="Link to play store app" target="_blank" class="button btn--blue download-btn"><?= get_component('components', 'svg',['icon' => 'android', 'title' => '', 'height' => 19, 'width' => 15, 'viewbox' => '0 0 15 19']) ?> ANDROID</a><?php
            } 
          } else {
            echo '<a href="'.get_field('desktop-link', 'option').'" title="Link to app store app" target="_blank" class="button btn--blue download-btn">Sign Up</a>';
          }
        } else {
          foreach($btns as $c => $b) {
            if( $b ) { ?>
              <a href="<?= $b['url'] ?>" target="<?= $b['target'] ?>" class="button button--single-line <?= $c ?>"><?= $b['title'] ?></a><?php
            }
          }
        } ?>
      </div><?php
      $cta = get_sub_field('cta');?>
      <?= ( $cta ) ? get_component('components', 'link', array(
            'classes' => 'link--arrow',
            'title' => $cta['title'],
            'html' => $cta['title'],
            'url' => $cta['url'],
            'target' => $cta['target']
          )
        ) : null ?>
    </div>
  </div>
</div>
