<?php
// include composer packages
require_once( 'vendor/autoload.php' );
// Post Types, taxonomies, more
require_once( 'functions/class-init.php' );
new ThemeInit();

// Add ACF JSON Support
require_once( 'functions/acf/acf-json.php');
// Enqueue scripts and styles.
require_once( 'functions/enqueue-scripts.php' );
// Login screen modifications.
require_once( 'functions/login.php' );
// Register theme support for title tag, etc.
require_once( 'functions/theme-support.php' );
// Register menu locations to be used by Appearance > Menus.
require_once( 'functions/menus.php' );
// Clean up some WP stuff we don't want or need.
require_once( 'functions/cleanup.php' );
// Load helper functions.
require_once( 'functions/helper-functions.php' );
// Load media functions.
require_once( 'functions/media.php' );
// Theme modifications and text domain translation registration.
require_once( 'functions/theme-mods.php' );
// Comments callback function.
require_once( 'functions/comments.php' );
// Admin functions & modifications.
require_once( 'functions/admin.php' );
// Advanced Custom Field plugin.
require_once( 'functions/acf.php' );
// Add handler for cURL requests and other wp-rest tasks
require_once( 'functions/rest-routes.php' );
// Add walkers for the main nav
require_once( 'classes/nav-drawer.php' );
require_once( 'classes/nav-desktop.php' );

// Add Advising CPT and functionality
require_once( 'post-type/advising.php' );

// Add Home Repair CPT and functionality
require_once( 'post-type/home-repair.php' );



// we only need this when setting up a multisite network that uses subfolders
// this is because the site itself is considreed too old to use subdirectories, according wo WP
// add_filter( 'allow_subdirectory_install',
// 	create_function( '', 'return true;' )
// );

/***** Exclude pages from search result ********/
add_action( 'pre_get_posts', 'search_filter_exclude_pages_post' );
function search_filter_exclude_pages_post( $query ) {
  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 7854, 3245, 7373, 7270, 2410, 7184, 6302, 5744, 2972, 6110, 7152, 5066, 1932, 7581, 2919, 7530, 7572, 7714, 7532, 5965, 2997, 6258, 7188, 1447 ) );
  }
}

add_filter('acf/settings/show_admin', '__return_true');

if ( ! function_exists( 'framework_head_css' ) ) {
	function framework_head_css() {?>
	<style>
		body.home .content-banner:before {
			display: none;
		}
		.page-id-11307 .intro-text-block {
			z-index: 11;
			position: relative;
		}

		@media screen and (min-width: 1200px) {
			body .cookie-announce {
			bottom: 0;
			top: auto;
			}
			body .toolbar.hide-on-scroll {
				display: flex !important;
			}
			body .header__nav {
				padding: 15px 75px 15px;
			}
			body .header {
				padding-bottom: 125px;
			}
			body .header--home {
				padding-bottom: 0;
			}
			body .header--home {
				padding-bottom: 0;
			}
			body.page-id-11387 .hero__text {
				margin-bottom: 18%;
			}
			body.page-id-11387 .hero__text h1 {
				line-height: 6.2rem !important;
			}
			body .toolbar.toolbar--home.hide-on-scroll {
				background-color: #fff;
			}
		}
	</style>
	<?php }
}
add_action( 'wp_head', 'framework_head_css' );
