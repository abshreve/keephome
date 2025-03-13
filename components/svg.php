<?php
$viewbox = (isset($viewbox)) ? $viewbox : '0 0 35 35';
$height = (isset($height)) ? $height : 35;
$width = (isset($width)) ? $width : 35;
$title = (isset($title)) ? $title : $icon;

if ($icon) { ?>
  <svg viewBox="<?= $viewbox ?>" class="icon icon--svg icon-<?= $icon ?>" height="<?= $height ?>px" width="<?= $width ?>px">
    <title><?=$title ?></title>
    <use xlink:href="#<?= $icon ?>"></use>
  </svg><?php
}