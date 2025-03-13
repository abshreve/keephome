<?php
$title = (isset($title) && $title !== '') ? $title : 'Recent Posts';
$meta_query = (isset($meta_query)) ? $meta_query : false;

$args = [
	'posts_per_page' => 4,
	'post_type' => 'post',
	'post__not_in' => array(get_the_ID()),
	'order' => 'DESC',
	'orderby' => 'ID',
];

if($meta_query) {
	$args['meta_query'] = $meta_query;
}

$posts = get_posts($args);
?>

<div class="recent-posts" data-component="recent-posts">
	<div class="recent-posts__head">
		<span class="d-inline-block align-middle">
			<h3><?= $title ?></h3>
		</span>
		<span class="d-inline-block align-middle recent-posts_view-all-link">
			<h6 class="link">
				<a href="<?= get_permalink(295) ?>" class="cta-arrow">
					View All
				</a>
			</h6>
		</span>
	</div>

	<div class="recent-posts-slider">
		<?php foreach ($posts as $post):
			$category = get_the_category($post->ID);
			$thumb = get_field('thumbnail', $post->ID);
			if (empty($thumb)) continue;
			?>
		<div class="recent-post-slide">
			<div class="recent-post-slide__outer">
				<div class="recent-post-slide__inner d-flex flex-column">
					<a href="<?= get_the_permalink($post->ID) ?>">
						<img src="<?= $thumb['sizes']['post_thumbnail'] ?>" alt="<?= esc_attr($thumb['alt']) ?>" class="recent-post-slide__img">
					</a>
					<div class="recent-post-slide__text d-flex flex-column flex-fill">
						<?php if (!empty($category[0])): ?>
						<h6 class="link"><a href="/category/<?= $category[0]->slug ?>"><?= $category[0]->name ?></a></h6>
						<?php endif; ?>
						<h4 class="recent-post-slide__name bold flex-fill"><a href="<?= get_post_permalink($post->ID) ?>"><?= $post->post_title ?></a></h4>
						<h6 class="dates"><?= date("M j Y", strtotime($post->post_date)) ?></h6>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>