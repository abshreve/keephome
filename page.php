<?php get_header(); ?>
<main class="content-page" id="main"><?php
  if ( have_rows('components') ):
    while ( have_rows('components') ): the_row();
      // echo '<h1>'.get_row_layout().'</h1>';
      get_component('components', get_row_layout());
    endwhile;
  endif;?>
</main>
<?php get_footer(); ?>
