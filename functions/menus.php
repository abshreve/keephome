<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Register Menus:
// These registered menus will be available in Appearance > Menus
// where the admin can add items such as posts and pages.
// They can be output in templates using wp_nav_menu. Examples
// can be found in the header and footer by default.
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

add_action( 'after_setup_theme', function() {
  register_nav_menus(
    array(
      'toolbar-menu' => __( 'The Toolbar Menu', 'cu_textdomain' ),
      'main-menu' => __( 'The Main Menu', 'cu_textdomain' ),
      'footer-menu' => __( 'Footer Menu', 'cu_textdomain' ),
    )
  );
});

function nav_menu_active_class ($classes, $item) {
    if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'nav_menu_active_class' , 10 , 2);

function nav_menu_link_attributes_classes( $atts, $item, $args, $depth ){
  if( $args->theme_location === 'main-menu' ){
    $classes = ['nav-link'];
    if( in_array('menu-item-has-children', $item->classes) && $depth === 0 ){
      if( $depth === 0 ){
        // $atts['data-toggle'] = 'dropdown';
        $atts['data-title'] = $item->post_title;
        $classes[] = 'dropdown-toggle';
      }
    }
    $atts['class'] = implode(' ', $classes);
  } else if( $args->theme_location === 'toolbar-menu' && $depth == 0 ) {
    $atts['class'] = 'toolbar-link';
  }

  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'nav_menu_link_attributes_classes', 10, 4 );

function header_nav_menu_item_css_class( $classes, $item, $args, $depth ){
  // Adds .nav-item to li's
  if( $args->theme_location === 'main-menu' ){

    if( $depth === 0 ){
      /**
       * Returns true if css class '.dropdown' should be added to menu item
       * If $classes contains '.menu-item-has-children', then add '.dropdown' class ($boolAddDropdownClass: true)
       * If $classes contains '.menu-item-has-children' and 'expanded-dropdown', then do not add '.dropdown' class ($boolAddDropdownClass: false)
       * If $classes does not contain '.menu-item-has-children', then do not add '.dropdown' class ($boolAddDropdownClass: null)
       *
       * Used array_reduce to search array for '.menu-item-has-children' and '.expanded-dropdown' in one array traversal
       */
      $boolAddDropdownClass = array_reduce($classes, function($carry, $class){
        if( $class === 'menu-item-has-children' && $carry !== false ){
          $carry = true;
        } else if( $class === 'expanded-dropdown' ){
          $carry = false;
        }
        return $carry;
      }, null);

      if( $boolAddDropdownClass === true ){
        $classes[] = 'dropdown';
      }
    } else if( $depth === 1 ) {
      $classes[] = 'sub-menu--menu-item';
    }
    $classes[] = 'nav-item';
  } else if( $args->theme_location === 'toolbar-menu' && $depth == 0 ){
    $classes[] = 'toolbar-menu-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'header_nav_menu_item_css_class', 10, 4);

function header_nav_menu_sub_menu_css_class( $classes, $args, $depth ){
  if( $args->theme_location === 'main-menu' && $depth === 0 ){
    $classes[] = 'dropdown-menu';
    // $classes[] = 'justify-content-center';
  }

  return $classes;
}
add_filter('nav_menu_submenu_css_class', 'header_nav_menu_sub_menu_css_class', 10, 3);