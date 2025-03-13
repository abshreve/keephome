<?php
$link = get_sub_field('link');
$link2 = get_sub_field('link_2');
$alignment = get_sub_field('alignment');
$bk_color = (get_sub_field('add_stripe')) ? get_sub_field('stripe_color') : '#FFE7DD'?>

<div class="content-banner <?= (get_sub_field('add_stripe')) ? 'content-banner--stripe' : null?>"><?php
	if (get_sub_field('add_stripe')) {?>
		<div class="content-banner__stripe" style="background-color:<?= $bk_color?>;"></div><?php
	}?>
	<div class="content-banner__inner container-fluid">
		<div class="content-banner__image content-banner__div<?= $alignment === 'right' ? ' content-banner__image--right' : '' ?>">
			<?= get_component('components', 'image', [
				'image' => get_sub_field('image')
			]) ?>
		</div>
		<div class="content-banner__text content-banner__div<?= $alignment === 'right' ? ' content-banner__text--left' : '' ?>">
			<h2 class="content-banner__title"><?= the_sub_field('title') ?></h2>
			<?= (get_sub_field('subtitle')) ? '<h3 class="h4 bold content-banner__subtitle">'.get_sub_field('subtitle').'</h3>' : null ?>
			<div class="content-banner__desc"><?= the_sub_field('textarea')?></div><?php
			if ($link || $link2) {?>
				<div class="content-banner__links">
					<?= ($link) ? get_component('components', 'link', array(
						'url' => $link['url'],
						'classes' => 'link--arrow',
						'title' => $link['alt'] !== '' ? $link['alt'] : $link['title'],
						'html' => $link['title'],
						'target' => $link['target']
					)) : null ?>
					<?= ($link2) ? get_component('components', 'link', array(
						'url' => $link2['url'],
						'classes' => 'link--arrow',
						'title' => $link2['alt'] !== '' ? $link2['alt'] : $link2['title'],
						'html' => $link2['title'],
						'target' => $link2['target']
					)) : null ?>
				</div><?php
			}?>
		</div>			
	</div>
</div>