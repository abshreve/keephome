<?php
if ( ! defined( 'WPINC' ) ) {
  die;
}

class Cpt {
  public function __construct ($name_plural, $name_singular, $slug, $args = null, $has_categories = false, $has_tags = false) {
    if(isset($name_plural) && isset($name_singular) && isset($slug)) {
      $this->name_plural = $name_plural;
      $this->name_singular = $name_singular;
      $this->slug = $slug;
      $this->args = $args;
      $this->has_categories = $has_categories;
      $this->has_tags = $has_tags;

      add_action('init', array( &$this, 'register'));
      add_action('init', array( &$this, 'default_taxonomies'));
    }
  }

  // Add CPTs
  public function register() {
    $labels = array(
      'name'                => $this->name_plural,
      'singular_name'       => $this->name_singular,
      'menu_name'           => $this->name_plural,
      'parent_item_colon'   => 'Parent Item:',
      'all_items'           => 'All '.$this->name_plural,
      'view_item'           => 'View Item',
      'add_new_item'        => 'Add New '.$this->name_singular,
      'add_new'             => 'Add New',
      'edit_item'           => 'Edit '.$this->name_singular,
      'update_item'         => 'Update '.$this->name_singular,
      'search_items'        => 'Search '.$this->name_plural,
      'not_found'           => 'Not found',
      'not_found_in_trash'  => 'Not found in Trash',
    );

    $rewrite = array(
      'slug'                => str_replace(' ', '-', str_replace('_', '-', $this->slug)),
    );

    $args = array(
      'label'               => $this->name_singular,
      'description'         => $this->name_plural,
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'comments', 'revisions', 'author', 'excerpt', 'page-attributes', 'thumbnail' ),
      'public'              => true,
      'rewrite'             => $rewrite,
      'taxonomies'          => array( 'post_tag', 'category' )
    );

    if(isset($this->args)) {
      foreach ($this->args as $name => $value) {
        $args[$name] = $value;
      }
    }

    register_post_type( $this->slug, $args );
  }

  function default_taxonomies() {
    if ($this->has_categories) {
      register_taxonomy_for_object_type('category', $this->slug);
    }

    if ($this->has_tags) {
      register_taxonomy_for_object_type('post_tag', $this->slug);
    }
  }
}

