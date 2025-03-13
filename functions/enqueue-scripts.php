<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Enqueue Scripts And Styles:
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', function () {
  if (!is_admin()) {

    wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/main.css' );

    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
}, 999 );

add_action( 'admin_enqueue_scripts', function () {
  wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/css/admin.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/js/main-admin.js', array(), '1.0.0', true );
});