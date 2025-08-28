<?php
wp_nav_menu( array(
  'theme_location'  => 'footer-menu', // where it's located in the theme
  'container'       => '', // remove nav container
  'container_class' => '', // class of container
  'menu'            => __( 'The Footer Menu', 'cu_textdomain' ), // nav name
  'menu_class'      => 'footer-nav', // adding custom nav class

));?>