<?php
if ( have_rows('testimonial') ):
    $controls = '<div class="testimonial__controls glide__bullets" data-glide-el="controls[nav]">';
    $i = 0;
    while ( have_rows('testimonial') ){
        the_row();
        $controls .= '<button class="glide__bullet" data-glide-dir="='.$i.'"></button>';
        $i++;
    }
    $controls .= '</div>';
    if($i < 2){
        $controls = null;
    }?>
    <section class="testimonials" data-component="testimonials">
        <div class="container">
            <div class="testimonial-glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides"><?php
                        while ( have_rows('testimonial') ):
                            the_row();
                            $image = get_sub_field('image');?>
                            <li class="testimonials__slide glide__slide">
                                <div class="testimonials__slide-content">
                                    <div class="testimonials__copy-wrap">
                                        <div class="testimonials__copy">
                                            <span class="testimonials__subhead"><?= get_sub_field('subhead') ?></span>
                                            <h2 class="testimonials__header"><?= get_sub_field('header') ?></h2>
                                            <p class="testimonials__testimonial"><?= get_sub_field('copy') ?></p>
                                            <?= $controls ?>
                                        </div>
                                    </div>
                                    <!-- <img src="<?php echo $image['url']; ?>" class="testimonials__image" alt="<?php echo $image['alt'] ?>" /> -->
                                    <?= get_component('components', 'image', ['image' => $image, 'classes' => 'testimonials__image', 'default_size' => 'medium_large', 'srcset_sizes' => '(min-width: 992px) 50vw, 100vw']) ?>
                                </div>
                            </li><?php
                        endwhile;?>
                    </ul>
                </div>
            </div>
        </div>
    </section><?php
endif;?>
