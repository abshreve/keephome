<?php
$tag = get_queried_object();

if (empty($tag)) {
  wp_redirect('/blog');
}
get_header();

$recommended_posts = new WP_Query([
  'posts_per_page' => 1,
  'tag_id' => $tag->term_id,
  'post_type' => 'post',
  'order' => 'DESC',
  'orderby' => 'ID',
  'meta_query' => [
    'relation' => 'AND',
    [
      'key' => 'recommended_for_category',
      'value' => '1',
      'compare' => '=',
    ]
  ]
]);?>

<main class="content-page">
  <?= get_component('components', 'blog-title-bar', array(
    'title' => "What&#8217;s New"
  ))?>

  <div class="category-description">
    <p><?= $tag->description ?></p>
  </div>

  <div class="load-posts" data-category="0" data-tag="<?= $tag->term_id ?>" data-display="full" data-offset="0" data-limit="3" data-featured="only">
    <div class="container">
      <div class="post-list row"></div>
      <button class="load-more button">Load More</button>
    </div>
  </div><?php

  wp_reset_query();

  if ($recommended_posts->have_posts()) {
    while ($recommended_posts->have_posts()) {
      $recommended_posts->the_post();
      $image = get_field('recommended_post_image');
      if (!empty($image)) {
        get_component('components', 'feature_banner', array(
          'topic' => 'Recommended Post',
          'image' => $image,
          'mobile_image' => true,
          'image_alt' => esc_attr($image['alt']),
          'section_classes' => 'recommended-post '.$heading['style'],
          'type' => 'copy',
          'copy' => limit_text(get_field('description')),
          'heading' => get_the_title(),
          'cta' => array(
            'url' => get_the_permalink(),
            'title' => get_the_title(),
            'label' => 'Read More'
          )
        ));
      }
    }
  }

  wp_reset_query();?>

  <div class="load-posts" data-category="0" data-tag="<?= $tag->term_id ?>" data-display="half" data-offset="0" data-limit="6" data-featured="exclude">
    <div class="container">
      <div class="post-list row"></div>
      <button class="load-more button">Load More</button>
    </div>
  </div>

</main>

<?php get_footer(); ?>