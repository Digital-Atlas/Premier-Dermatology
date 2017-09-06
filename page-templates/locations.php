<?php
/*
Template Name: Locations
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );

?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	<?php
		
	// Default
	section_default();
	function section_default() {
				
		global $post;
		
		$attr = array( 'class' => 'section default' );
		_s_section_open( $attr );		
			print( '<div class="column row">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div>';
		_s_section_close();	
	}
	
	
	// Locations grid
	section_locations();
	function section_locations() {
		
		global $post;
		
		$page_id = get_the_ID();

		
		// Get Google map zoom level
		$zoom_level = $post->zoom_level;
		
 		$attr = array( 'class' => 'section locations' );
		_s_section_open( $attr );
	
		
		$args = array(
			'post_type'      => 'location',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'orderby' 		 => 'menu_order',
			'order'          => 'ASC',
 		);
		
	
		// Use $loop, a custom variable we made up, so it doesn't overwrite anything
		$loop = new WP_Query( $args );
	
		// have_posts() is a wrapper function for $wp_query->have_posts(). Since we
		// don't want to use $wp_query, use our custom variable instead.
		if ( $loop->have_posts() ) : 
		
			$columns = $sections = '';
 						
 			while ( $loop->have_posts() ) : $loop->the_post(); 
			
				/*
					- address - textarea
					- phone - text
					- google map link - url
					- google coordinates - text
					- book appointment - url
					
					- office hours
					- content block - wysiwyg
				*/
				
				$details = '';
				
				// Map
				$google_map_coordinates = get_post_meta( get_the_ID(), 'google_map_coordinates', true );
				$google_map_directions = get_post_meta( get_the_ID(), 'google_map_directions', true );
				$map = '';
				
				
 				$title_background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if( !empty( $title_background ) ) {
					$title_background = sprintf( 'style="background-image: url(%s);"', $title_background[0] );
				}
				$title = sprintf( '<div class="location-title"%s><div class="inner"></div></div>', $title_background );
				
  				
				$address = sprintf( '<h4>%s</h4><div class="location-address">%s</div>', get_the_title(), apply_filters( 'pb_the_content', get_post_meta( get_the_ID(), 'address', true ) ) );
				
 				$phone = get_post_meta( get_the_ID(), 'phone', true );
				if( !empty( $phone ) ) {
					$phone_link = preg_replace('/\D+/', '', $phone);
					$phone = sprintf( '<div class="location-phone"><i class="icon icon-phone"></i><a href="tel:%s">%s</a></div>', $phone_link, $phone );
				}
				
				$directions = sprintf( '<div class="location-directions"><i class="icon icon-directions"></i><a href="%s">Get Directions</a></div>', $google_map_directions );
				
				$book_appointment = get_post_meta( get_the_ID(), 'book_appointment', true );
 				if( !empty( $book_appointment ) ) {
					
					$link_text = 'Book Appointment';
					
					if( 811 == $page_id ) {
						$link_text = 'Book Appointment Online';
					}
					
					$link = sprintf( '<a href="%s">%s</a>', $book_appointment, $link_text );
				}
				else {
					$link = sprintf( '<span>%s</span>', $link_text );	
				}
				
				$book_appointment = sprintf( '<div class="location-book">%s</div>', 
											   $link );
				
				//$read_more = sprintf( '<div class="location-more"><a href="#section%s" class="more"><span>More about %s</span><i class="icon icon-arrow blue"></i></a></div>', get_the_ID(), get_the_title() );
				
				$read_more = sprintf( '<div class="location-more"><a href="#section%s" class="more"><span>Office Hours and Map</span><i class="icon icon-arrow blue"></i></a></div>', get_the_ID() );
				
  				
				$details  = $address;	
				$details .= $phone;	
				$details .= $directions;				
				$details .= $book_appointment;	
				$details .= $read_more;	
				
				
				$columns .= sprintf( '<li class="column"><div>%s<div class="details" data-equalizer-watch>%s</div></div></li>', 
									 $title, $details );
				
				// Section content
				
				if( !empty( $google_map_coordinates ) ) {
					$lat_lng = explode(',', $google_map_coordinates );
					$lat = trim( $lat_lng[0]);
					$lng = trim( $lat_lng[1]);
					$map_icon = sprintf( '%s/locations/icon-green.png', THEME_IMG );
				    $map_icon_2x = sprintf( '%s/locations/icon-green@2x.png', THEME_IMG );
  					$markers = sprintf( 'icon:%s|%s,%s', $map_icon, $lat, $lng );
					$attr = array( 'width' => 640, 'height' => 360, 'markers' => $markers, 'key' => GOOGLE_API_KEY, 'scale' => 2, 'zoom' => $zoom_level );
					//print_r( $attr );
					$map = _s_google_static_map( $attr  );
					$style = sprintf( 'background-image: url(%s);', $map );
					$map_large = sprintf( '<div class="map map-large"><a href="%s"  style="%s"></a></div>', $google_map_directions, $style );
					$map_small = sprintf( '<div class="map map-small"><a href="%s"  style="%s"></a></div>', $google_map_directions, $style );
				}
				
				
				$content = $map_large;
				$message= '<p class="small">Hours are subject to change, please call to confirm.</p>';
				$office_hours = sprintf( '<h4>Office Hours</h4>%s%s', _s_location_office_hours(), $message );
				$text = get_field( 'text_block' );
 				if( !empty( $text ) ) {
					$text = sprintf( '<div class="small-12 xxlarge-6 xxlarge-push-6 xxxlarge-6 xxxlarge-push-6 columns last"><div class="entry-content">%s</div></div>', $text );	
				}
				$content .= sprintf( '<div class="extras">%s<div class="small-12 xxlarge-6 xxlarge-pull-6 xxxlarge-6 xxxlarge-pull-6 columns"><div class="entry-content">%s</div></div></div>', $text, $office_hours );
				
				$content .= $map_small;
				
				$sections .= sprintf( '<div id="section%s" class="expanding-container"><div class="column row"><article class="hentry"><div>%s</div></article></div></div>', get_the_ID(), $content );
	
			endwhile;
			
 			printf( '<div class="expanding-grid"><ul class="row small-up-1 medium-up-2 large-up-3 links" data-equalizer data-equalize-on="medium" data-equalize-by-row="true">%s</ul>%s</div>', 
					$columns, $sections );
			
 		else:
			//
 		endif;

		// We only need to reset the $post variable. If we overwrote $wp_query,
		// we'd need to use wp_reset_query() which does both.
		wp_reset_postdata();
		
		_s_section_close();
		
	}
	
	
	?>
	
	</main>


</div>

<?php
get_footer();
