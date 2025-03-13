<?php
$category = $category ? $category : null; // full category object
$display = $display ? $display : 'full';
$image = $image ? $image : null;
$container_classes = ($display === 'full') ? ' col-lg-4' : ' col-lg-6';
$url = $url ? $url : '';
$title = $title ? $title : '';
$description = $description ? $description : '';
$date = $date ? $date : '';?>

<div class="col-12 post-col <?= $container_classes ?>">
  <div class="post-card <?= $display ?>">

    <?= ($display == 'half') ? '<div class="image-col">' : null ?> 
    <!-- if (post.thumb && post.thumb.sizes.post_thumbnail) {
      ret += '<a href="' + post.url + '">'
      ret += '<img src="' + post.thumb.sizes.post_thumbnail + '" alt="' + post.thumb.alt.replace(/\"/g, '\\"') + '" >
      ret += '</a>'
    } --><?php
    if($image) {
      echo '<a href="'. $url .'">';
      echo get_component('components', 'image', [
        'image' => $image,
        'default_size' => 'medium',
        'srcset_sizes' => '(min-width: 992px) 50vw, 100vw'
      ]);
      echo '</a>';
    }?>
    <?= ($display == 'half') ? '</div><div class="content-col">' : null ?> 
    <?= $category ? '<div class="category"><a href="/'.$category->slug.'">'.$category->cat_name.'</a></div>' : null ?>
    <h4 class="bold"><a href="<?= $url ?>"><?= $title ?></a></h4>
    <div class="description"><p><?= $description ?></p></div>
    <div class="date"><?= $date ?></div>
  </div>
</div>