<?php
$type = (!empty($type)) ? $type : 'normal';
$image = (!empty($image)) ? $image : null;
$heading = (!empty($heading)) ? $heading : null;
$copy = (!empty($copy)) ? $copy : null; ?>

<article class="card card--<?= $type ?>">
    <div class="card__inner"><?php
        if($image) {?>
            <!-- <figure class="card__image">
                <img class="card__img" alt="<?= $image['name'] ?>" src="<?= $image['url'] ?>"/>
            </figure> -->
            <?= get_component('components', 'image', ['image' => $image, 'classes' => 'card__image']) ?><?php
        }?>
        <div class="card__copy-wrap">
            <?= ($heading) ? '<h3 class="card__h3">'.$heading.'</h3>' : null ?>
            <?= ($copy) ? '<p class="card__p">'.$copy.'</p>' : null ?>
        </div>
    </div>
</article>
