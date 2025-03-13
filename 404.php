<?php get_header(); ?>

<?php
// ACF variables set in the 404 options page.
// $title = get_field('four04_title', 'option');
// $content = get_field('four04_content', 'option');
?>

<main class="content-page">
  <?= get_component('components', '404-page') ?>
</main>

<?php get_footer(); ?>
