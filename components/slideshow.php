<?php
if(have_rows('slides')) {?>
    <section class="slideshow" data-component="slide-show">
        <div class="slideshow__stripe"></div>
        <div class="container">
            <div class="slideshow-glide">
                <div class="slideshow__wrap glide__track" data-glide-el="track">
                    <ul class="glide__slides"><?php
                        if(have_rows('slides')) {
                            while(have_rows('slides')) {
                                the_row();
                                $img = get_sub_field('image');
                                if($img) {?>
                                    <li class="slideshow__slide glide__slide">
                                        <div class="slide__content">
                                            <!-- <img src="<?= $img['url'] ?>" alt="<?= $img['name'] ?>" class="slide__image"/> -->
                                            <?= get_component('components', 'image', ['image' => $img, 'classes' => 'slide__image', 'default_size' => 'medium_large', 'srcset_sizes' => '(min-width: 992px) 75vw, 90vw']) ?><?php
                                            if(get_sub_field('content')) {?>
                                                <div class="slide__copy-wrap">
                                                    <span class="slide__copy h2"><?= get_sub_field('content') ?></span>
                                                </div><?php
                                            }?>
                                        </div><?php
                                        if(get_sub_field('caption')) {?>
                                            <span class="slide__caption"><?=get_sub_field('caption') ?> setup</span><?php
                                        }
                                        if(get_sub_field('content')) {?>
                                            <div class="slide__copy-wrap">
                                                <span class="slide__copy h2"><?= get_sub_field('content') ?></span>
                                            </div><?php
                                        }?>
                                    </li><?php
                                }
                            }
                        } ?>
                    </ul>

                    <div class="slideshow__controls glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="<?= get_stylesheet_directory_uri().'/images/slideshow-prev.svg' ?>" class="controls__icon" alt="" /></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="<?= get_stylesheet_directory_uri().'/images/slideshow-next.svg' ?>" class="controls__icon" alt="" /></button>
                    </div>
                </div>
            </div>
        </div>
    </section><?php
}