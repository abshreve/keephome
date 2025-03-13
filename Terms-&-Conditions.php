<?php
/*
Template Name: Terms and Privacy
*/
?>
<?php get_header('home'); ?>
<main class="content-terms-and-privacy">
  <div class="page_title_div">
    <h1 class="page_title"><?php wp_title(''); ?></h1>
  </div>

  <?php if (get_field('show_toggle')) : ?>
    <div class="input-button">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitches">
        <label class="custom-control-label legal_label" for="customSwitches">The Legal Jargon Version</label>
        <label class="custom-control-label plain_english_label" for="customSwitches">The Plain English Version</label>
      </div>
    </div>
  <?php endif; ?>

  <div class="text-content legal">
    <?= get_field('legal_content') ?>
  </div>

  <div class="text-content plain_english">
    <?= get_field('plain_english_content') ?>
  </div>

</main>

<?php get_footer(); ?>