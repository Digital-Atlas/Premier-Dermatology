<?php

function _s_google_static_map ( $attributes ) {
	
	$google_map = '';
	
	// Set defaults for attributes or retrieve value if present, the following are sanitized if present
	$center = ( isset( $attributes['center'] ) ? sanitize_text_field( $attributes['center'] )  : null );
	$zoom = ( isset( $attributes['zoom'] ) ? intval( $attributes['zoom'] ) : 12 );
	$width = ( isset( $attributes['width'] ) ? intval( $attributes['width'] ) : 640 );
	$height = ( isset( $attributes['height'] ) ? intval( $attributes['height'] ) : 300 );
	$scale = ( isset( $attributes['scale'] ) ? intval( $attributes['scale'] ) : 2);
	$class = ( isset( $attributes['class'] ) ? sanitize_text_field( $attributes['class'] ) : 'smrt-google-map-embed' );
	
	// computed attribute
	$size = $width . 'x' . $height;
	
	// These parameters are validated/sanitized through equality checks later
	$visual_refresh = ( isset( $attributes['visual_refresh'] ) ? strtolower( $attributes['visual_refresh'] )  : 'false' );
	$format = ( isset( $attributes['format'] ) ? strtolower( $attributes['format'] ) : 'png' );
	$maptype = ( isset( $attributes['maptype'] ) ? strtolower( $attributes['maptype'] ) : 'roadmap' );
	
	// These parameters are simply encoded and appended to querystring if present
	$region = ( isset( $attributes['region'] ) ? urlencode( $attributes['region'] ) : null );
	$markers = ( isset( $attributes['markers'] ) ? urlencode( $attributes['markers'] ) : null );
	$path = ( isset( $attributes['path'] ) ? urlencode( $attributes['path'] ) : null );
	$visible = ( isset( $attributes['visible'] ) ? urlencode( $attributes['visible'] ) : null );
	$style = ( isset( $attributes['style'] ) ?  urlencode( $attributes['style'] ) : null );
	$location = ( isset( $attributes['location'] ) ? sanitize_text_field( $attributes['location'] ) : null );
	
	// In order to be valid we need either the center & zoom attributes, or a valid marker, or a location .
	if ( !isset( $location ) && !isset( $markers ) && !isset( $center ) ) {
		$google_map = '<div class="' . esc_attr( $class ) . '">Invalid attributes, please specify either a location, marker, or center/zoom coordinates.</div>';
		return $google_map;
	}
	
	
	// Validate the parameters value ranges, set or format values based on supplied attributes
	
	// if center and markers are null, then only location is supplied, set center = location for map positioning.
	if ( !isset( $center ) && !isset( $marker ) )
		$center = $location;
	
	// Scale can be 1 or 2, by default it is 1.  If any other number we will reselt to default
	if ( $scale < 1 || $scale > 2 )
		$scale = 1;
	
	// Format must be one of these values, set to default 'png' otherwise
	if ( !in_array( $format, array( 'png', 'png8', 'gif', 'jpg', 'jpg-baseline' ) ) )
		$format = 'png';
	
	// maptype must be one of these four values, set to default 'roadmap' otherwise
	if ( !in_array( $maptype, array( 'roadmap', 'satellite', 'hybrid', 'terrain' ) ) )
		$maptype = 'roadmap';
	
	// API Key
	$key = '';
	$key = ( isset( $attributes['key'] ) ? $attributes['key'] : '' );
	
	// generate the url
	$api_call = add_query_arg(
		array(
			'center'         => ( isset( $center) ? $center : false ),
			'size'           => $size,
			'zoom'           => $zoom,
			'visual_refresh' => ( 'true' === $visual_refresh ? true : false ),
			'scale'          => $scale,
			'format'         => $format,
			'maptype'        => $maptype,
			'region'         => ( isset( $region) ? $region : false ),
			'markers'        => ( isset( $markers) ? $markers : false ),
			'path'           => ( isset( $path) ? $path : false ),
			'visible'        => ( isset( $visible) ? $visible : false ),
			'style'          => ( isset( $style) ? $style : false ),
			'sensor'         => 'false', // note this must be in quotes and is required
			'key'            => $key
		),
		'//maps.google.com/maps/api/staticmap'
	);
	
	$google_map = esc_url( $api_call );
	
	return $google_map;
}