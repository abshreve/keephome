<?php
/* Template Name: Blog Landing */

get_header();
$heading = get_field('heading');
$post_type = get_field('type_of_posts');
$featured = get_field('heading_hero_post') ?>

<main class="content-page" id="main"><?php
  get_component('components', 'blog-title-bar', array(
    'title' => get_the_title()
  ));

  if ($post_type == 'post') { ?>
    <div class="categories">
      <div class="container">
        <div class="row">
         <div class="col-12"> <?php
            $categories = get_categories(); ?>
            <div class="current mobile-category-selector d-lg-none">Latest Articles <button class="toggle-categories" aria-expanded="false" aria-haspopup="true" aria-controls="category-list">Toggle</button></div>
            <ul id="category-list">
            <li class="current d-none d-lg-inline-block"><a href="<?= get_permalink(295) ?>">Latest Articles</a></li><?php
              foreach ($categories as $cat) {
                if ($cat->term_id == 1) continue; // skip uncategorized ?>
                <li><a href="<?= get_category_link($cat->term_id) ?>"><?= $cat->name ?></a></li>  <?php
              }?>
            </ul>
          </div>
        </div>
      </div>
    </div><?php
  }
  if ($featured) {
    get_component('components', 'hero-post', array(
      'topic' => 'Featured',
      'image' => $heading['image'],
      'mobile_image' => true,
      'image_alt' => esc_attr($heading['image']['alt']),
      'section_classes' => 'blog-top '.$heading['style'],
      'type' => 'copy',
      'copy' => limit_text(get_field('description', $featured->ID)),
      'heading' => get_the_title($featured->ID),
      'cta' => array(
        'url' => get_the_permalink($featured->ID),
        'title' => get_the_title($featured->ID),
        'label' => 'Read More'
      )
    ));
  }?>

  <div class="load-posts" data-display="full" data-offset="0" data-limit="6" data-featured="all" data-post-type="<?= $post_type ?>">
    <div class="container">
      <div class="post-list row"></div>
      <button class="load-more button">Load More</button>
    </div>
  </div>

</main>

<?php get_footer(); ?>
