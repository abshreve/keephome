<?php
get_header();
$post_type = get_post_type();
$category = get_the_category(get_the_ID());
$heading_cmp = get_field('component');
$ad_image = get_field('sidebar_ad_image');
$ad_mobile_image = get_field('sidebar_ad_mobile_image');
$url = get_field('sidebar_ad_link_url');

if (!empty($category[0])) {
  $category = $category[0];
}

$prev_post = get_previous_post();
$next_post = get_next_post(); ?>

<main class="content-page">
  <?= get_component('components', 'blog-title-bar', array(
    'title' => ($post_type === 'post') ? 'Blog' : 'Press and Media',
    'left_link' => ($prev_post) ? array(
      'title' => $prev_post->post_title,
      'label' => 'Previous Press Release',
      'url' => get_the_permalink($prev_post->ID),
    ) : null,
    'right_link' => ($next_post) ? array(
      'title' => $next_post->post_title,
      'label' => 'Next Press Release',
      'url' => get_the_permalink($next_post->ID),
    ) : null
  )) ?>

  <div class="heading-component <?= !empty($heading_cmp[0]['acf_fc_layout']) ? $heading_cmp[0]['acf_fc_layout'] : '' ?>"><?php
    if (have_rows('component')) :
      while (have_rows('component')) : the_row();
        get_component('components', get_row_layout(), ['is_h1' => true, 'title' => get_the_title()]);
      endwhile;
    endif;?>
  </div>
  
  <div class="post-date container">
    <div class="row">
      <div class="col-12 col-xl-8 offset-xl-2">
        <span class="single__date single__date--desktop"><?= date("M j Y", strtotime(get_the_date())) ?></span>
      </div>
    </div>
  </div>

  <div class="post-components">    
    <article class="post__content"><?php
      if (have_rows('components')) {
        while (have_rows('components')) { the_row();
          get_component('components', get_row_layout());
        }
      }?>
    </article>

    <aside class="post-details"><?php      
      if (!empty($ad_mobile_image)) { ?>
        <div class="sidebar-ad sidebar-ad--mobile">
            <a href="<?= $url ?>" class="sidebar-ad__link"><img class="sidebar-ad__img sidebar-ad__img--mobile" src="<?= $ad_mobile_image['url'] ?>" alt="<?= esc_attr($ad_mobile_image['alt']) ?>"></a>
        </div><?php
      }

      if (!empty($ad_image)) { ?>
        <div class="sidebar-ad sidebar-ad--desktop">
          <a href="<?= $url ?>" class="sidebar-ad__link"><img class="<?= (!empty($ad_mobile_image)) ? 'sidebar-ad__img sidebar-ad__img--desktop' : null ?>" src="<?= $ad_image['url'] ?>" alt="<?= esc_attr($ad_image['alt']) ?>"></a>
        </div><?php
      } ?>

      <div class="detail-row"><?php
        $author = get_field('author');

        if (!empty($author)) {
          $author_image = get_the_post_thumbnail_url($author->ID, 'thumbnail');?>
          <a href="<?= get_the_permalink($author) ?>" class="author"><?php
            if (!empty($author_image)) { ?>
              <div class="thumbnail">
                <img src="<?= $author_image ?>" alt="<?= esc_attr(get_the_title($author)) ?>">
              </div><?php
            } ?>
            <div class="name">
              <?= get_the_title($author) ?>
            </div>
            <span class="single__date single__date--mobile"><?= date("M j Y", strtotime(get_the_date())) ?></span>
          </a><?php
        }
        
        if (get_the_tag_list()) { ?>
          <div class="tags">
            <h6 class="dates">Tags</h6>
            <?= get_the_tag_list('<p>', ', ', '</p>') ?>
          </div><?php
        }?>
      </div>
    </aside>
  </div><?php

  if ($post_type === 'post') {
    get_component('components', 'recent_posts');
  } ?>
</main>

<?php get_footer(); ?>