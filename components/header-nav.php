<?php
$sign_in_link = get_field('sign-in_link', 'option');
$sign_up_link = get_field('sign-up_link', 'option');
$app_link = get_field('app_link', 'option');
$logo = get_field('logo', 'option') ? get_field('logo', 'option') : get_image('logo.png');?>

<nav class="header__nav navbar navbar-expand-lg <?=!empty($cssClass) ? $cssClass : '' ?>">
	<a href="<?= home_url( '/' ) ?>" class="navbar-brand" title="go to home page">
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
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-menu" aria-controls="navbar-collapse-menu" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse nav-desktop" data-component="navbar-desktop"><?php
    wp_nav_menu( array(
      'theme_location'  => 'main-menu', // where it's located in the theme
      'container'       => '', // remove nav container
      'container_class' => '', // class of container
      'menu'            => __( 'The Main Menu', 'cu_textdomain' ), // nav name
      'menu_class'      => 'navbar-nav', // adding custom nav class
      'walker'          => new Desktop_Nav()
    ));?>
    <div class="header__sign-in">
      <?php 
      $nav_cta_1 = get_field('nav_cta_1', get_the_ID());
      $nav_cta_2 = get_field('nav_cta_2', get_the_ID());

      if( get_field('get_the_app_link', get_the_ID()) ) {
        echo (!empty($app_link)) ? '<a href="'.$app_link['url'].'" title="'.$app_link['title'].'" class="button btn--blue">'.$app_link['title'].'</a>' : null;
      
      } elseif ( $nav_cta_1 || $nav_cta_2  ) {
        
          if ( $nav_cta_1 ) {
             $link_target_1 = $nav_cta_1['target'] ? $nav_cta_1['target'] : '_self';
              echo (!empty($nav_cta_1)) ? '<a href="'.$nav_cta_1['url'].'" title="'.$nav_cta_1['title'].'" target="'.$link_target_1.'" class="button btn--white">'.$nav_cta_1['title'].'</a>' : null;
          }
          if ( $nav_cta_2 ) {
            $link_target_2 = $nav_cta_2['target'] ? $nav_cta_2['target'] : '_self';
             echo (!empty($nav_cta_2)) ? '<a href="'.$nav_cta_2['url'].'" title="'.$nav_cta_2['title'].'" target="'.$link_target_2.'" class="button btn--blue">'.$nav_cta_2['title'].'</a>' : null;
          }
      } else {
        echo (!empty($sign_in_link)) ? '<a href="'.$sign_in_link['url'].'" title="'.$sign_in_link['title'].'" class="button btn--white">'.$sign_in_link['title'].'</a>' : null;
        echo (!empty($sign_up_link)) ? '<a href="'.$sign_up_link['url'].'" title="'.$sign_up_link['title'].'" class="button btn--blue">'.$sign_up_link['title'].'</a>' : null;
      }?>
    </div>
	</div>

	<div class="collapse navbar-collapse nav-drawer" id="navbar-collapse-menu">
    <div class="nav-drawer__inner"><?php
      wp_nav_menu( array(
        'theme_location'  => 'main-menu', // where it's located in the theme
        'container'       => '', // remove nav container
        'container_class' => '', // class of container
        'menu'            => __( 'Mobile Header Menu', 'cu_textdomain' ), // nav name
        'menu_class'      => 'nav-drawer__main navbar-nav', // adding custom nav class
        'walker'          => new Drawer_Nav()
      ));?>
      <div class="nav-drawer__drawer">
        <span class="nav-drawer__close"><img src="<?= get_stylesheet_directory_uri() ?>/images/icon-arrow-dn-teal.svg" /> Back</span>
        <div class="nav-drawer__drawer-content"></div>
      </div>
    </div>
    <div class="header__sign-in">
      <?php if( get_field('get_the_app_link', get_the_ID()) ) {
        echo (!empty($app_link)) ? '<a href="'.$app_link['url'].'" title="'.$app_link['title'].'" class="button btn--blue">'.$app_link['title'].'</a>' : null;
      } else {
        echo (!empty($sign_in_link)) ? '<a href="'.$sign_in_link['url'].'" title="'.$sign_in_link['title'].'" class="button btn--white">'.$sign_in_link['title'].'</a>' : null;
        echo (!empty($sign_up_link)) ? '<a href="'.$sign_up_link['url'].'" title="'.$sign_up_link['title'].'" class="button btn--blue">'.$sign_up_link['title'].'</a>' : null;
      }
    ?>
    </div>
  </div>

  <?= get_component('partials', 'header-searchform') ?>
</nav>
