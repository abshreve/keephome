<?php
$intro = get_sub_field('intro');
$img = get_sub_field('background_image');
$btnText = get_sub_field('submit_button_text');
$redirectUrl = get_sub_field('thank_you_page');


get_component('components', 'hero-post', array(
  'topic' => '',
  'image' => $img,
  'image_alt' => esc_attr($img['alt']),
  'section_classes' => '',
  'type' => 'form',
  'copy' => $intro,
  'heading' => get_the_title($featured->ID),
  'cta' => array(
    'url' => $redirectUrl,
    'title' => get_the_title($featured->ID),
    'label' => $btnText
  )
));