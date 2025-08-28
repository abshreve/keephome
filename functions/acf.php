<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Advanced Custom Field Plugin:
// - Add option pages for general/header/footer/404
// - Setup components (flexible content field items)
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

/**
 * Create default option pages.
 * Use ACF Pro to add fields.
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
  acf_add_options_sub_page(array(
    'page_title' 	=> '404 Settings',
    'menu_title'	=> '404',
    'parent_slug'	=> 'theme-general-settings',
  ));
}

/* E.g. Page template using components:
<?php get_header(); ?>
<main class="content-generic<?php add_page_id_class() ?>">
  <?php
  if ( have_rows('components') ):
    while ( have_rows('components') ) : the_row();
      get_components();
    endwhile;
  endif;
  ?>
</main>
<?php get_footer(); ?>
*/

/**
 * Get all the components in the [theme]/components/ directory.
 * Then require the file.
 *
 * Components are created using ACF flexible content fields.
 * Create the following folders:
 * [theme]/components
 * [theme]/js/classes/components
 * [theme]/scss/components
 */
function get_components() {
  $dir = get_template_directory() . '/components';
  foreach( array_filter( glob( $dir . '/*.*' ), 'is_file' ) as $file ) {
    require $file;
  }
}

/**
 * Add a class to the main content container
 * that specifies the page using the page id.
 * The slug cannot be used as it changes when the user updates the url.
 *
 * This can be used to add custom styles to a component on a specific page.
 */
function add_page_id_class() {
  global $post;
  echo ' content-page-' . $post->ID;
}


/**
 * Adds menu depth rules for the nav flyout fields.
 *
 */
function acf_location_rules_types($choices)
{
    $choices['Menu']['menu_level'] = 'Menu Depth';
    return $choices;
}

add_filter('acf/location/rule_types', 'acf_location_rules_types');

add_filter('acf/location/rule_values/menu_level', 'acf_location_rule_values_level');
function acf_location_rule_values_level($choices)
{
    $choices[0] = '0';
    $choices[1] = '1';

    return $choices;
}
add_filter('acf/location/rule_match/menu_level', 'acf_location_rule_match_level', 10, 4);
function acf_location_rule_match_level($match, $rule, $options, $field_group)
{
    $current_screen = get_current_screen();
    if ($current_screen->base == 'nav-menus') {
        if ($rule['operator'] == "==") {
            $match = ($options['nav_menu_item_depth'] == $rule['value']);
        }
    }
    return $match;
}