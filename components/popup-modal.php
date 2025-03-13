<?php
$cookie_id = (get_sub_field('use_cookie') && get_sub_field('cookie_name')) ? preg_replace('/[^\w]+/', '_', get_sub_field('cookie_name')) : false;
$cookie_exp = (get_sub_field('cookie_name') && get_sub_field('cookie_expiration')) ? time() + get_sub_field('cookie_expiration') : 0;

if (($cookie_id && !isset($_COOKIE[$cookie_id])) || !get_sub_field('use_cookie') || !$cookie_id) {
    $button = get_sub_field('popup_cta_link');
    $popupimage = get_sub_field('popup_image'); ?>
    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" data-show="true" data-component="popup-modal"
        <?= $cookie_id ? 'data-cookie_id="'.$cookie_id.'"' : null ?>
        <?= ($cookie_id && $cookie_exp) ? 'data-cookie_expiration="'.$cookie_exp.'"' : null ?>>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header object-fit">
                    <?= get_component('components', 'image', ['image' => $popupimage, 'classes' => 'modal-header__img', 'default_size' => 'medium_large']) ?>
                    <!-- <img src="<?= $popupimage['url'] ?>" alt="" class="modal-header__img" /> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <?= get_component('components', 'svg',['icon' => 'close', 'title' => '', 'height' => 20, 'width' => 20, 'viewbox' => '0 0 20 20']) ?>
                    </button>
                </div>
                <div class="modal-body">
                    <h4><?= the_sub_field('popup_title'); ?></h4>
                    <p><?= the_sub_field('popup_description'); ?></p>
                    <?= ($button) ? get_component('components', 'link', array(
                'url' => $button['url'],
                'classes' => 'link--arrow',
                'title' => $button['title'],
                'html' => $button['title'],
                'target' => $button['target']
                )) : null ?>
                </div>
            </div>
        </div>
    </div><?php
}