<div class="landing-page-hero">
	<div class="landing-page-hero__img-container">
		<?= get_component('components', 'image', ['image' => get_sub_field('hero_image'), 'class' => 'landing-page-hero__image', 'default_size' => 'small', 'srcset_sizes' => '100vw']) ?>
	</div>
	<div class="landing-page-hero__inner">
		<div class="landing-page-hero__container-fluid container-fluid">
			<h1 class="teal text-center text-lg-left">
				<?php the_sub_field('title') ?>
			</h1>
			<div class="row landing-page-hero__content">
				<div class="col-12 col-lg-6 order-lg-1">
					<img src="<?php the_sub_field('secondary_image') ?>" class="landing-page-hero__secondary-image" alt="">
					<!-- <?= get_component('components', 'image', ['image' => get_sub_field('secondary_image'), 'class' => 'landing-page-hero__secondary-image', 'default_size' => 'small']) ?> -->
				</div>
				<div class="col-12 col-lg-6">
					<div class="landing-page-hero__text">
						<h2 class="h4 bold mb-3"><?php the_sub_field('subtitle') ?></h2>
						<p><?php the_sub_field('textarea') ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>