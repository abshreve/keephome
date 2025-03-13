<?php
$font_scale = (isset($_COOKIE["font_scale"])) ? $_COOKIE["font_scale"] : null ?>
<div class="font-scaler" data-component="font-scaler">
    <img class="font-scaler__label" alt="click to scale the sites type smaller/larger" src="<?= get_stylesheet_directory_uri() ?>/images/icon-font-scale.svg" />
</div>