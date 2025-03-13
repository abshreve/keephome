<?php
$link = get_sub_field('cta_1') ? get_sub_field('cta_1') : false;
$link2 = get_sub_field('cta_2') ? get_sub_field('cta_2') : false;
$link_type = ($link || $link2) ? get_sub_field('button_or_link') : null; ?>

<section class="text-content">
                <?= get_sub_field('text') ?>        
        <div class="row">

            <?php

            if ($link || $link2) {?>
                <div class="text-content__links text-content__links--<?=$link_type?> col-12 col-xl-8 offset-xl-2"><?php
                    if ($link_type === 'link') {?>
                        <?= ($link) ? get_component('components', 'link', array(
                            'url' => $link['url'],
                            'classes' => 'link--arrow',
                            'title' => $link['alt'] !== '' ? $link['alt'] : $link['title'],
                            'html' => $link['title'],
                            'target' => $link['target']
                        )) : null ?>
                        <?= ($link2) ? get_component('components', 'link', array(
                            'url' => $link2['url'],
                            'classes' => 'link--arrow',
                            'title' => $link2['alt'] !== '' ? $link2['alt'] : $link2['title'],
                            'html' => $link2['title'],
                            'target' => $link2['target']
                        )) : null ?><?php
                    } else {
                        if ($link) { ?><a href="<?= $link['url'] ?>" title="<?= $link['alt'] ? $link['alt'] : $link['title'] ?>" <?= (!empty($link['target'])) ? 'target="'.$link['target'].'"' : null ?> class="button btn--<?= get_sub_field('cta_1_color') ? get_sub_field('cta_1_color') : 'blue' ?>"><?= $link['title'] ?></a><?php }
                        if ($link2) { ?><a href="<?= $link2['url'] ?>" title="<?= $link2['alt'] ? $link2['alt'] : $link2['title'] ?>" <?= (!empty($link2['target'])) ? 'target="'.$link2['target'].'"' : null ?> class="button btn--<?= get_sub_field('cta_2_color') ? get_sub_field('cta_2_color') : 'blue' ?>"><?= $link2['title'] ?></a><?php }
                    }?>
                </div><?php
            }?>
        </div>
</section>