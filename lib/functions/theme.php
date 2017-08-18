<?php

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