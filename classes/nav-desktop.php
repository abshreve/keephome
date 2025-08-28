<?php
class Desktop_Nav extends Walker_Nav_Menu{

  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    // We are overriding this method to add our buttons, most of it is copied over from 'wp-includes/class-walker-nav-menu

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;
    
    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
    
    if($depth === 0) {
      $classes[] = 'nav-desktop__row';
    }
    
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';
    
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $item->title, $item->ID );
    
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    // Set up the output
    $item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';

    $item_output .= $args->after;
    
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
		global $menuTitle;
		$menuTitle = $item->title;
		
		/*if (get_field('submenu_cta', $item->ID)) {
			$link = get_field('submenu_cta', $item->ID);
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
				
			global $menuCta;
			$menuCta = '<a href="'.$link_url.'" class="button btn--blue" target="'.$link_target.'">'.	$link_title.'</a>';
		}*/
		
		if($depth === 1) {
			if (get_field('show_flyout', $item->ID)) {
				$output .= "<div class=\"flyout\">";
				$rows = get_field('flyout_content', $item->ID);
				if( $rows ) {
					foreach( $rows as $row ) {
						$link = $row['flyout_content_link'];
						$title = $row['flyout_content_title'];
						if( $link ) {
							$output .= '<a href='.$link.' class="flyout_title">'.$title.'</a>';
						} elseif ( $title ) {
							$output .= '<div class="flyout_title">'.$title.'</div>';
						}
						$content = $row['flyout_content_content'];
						if ($content) { 
							$output .= '<div class="flyout_content">'.$content.'</div>';
						}
						$image = $row['flyout_content_image'];
						if ($image) { 
							$output .= wp_get_attachment_image( $image, 'large', '', ['class' => 'flyout_image']);
						}
					}
				}
				$output .= '</div>';
			}
		}
  }
	
	
  
  /**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    // print_r($args);

		// Default class.
    $classes = array( 'sub-menu', 'nav-desktop__ul' );
    
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		$output .= '<div'.$class_names.'><ul class="nav-desktop__ul_inner">';
		
		global $menuTitle;
		$output .= '<h4>'.$menuTitle.'</h4>';
  }

  /**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		//global $menuCta;
		//$output .= $menuCta;
		$output .= '<a href="https://support.frameworkhomeownership.org/hc/en-us/requests/new" class="button btn--blue" target="_self">Contact Sales</a>';
		$output .= '</ul></div>';
	}
	
} ?>