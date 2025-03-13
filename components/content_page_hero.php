<div class="content-page-hero">
	<div class="content-page-hero__inner">
		<!-- style="background-image: url('<?= get_sub_field('image') ?>');" -->
		<div class="content-page-hero__image d-flex flex-column align-items-center justify-content-end"  <?= get_bk_image_set(get_sub_field('image')) ?>>
			<div class="content-page-hero__title">
				<h1 class="teal text-center"><?= get_sub_field('title') ?></h1>
			</div>
		</div>
	</div>
	<div class="content-page-hero__content">
		<h2 class="h4 content-page-hero__subtitle bold"><?= get_sub_field('subtitle') ?></h2>
		<p><?= get_sub_field('textarea') ?></p>
	</div>
</div>
