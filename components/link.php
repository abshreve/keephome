<?php
$url = ($url) ? $url : null;
$classes = 'link '.$classes;
$html = ($html) ? $html : null;
$target = ($target) ? $target : false;
$title = ($title) ? $title : '';

if ($url && $html) { ?>
  <span class="link__wrap"><a href="<?= $url ?>" <?= ($target) ? 'target="'.$target.'"' : null ?> class="<?= $classes ?>" title="<?= $title ?>"><?= $html ?></a></span><?php
}