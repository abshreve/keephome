<?php
get_header();

//  set up the  'back' url (http_referer exists, url_to_postid() returned an actual ID and link is not to the admin)
$prev_id = (isset($_SERVER['HTTP_REFERER']) && !strpos($_SERVER['HTTP_REFERER'], 'wp-admin')) ? url_to_postid($_SERVER['HTTP_REFERER']) : false;
$prev_id = ($prev_id && get_post_type($prev_id) !== 'authors') ? $prev_id : false;?>

<main class="content-author"><?php
  if($prev_id) {?>
    <div class="author__backbar">
      <div class="container">
        <a href="<?= get_the_permalink($prev_id) ?>" class="backbar__link link"><?= get_component('components', 'svg', array('icon' => 'angle-left', 'height' => 20, 'width' => 15, 'viewbox' => '0 0 10 20')) ?> Back to Post</a>
      </div>
    </div><?php
  }?>

  <article class="author__profile">
    <div class="container">
      <figure class="author__image">
        <?= the_post_thumbnail('author-single-post', ['class' => 'author__img']) ?>
      </figure>
      <div class="author__content">
        <div class="author__title">
          <h1><?= get_the_title() ?></h1>
        </div>
        <?= the_content() ?>
      </div>
    </div>
  </article>
  
  <!-- get recent posts where post meta 'author' (whatever its called in the post editor) === this post ID -->
  <?= get_component('components', 'recent_posts', array(
    'title' => get_field('author_first_name').'\'s Recent Posts',
    'meta_query' => [
      [
        'key' => 'author',
        'value' => get_the_ID(),
        'compare' => '=',
      ]
    ]
  )); ?>
</main>

<?php get_footer(); ?>