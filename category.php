<?php
get_header();
global $post;

$slug = explode('/', $_SERVER['REQUEST_URI']); // we can use this to find the current category (returns as array)
$slug = $slug[sizeof($slug) - 1];
$category = get_category_by_slug( $slug );
$excluded = [];
// top query (3 recents)
$featured_posts = new WP_Query([
  'posts_per_page' => 3,
  'category_name' => $category->slug,
  'post_type' => ['post', 'press_release'],
  'meta_query' => [
    'relation' => 'AND',
    [
      'key' => 'featured_post',
      'value' => '1',
      'compare' => '=',
    ],
    [
      'key' => 'recommended_for_category',
      'value' => '1',
      'compare' => '!=',
    ]
  ]
]);

// middle query (banner)
$recommended_post = new WP_Query([
  'posts_per_page' => 1,
  'category_name' => $category->slug,
  'post_type' => ['post', 'press_release'],
  'meta_query' => [
    'relation' => 'AND',
    [
      'key' => 'recommended_for_category',
      'value' => '1',
      'compare' => '=',
    ],
    [
      'key' => 'featured_post',
      'value' => 1,
      'compare' => '!=',
    ]
  ]
]);

$categories = get_categories(); ?>

<main class="content-category">
  <?= get_component('components', 'blog-title-bar', array(
    'title' => "What&#8217;s New"
  )) ?>

  <div class="categories">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="current mobile-category-selector d-lg-none"><?= $category->name ?> <button class="toggle-categories" aria-expanded="false" aria-haspopup="true" aria-controls="category-list">Toggle</button></div>
          <ul id="category-list">
            <li><a href="<?= get_permalink(295) ?>">Latest Articles</a></li><?php
            foreach ($categories as $cat) {
              if ($cat->term_id == 1) continue; // skip 'uncategorized' ?>
              <li class="<?= $cat->term_id == $category->term_id ? 'current d-none d-lg-inline-block' : '' ?>"><a href=" <?= get_category_link($cat->term_id) ?>"><?= $cat->name ?></a></li><?php
            } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="category-description">
    <?= $category->description ?>
  </div>
  <?php
  
  if ($featured_posts->have_posts()) {?>
    <!-- This area will only show posts that have the 'featured_post' flag on and the 'recommended_for_category' flag off (calls go to 'mu-plugins/AjaxController.php) -->
    <!-- <div class="load-posts" data-category="<?= $category->term_id ?>" data-display="full" data-offset="0" data-limit="3" data-featured="only" data-post-type="post,press_release"> -->
      <div class="container">
        <div class="post-list row"><?php
        
          while ($featured_posts->have_posts()) {
            $featured_posts->the_post();
            echo get_component('components', 'post-card', [
              'image' => get_field('thumbnail'),
              'title' => get_the_title(),
              'description' => get_field('description'),
              'url' => get_the_permalink(),
              'category' => $category,
              'display' => 'full',
              'date' => get_the_date('M d Y')
            ]);
            $excluded[] = get_the_id();
          }?>

        </div>
      </div>
    </div><?php
  }

  if ($recommended_post->have_posts()) {
    while ($recommended_post->have_posts()) {
      $recommended_post->the_post();
      $excluded[] = get_the_id();
      $image = get_field('recommended_post_image');
      get_component('components', 'feature_banner', array(
        'topic' => 'Recommended',
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
  wp_reset_query(); ?>

  <!-- This area will only load posts that have neither the 'featrued_post' flag nor the 'recommended_for_category' flag on (calls go to 'mu-plugins/AjaxController.php) -->
  <div class="load-posts" data-category="<?= $category->term_id ?>" data-display="half" data-offset="0" data-limit="6" data-featured="all" data-not="<?= count($excluded) > 0 ? implode(',', $excluded) : null ?>" data-post-type="post,press_release">
    <div class="container">
      <div class="post-list row"></div>
      <button class="load-more button">Load More</button>
    </div>
  </div>

</main>

<?php get_footer(); ?>