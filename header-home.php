<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<script src="https://885eddf67edb403a8a68bca74a91b17b.js.ubembed.com" async></script>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#fafafa">
  <meta name="facebook-domain-verification" content="dxd2lz7usb9a1lkp79dajtjsdi2k3z" />
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5TFC7QM');</script>
<!-- End Google Tag Manager -->


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TFC7QM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


  <?= get_component('components', 'svg-defs') ?>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <?= get_component('components', 'cookie-announce') ?>
  <?php
  $headerType = get_field('header_footer_setting');?>
  <header class="sticky-top header header--home">
    <div class="header__inner">
      <?= get_component('components', 'toolbar', ['headerType' => $headerType, 'cssClass' => 'toolbar--home']) ?>
      <?= get_component('components', 'header-nav', ['cssClass' => 'header__nav--home ' . ($headerType ? $headerType : 'full')]) ?>
    </div>
  </header>