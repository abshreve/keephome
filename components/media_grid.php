<?php
$images = get_sub_field('images');

if (!empty($images)) : ?>
  <section class="media-grid-component">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-10 offset-xl-1">
          <div class="row"><?php
            foreach ($images as $image) : ?>
              <div class="col-6 col-lg-3 img-container">
                <?= get_component('components', 'image', ['image' => $image['image'], 'default_size' => 'media_grid']) ?>
                <!-- <img src="<?= $image['image']['sizes']['media_grid'] ?>" alt="<?= !empty($image['alt']) ? esc_attr($image['alt']) : '' ?>"> -->
              </div><?php
            endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>