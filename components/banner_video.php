<?php
$type = get_sub_field('type');
$url = get_sub_field('url');?>

<section class="banner-video" data-component="banner-video">
    <div class="banner-video__embed-container container" data-type="<?= $type ?>" data-url="<?= $url ?>"><?php
        if($type === 'youtube') {?>
            <div class="banner-video__yt-container">
                <?= get_sub_field('embed'); ?>
            </div><?php
        }?>
    </div>
</section>
