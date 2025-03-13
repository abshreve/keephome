<?php
function get_image($file) {
  return get_stylesheet_directory_uri() . '/images/' . $file; 
}

// NOTE: when using this, use data-component="image-bk" on the element using the bk image to enable js switching of images on resize
function get_bk_image_set($image, $default_size = 'medium_large') {
  if (empty($image)) return false;
  $sizes = ['medium_large', 'large', 'full'];
  $image_attrs = '';

  if( is_array($image) ) {
    $id = $image['ID'];
    $img = wp_get_attachment_image_src( $id, $default_size )[0];
    $default_image = 'style="background-image: url(\''.$img.'\');"';
  } elseif (is_numeric($image)) {
    $id = $image;
    $default_image = 'style="background-image: url(\''.wp_get_attachment_image_src( $id, $default_size )[0].'\');"';
  } else {
    // return a plain style for one image
    return 'style="background-image: url(\''.$image.'\');"';
  }
  
  // loop thru the sizes and add them to the output
  for ($i = 0; $i < count($sizes); $i++) {
    $img = wp_get_attachment_image_src( $id, $sizes[$i] )[0];
    $image_attrs .= ' data-bk-'.$sizes[$i].'="'.$img.'"';
  }

  return $image_attrs.' '.$default_image;
}