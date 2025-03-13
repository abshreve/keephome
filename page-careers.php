<?php /* Template Name: Careers */ ?>

<?php get_header();
?>
<main class="content-page" id="main">
  <?php
  if (have_rows('components')) :
    while (have_rows('components')) : the_row();
      get_component('components', get_row_layout());
    endwhile;
  endif;
  ?>

  <div class="container" id="jobs-container">
    <div class="row">
      <div class="col-12">
        <div class="jobs-list"></div>
      </div>
    </div>
  </div>

</main>

<?php get_footer(); ?>