<?php
$srcset_sizes = !empty($srcset_sizes) ? $srcset_sizes : null;
$alt = !empty($alt) ? $alt : '';

if (!empty($classes)){
  $class .= ' '.$classes;
}
if (!empty($cover)) {
  $class .= ' image--cover';
}
if (!empty($contain)) {
  $class .= ' image--contain';
}
if (!empty($top)) {
  $class .= ' image--top';
}
if (!empty($content)) {
  $class .= ' image--content';
}
if (empty($default_size)) {
  $default_size = '';
}
if (empty($attributes)) {
  $attributes = '';
}?>

<figure class="image <?= $class ?>" data-component="image" <?= $attributes; ?>><?php
  if (!empty($image)) {
    if( is_array($image) ) {
      $id = $image['ID'];
      $img = wp_get_attachment_image_src( $id, $default_size )[0];
    } elseif (is_numeric($image)) {
      $id = $image;
      $img = wp_get_attachment_image_src( $id, $default_size )[0];
    } else {
      $id = null;
      $img = $image;
    }

    if ( !empty( $id ) && empty( $alt ) ) {
      $alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    }

    if ( empty( $img ) ) {
      return;
    }

    $srcset = wp_get_attachment_image_srcset($id, $default_size) ? wp_get_attachment_image_srcset($id, $default_size) : $img; ?>
    <img src="<?= $img ?>" class="<?= $class ?>" srcset="<?= $srcset ?>" alt="<?= $alt?>" <?= $img !== $srcset ? 'sizes="'.$srcset_sizes.'"' : null ?>/><?php
  }

  if (!empty($content)) {
    echo $content;
  }?>
</figure>
