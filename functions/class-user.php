<?php
if ( ! defined( 'WPINC' ) ) {
  die;
}

class UserRole {
  public function __construct ($role, $user = false) {
    if( !empty($role) && $this->role_exists()) {
      $this->user = ($user) ? $user : get_current_user_id();
      $this->role = $role;
    }
  }

  // Limit media library access
  public function restrict_media() {
    add_filter( 'ajax_query_attachments_args', function ( $query ) {
      if ( $this->user && current_user_can($this->role) ) {
        $query['author'] = $this->user;
      }
      return $query;
    });
  }

  // add capability to current role
  public function addCap(String $cap){
    return ( current_user_can($this->role) && !current_user_can($cap) ) ? get_role($this->role)->add_cap($cap) : null;
  }

  public function role_exists() {
    return ($GLOBALS['wp_roles']->is_role( $role )) ? true : false;
  }
}