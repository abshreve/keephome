<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Helper Functions:
// - cu_pagination()
// - partial()
// - cu_wp_query_starter()
// - cu_get_social_links()
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

/**
 * Pagination starter code.
 */
function cu_pagination() {
  global $wp_query;
  if ( $wp_query->max_num_pages <= 1 ) return;
  ?>
<nav class="pagination-links">
  <?php
    $bignum = 999999999; // need an unlikely integer
    echo paginate_links( array(
      'base'       => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
      'format'     => '?paged=%#%', //or ''
      'current' => max( 1, get_query_var('paged') ),
      // 'current'    => max( 1, $paged ),
      'total'      => $wp_query->max_num_pages,
      'mid_size'   => 3,
      'end_size'   => 3,
      'type'       => 'plain', //or list
      'prev_text'  => '&larr;',
      'next_text'  => '&rarr;'
    ) );
    ?>
</nav>
<?php
}

/**
 * Include template partial and set up content data
 */
function partial($file, $c = null) {
  global $content_partial;
  $content_partial = $c;
  require get_template_directory() . '/partials/' . $file . '.php';
}

// Returns a maximum number of words from a string with an ellipsis if the limit has been hit
function limit_text($text, $limit = 35) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}

/**
 * WP_Query Starter Template.
 */
function cu_wp_query_starter() {
  // The Query
  $the_query = new WP_Query(array(
    'order' => 'DESC',
    'orderby' => 'post_date',
    'post_type' => 'post',
    'post_status' => 'publish',
    'nopaging' => true,
  ));

  // The Loop
  if ( $the_query->have_posts() ) {
  	echo '<ul>';
  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();
  		echo '<li>' . get_the_title() . '</li>';
  	}
  	echo '</ul>';
  	/* Restore original Post Data */
  	wp_reset_postdata();
  } else {
  	// no posts found
  }
}

/**
 * **Example** Print social links from an options page.
 */
function cu_get_social_links() {
  $url_instagram = get_field('link_instagram', 'option');
  $url_twitter = get_field('link_twitter', 'option');
  $url_facebook = get_field('link_facebook', 'option');
  $url_pinterest = get_field('link_pinterest', 'option');
  $url_youtube = get_field('link_youtube', 'option');
  ?>
<div class="social-links">
  <a target="_blank" href="<?php echo $url_instagram; ?>" class="social social-instagram"><i class="fa fa-instagram"
      aria-hidden="true"></i></a>
  <a target="_blank" href="<?php echo $url_twitter; ?>" class="social social-twitter"><i class="fa fa-twitter"
      aria-hidden="true"></i></a>
  <a target="_blank" href="<?php echo $url_facebook; ?>" class="social social-facebook"><i class="fa fa-facebook"
      aria-hidden="true"></i></a>
  <a target="_blank" href="<?php echo $url_pinterest; ?>" class="social social-pinterest"><i class="fa fa-pinterest-p"
      aria-hidden="true"></i></a>
  <a target="_blank" href="<?php echo $url_youtube; ?>" class="social social-youtube"><i class="fa fa-youtube-play"
      aria-hidden="true"></i></a>
</div>
<?php
}

/**
 * Load a component into a template while supplying data.
 *
 * @param string $slug The slug name for the generic template.
 * @param array $params An associated array of data that will be extracted into the templates scope
 * @param bool $output Whether to output component or return as string.
 * @return string
 */
function get_component($directory, $slug, array $params = array(), $output = true) {
  if(!$output) ob_start();
  if ($template_file = locate_template("{$directory}/{$slug}.php", false, false)) {
    extract($params, EXTR_SKIP);
    require($template_file);
    if(!$output) return ob_get_clean();
  }
}

// return the current url as [protocol]://[hostname]/[request_uri]
function get_current_url() {
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $link = 'https';
  } else {
    $link = 'http';
  }
    
  // Here append the common URL characters. 
  $link .= '://';
    
  // Append the host(domain name, ip) to the URL. 
  $link .= $_SERVER['HTTP_HOST']; 
    
  // Append the requested resource location to the URL 
  $link .= $_SERVER['REQUEST_URI'];
  return $link; 
}

function is_landing($id) {
  $landing_templates = ['page-poh.php'];
  return in_array(get_post_meta( $id, '_wp_page_template', true ), $landing_templates);
}