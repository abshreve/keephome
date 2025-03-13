<?php
$type = ($type) ? $type : get_sub_field('banner_type');
if(!isset($type)) $type =  'copy';
$image = ($image) ? $image : get_sub_field('image');
$cta = ($cta) ? $cta : get_sub_field('cta');
$section_classes = ($section_classes) ? $section_classes : false;
$mobile_image = ($mobile_image) ? $mobile_image : false;
$copy = ($copy) ? $copy : get_sub_field('copy');

if ($image) {

    switch($type){
        case 'copy':
            $topic = ($topic) ? $topic : get_sub_field('topic');
            $heading = ($heading) ? $heading : get_sub_field('heading');
        break;
        case 'quote':
            $attributiion = ($attributiion) ? $attributiion : get_sub_field('attribution');
        break;
        //  get_component('components', 'image', [
        //     'image' => $image,
        //     'classes' => $mobile_image ? ''feature-banner__img d-none d-sm-block' : 'feature-banner__img',
        //     'default_size' => 'medium_large',
        //     'srcset_sizes' => '(min-width: 992px) 50vw, 100vw'
        // ])
    }

    $image_html = '<figure class="feature-banner__image">';
    if($mobile_image){
        $image_html .= '<img src="'.$image['url'].'" alt="'.$image['alt'].'" class="feature-banner__img d-none d-sm-block" /><img src="'.$image['sizes']['post_thumbnail'].'" class="feature-banner__img  d-sm-none" alt="'.$image['alt'].'" /></figure>';
    } else { 
        $image_html .= '<img src="'.$image['url'].'" alt="'.$image['alt'].'" class="feature-banner__img" /></figure>';
    }?>

    <section class="feature-banner feature-banner--<?= $type ?> <?= $section_classes ?>">
        <div class="feature-banner__stripe"></div>
        <div class="feature-banner__container container-fluid"><?php
            echo ($type === 'copy') ? $image_html : null;?>
            <div class="feature-banner__content"><?php
                if($type === 'copy') {?>
                    <span class="feature-banner__topic"><?= $topic ?></span>
                    <h2 class="feature-banner__heading"><?= $heading ?></h2><?php
                } else {?>
                    <img class="feature-banner__svg" src="<?= get_stylesheet_directory_uri() ?>/images/icon-quote-pink.svg" alt=""/><?php
                }?>
                <span class="feature-banner__copy"><?= $copy ?></span><?php
                if($type === 'quote') {?>
                    <span class="feature-banner__attribution"><?= $attributiion ?></span><?php
                }
                if ($cta) {?>
                    <a href="<?= $cta['url'] ?>" <?= (!empty($cta['target'])) ? 'target="'.$cta['target'].'"' : null ?> class="feature-banner__cta button"><?= ($cta['label']) ? $cta['label'] : $cta['title'] ?></a><?php
                }?>
            </div>
            <?= ($type === 'quote') ? $image_html : null;?>
        </div>
    </section><?php
}