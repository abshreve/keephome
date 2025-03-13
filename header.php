<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="theme-color" content="#fafafa">
  <meta name="facebook-domain-verification" content="dxd2lz7usb9a1lkp79dajtjsdi2k3z" />
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!This line is to allow for sticky bars on blog pages with an upsell to create a Keep Account>
<script src="https://885eddf67edb403a8a68bca74a91b17b.js.ubembed.com" async></script>





  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">



  <?= get_component('components', 'svg-defs') ?>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <?= get_component('components', 'cookie-announce') ?>
  <?php
	$headerType = get_field('header_footer_setting'); ?>

  <header class="sticky-top header <?= $headerType ?>">
    <div class="header__inner"><?php
      if($headerType === 'ultra-minimal') {
        echo get_component('components', 'header-landing', ['headerType' => $headerType]);
      } else {
        echo get_component('components', 'toolbar', ['headerType' => $headerType]);
        echo get_component('components', 'header-nav', ['cssClass' => $headerType]);
      }?>
    </div>
	  <!This line is to allow for pop-up for the Partners newsletter>
	  <script src="https://885eddf67edb403a8a68bca74a91b17b.js.ubembed.com" async></script>
  </header>
