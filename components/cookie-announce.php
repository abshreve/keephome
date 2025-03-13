<?php
if (!isset($_COOKIE["accepts_cookies"])) {?>
    <div class="cookie-announce hidden" data-component="cookie-announce">
        <div class="cookie__content container">
            <div class="cookie__copy">
                <?= get_field('message', 'options') ?>
            </div>
            <button class="button btn--trans cookie__btn"><?= get_field('button_copy', 'options') ?></button>
        </div>
    </div><?php
}