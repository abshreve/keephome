<?php
include(  __DIR__ . '/class-cpt.php' );
include(  __DIR__ . '/class-user.php' );

class ThemeInit {
  public function __construct(){

    // Add restricted media to the 'contributor' user role
    $contributors = new UserRole('contributor');
    $contributors->addCap('upload_files');
    // $contributors->restrict_media();

    // Add the 'Press Release' and 'Authors' post types
    new Cpt('Press Releases', 'Press Release', 'press_release', null, true, true, true);
    // new Cpt('delAuthors', 'delAuthor', 'author', null, true, true, true);
    new Cpt('Authors', 'Author', 'authors', null, true, true, true);

    // Redo the labels for standard posts
    add_action( 'init', array( &$this, 'set_env_vars' ) );
    add_action( 'init', array( &$this, 'change_post_object_label' ) );
  }
  
  /**
  * Change post object labels to "news"
  */
  public function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog Posts';
    $labels->menu_name = 'Blog Posts';
    $labels->singular_name = 'Blog Post';
    $labels->add_new = 'Add Post';
    $labels->add_new_item = 'Add Post';
    $labels->edit_item = 'Edit Post';
    $labels->new_item = 'Post';
    $labels->view_item = 'View Post';
    $labels->search_items = 'Search Posts';
    $labels->not_found = 'No Posts found';
    $labels->not_found_in_trash = 'No Posts found in Trash';
  }

  /**
   * Set what the environment is based on URL
   */
  public function set_env_vars () {
    $env = ($_SERVER['HTTP_HOST'] === 'www.keephome.com') ? 'prod' : 'dev';
    define('THEME_ENV', $env);
  }
}

