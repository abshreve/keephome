<?php
if ( ! defined( 'WPINC' ) ) {
  die;
}

class Taxonomy {
  public function __construct ($name_plural, $name_singular, $slug, $post_types = [], $args = [], $register = true) {
    if(isset($name_plural) && isset($name_singular) && isset($slug)) {
      $this->name_singular = $name_singular;
      $this->name_plural = $name_plural;
      $this->slug = $slug;
      $this->post_types = $post_types;
      $this->args = $args;
      if($register) {
        $this->register();
      }
    }
  }

  // Add taxonomies
  public function taxonomies() {
    // Languages
    $labels = array(
      'name'                       => $this->name_plural,
      'singular_name'              => $this->name_singular,
      'menu_name'                  => $this->name_plural,
      'all_items'                  => 'All '.$this->name_plural,
      'new_item_name'              => 'New '.$this->name_singular,
      'add_new_item'               => 'Add New '.$this->name_singular,
      'edit_item'                  => 'Edit '.$this->name_singular,
      'update_item'                => 'Update '.$this->name_singular,
      'search_items'               => 'Search '.$this->name_plural,
      'add_or_remove_items'        => 'Add or remove '.$this->name_plural,
      'choose_from_most_used'      => 'Choose from the most used '.$this->name_plural,
      'not_found'                  => 'Not Found', 'text_domain'
    );

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => false,
      'show_tagcloud'              => true,
    );

    foreach ($this->args as $name => $value) {
      $args[$name] = $value;
    }

    register_taxonomy( $this->slug, $this->post_types, $args );
  }
}