<?php
if (have_rows('cards')) { ?>
    <section class="tools-tips">
        <div class="tools-tips__container container"><?php
            while (have_rows('cards')) {
                the_row();
                get_component('components', 'card', array(
                    'image' => get_sub_field('image'),
                    'heading' => get_sub_field('header'),
                    'copy' => get_sub_field('copy')
                ));
            }?>
        </div>
    </section><?php
}
