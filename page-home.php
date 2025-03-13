<?php
/*
Template Name: Home
*/

get_header('home'); ?>

<main class="content-home" id="main"><?php
  if (have_rows('components')):
    while (have_rows('components')): the_row();
      get_component('components', get_row_layout());
    endwhile;
  endif; ?>
</main>

<?php get_footer(); ?>
