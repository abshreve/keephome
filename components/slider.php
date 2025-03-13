<?php
$slides = get_sub_field('slides');

if (!empty($slides)) : ?>
  <section class="slider-component">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-10 offset-xl-1">
          <div class="slider">
            <?php foreach ($slides as $slide) : ?>
              <div class="slide">
                <!-- <img src="<?= $slide['image']['sizes']['component_slide'] ?>" alt="<?= !empty($slide['alt']) ? $slide['alt'] : '' ?>"> -->
                <?= get_component('components', 'image', ['image' => $slide['image'], 'classes' => 'hero-post__image', 'default_size' => 'medium_large', 'srcset_sizes' => '(min-width: 992px) 85vw, 100vw']) ?>
                <p class="caption">
                  <?= $slide['caption'] ?>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if (!empty($title)):
            $title_tag = (!empty($is_h1)) ? 'h1' : 'h2'; ?>
            <div class="title-wrapper">
              <?= '<'.$title_tag.' class="h2">'.$title.'</'.$title_tag.'>' ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>