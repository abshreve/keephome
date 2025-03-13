<?php if ($headerType !== 'minimal'){ ?>
	<div class="toolbar <?= !empty($cssClass) ? $cssClass : '' ?>">
		<div class="toolbar__inner">
			<div class="toolbar-search">
				<button type="button" title="search the site" class="toolbar-search-btn toggle-search-btn">
					<img src="<?= get_image('search-icon.svg')?>" alt="">
				</button>
			</div><?php
			wp_nav_menu(array(
				'theme_location'  => 'toolbar-menu', // where it's located in the theme
				'container'       => '', // remove nav container
				'container_class' => '', // class of container
				// 'menu'            => __( 'The Main Menu', 'cu_textdomain' ), // nav name
				'menu_class'      => 'toolbar-items blog-menu', // adding custom nav class
			));?>
		</div>
	</div><?php
}
