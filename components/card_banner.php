<?php

if (have_rows('cards')) { ?>
    <section class="card-banner" data-component="card-banner">
        <div class="container">
            <div class="card-banner__inner"><?php
                while( have_rows('cards')) {
                    the_row();
                    $image = get_sub_field('image');?>
                    <div class="card-banner__card <?= (get_sub_field('copy')) ? 'slide-in' : null ?>">
                        <div class="card-banner__card-inner">
                            <?= get_component('components', 'image', ['image' => $image, 'classes' => 'card-banner__image']) ?>
                            <div class="card-banner__content-wrap">
                                <h3 class="card-banner__title"><?= get_sub_field('title') ?></h3>
                                <h4 class="card-banner__label"><?= get_sub_field('label') ?></h4>
                            </div><?php
                            if(get_sub_field('copy')) {?>
                                <div class="card-banner__slide-in">
                                    <img class="slide-in__svg" src="<?= get_stylesheet_directory_uri() ?>/images/icon-quote.svg" alt=""/>
                                    <div class="slide-in__copy"><span class="p"><?= get_sub_field('copy') ?></span></div>
                                </div><?php
                            }?>
                        </div>
                    </div><?php
                }?>
            </div>
        </div>
    </section><?php
}
