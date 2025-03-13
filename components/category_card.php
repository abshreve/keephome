<?php
$image_mobile = get_sub_field('mobile_image');
$image_desktop = get_sub_field('desktop_image');
$cta = get_sub_field('cta'); ?>

<div class="category-card">
    <div class="container">
        <div class="category-card__inner">
            <div class="category-card__image">
                <?= get_component('components', 'image', [
                    'image' => $image_mobile,
                    'classes' => 'category-card__image--mobile'
                ]) ?>
                <?= get_component('components', 'image', [
                    'image' => $image_desktop,
                    'classes' => 'category-card__image--desktop'
                ]) ?>
            </div>
            <div class="category-card__content-wrap">
                <div class="category-card__title">
                    <h3><?= get_sub_field('title') ?></h3>
                </div>
                <div class="category-card__content">
                    <?= get_sub_field('content') ?>
                </div>
                <?= ($cta) ? get_component('components', 'link', array(
                    'url' => $cta['url'],
                    'classes' => 'link--arrow',
                    'title' => $cta['title'],
                    'html' => $cta['title'],
                    'target' => $cta['target']
                )) : null ?>
            </div>
        </div>
    </div>
</div>
