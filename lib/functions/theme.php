<?php

// Showing multiple post types in Posts Widget

add_action( 'elementor_pro/posts/query/providers_post_cards', function( $query ) {
    // Here we set the query to fetch posts with
    // post type of 'custom-post-type1' and 'custom-post-type2'
        $query->set( 'post_type', [ 'team' ] );
} );

add_action( 'admin_init', 'posts_order_wpse_91866' );

function posts_order_wpse_91866() 
{
    add_post_type_support( 'post', 'page-attributes' );
}


/**
 * Removes the width and height attributes of <img> tags for SVG
 */
function wpse240579_fix_svg_size_attributes( $out, $id ) {
    $image_url  = wp_get_attachment_url( $id );
    $file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );

    if ( is_admin() || 'svg' !== $file_ext ) {
        return false;
    }

    return array( $image_url, null, null, false );
}
add_filter( 'image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2 ); 

/**
 * Custom Body Class
 *
 * Add additional body classes to pages for targeting.
 *
 * @param array $classes
 * @return array
 */
function _s_add_custom_body_class( $classes ) {
	
	$body_class = '';
	
 	if( wp_is_mobile() ) {
		$body_class = 'mobile';
	}
	
	
	
	// If exists add body class
	if( !empty( $body_class ) ) {
		$classes[] = $body_class;
	}
	
	return $classes;
}
add_filter( 'body_class', '_s_add_custom_body_class' );


// wrap text by replacing a symbol and wrapping the string
function _s_wrap_text( $string, $search = '#', $replace = 'span' ) {
	// add span and balance tags
 	$string = force_balance_tags( str_replace( "$search", sprintf('<%s>', $replace), $string ) );
	// remove empty tags
	return str_replace( sprintf('<%1$s></%1$s>', $replace), '', $string );
}

add_action( 'wp_head', 'my_header_scripts' );
function my_header_scripts(){
      ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WQNNWTH');</script>
<!-- End Google Tag Manager -->
  <?php
}

/**
 * cURL Function wrapper
 * @param $url
 * @return url
 */
function get_data($url)
{
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);

  // Error Handling
  if (curl_error($ch)) {
    $error_msg = curl_error($ch);
   }
  curl_close($ch);

  return $data;
}

