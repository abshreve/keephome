<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$posts = get_sub_field('posts');
?>

<div class="recommended-posts recent-posts">
	<div class="posts__stripe"></div>
	<div class="container">
		<div class="recent-posts-stacked row">
			<div class="col-12">
				<h3><?= $title ?></h3>
				<?php if (!empty($description)): ?>
					<p><?= $description ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="recent-posts-stacked row">
			<?php foreach ($posts as $post) :
				$category = get_the_category($post->ID);
				$thumb = get_field('thumbnail', $post->ID);
				if (empty($thumb)) continue;
				?>
				<div class="recent-post-slide col-12 col-lg-4">
					<div class="recent-post-slide__outer">
						<div class="recent-post-slide__inner d-flex flex-column">
							<a href="<?= get_the_permalink($post->ID) ?>">
								<?= get_component('components', 'image', ['image' => $thumb, 'classes' => 'recent-post-slide__img', 'default_size' => 'post_thumbnail', 'srcset_sizes' => '(min-width: 768px) 35vw, 100vw']) ?>
								<!-- <img src="<?= $thumb['sizes']['post_thumbnail'] ?>" alt="<?= esc_attr($thumb['alt']) ?>" class="recent-post-slide__img"> -->
							</a>
							<div class="recent-post-slide__text d-flex flex-column flex-fill">
								<?php if (!empty($category[0])) : ?>
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
</div>