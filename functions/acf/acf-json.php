<?php 
// save/load ACF fields to/from json files
add_filter('acf/settings/load_json', 'acf_json_load_point');
add_filter('acf/settings/save_json', 'acf_json_save_point');

// disable the ACF menu if not in local dev mode
if($_SERVER['REMOTE_ADDR']!='127.0.0.1'){
    add_filter('acf/settings/show_admin', '__return_false');
}

function acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/functions/acf/acf-json';
    
    // return
    return $path;
    
}

function acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/functions/acf/acf-json';
    
    // return
    return $paths;
    
}?>