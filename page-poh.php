<?php
/*
Template Name: POH
*/

get_header(); ?>

<main class="content-page" id="main"><?php
  if ( have_rows('components') ):
    while ( have_rows('components') ): the_row();
      get_component('components', get_row_layout());
    endwhile;
  endif;?>
</main>
<?php get_footer(); ?>