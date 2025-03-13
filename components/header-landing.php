<?php
$sign_in_link = get_field('sign-in_link', 'option');
$app_link = get_field('app_link', 'option');
$logo = get_field('logo') ? get_field('logo') : get_image('keephome-logo.svg');?>

<nav class="header__nav navbar navbar-expand-lg">
  <a href="<?= home_url( '/' ) ?>" class="navbar-brand" title="go to home page">
    <!-- <img class="page-logo" src="<?= $logo ?>" alt=""> -->
    <?= get_component('components', 'image', [
      'image' => $logo,
      'classes' => 'page-logo no-lazyload',
      'alt' => 'header logo',
      'default_size' => 'small',
      'srcset_sizes' => '180px'
    ]) ?>
  </a>
  <button type="button" class="header__nav__search-btn toggle-search-btn d-lg-none">
    <img src="<?= get_image('search-icon.svg') ?>" alt="">
  </button>
</nav>