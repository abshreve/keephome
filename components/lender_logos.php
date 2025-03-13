<?php
$title = get_sub_field('title');
$logos = get_sub_field('logos');
?>
<section class="lender-logos-component">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 img-container">
        <h3><?= $title ?></h3>
      </div>
      <?php foreach ($logos as $logo) : ?>
        <div class="col-12 col-lg-3 img-container">
          <?php if (!empty($logo['url'])) : ?>
            <a href="<?= $logo['url'] ?>" target="_blank">
            
          <?php endif; ?>
          <!-- <img src="<?= $logo['logo']['sizes']['logo'] ?>" alt="<?= !empty($logo['logo']['alt']) ? esc_attr($logo['logo']['alt']) : '' ?>"> -->
          <?= get_component('components', 'image', ['image' => $logo['logo']]) ?>
          <?php if (!empty($logo['url'])) : ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>