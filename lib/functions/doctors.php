<?php

/* cURL Reputation Widget API - Outputs reviews schema-enabled HTML */
function reputation_widget_reviews ( $reputation_link_id = null ) {
	$reputation_widget_reviews = sprintf('https://widgets.reputation.com/widgets/5b439740b9d46c7c4e579351/run?tk=b07514e91ca&lk=%s&start=0', $reputation_link_id);

	$output = get_data($reputation_widget_reviews);

	if (isset($error_msg)) {
    	return '<div class="error">No reviews available.</div>';
	} else {
		return $output;	
	}
	
}


/* cURL Reputation Widget API - Outputs ratings ONLY schema-enabled HTML */
function reputation_widget_ratings ( $reputation_link_id = null ) {
	$reputation_widget_ratings = sprintf('https://widgets.reputation.com/widgets/5b439cc5ff3b47757c7097ef/run?tk=b07514e91ca&lk=%s', $reputation_link_id);

	$output = get_data($reputation_widget_ratings);
	
	if (isset($error_msg)) {
    	return '<div class="error">No reviews available.</div>';
	} else {
		return $output;	
	}	
}	


function get_doctors( $row ) {
	
	$heading = $row['heading'];
	
	if( !empty( $heading ) ) {
		$heading = sprintf( '<div class="column row"><h3>%s</h3></div>', $heading );
	}
	
	$columns = _s_get_members( $row );
	
	return sprintf( '%s<div class="row small-up-1 medium-up-3 large-up-4 grid" data-equalizer data-equalize-on="medium">%s</div>', 
				$heading, $columns );
	
}

function get_team( $row ) {
	
	$heading = $row['heading'];
	
	if( !empty( $heading ) ) {
		$heading = sprintf( '<div class="column row"><h3>%s</h3></div>', $heading );
	}
	
	$columns = _s_get_members( $row );
	
	if( empty( $columns ) ) {
		return false;
	}
	
	return sprintf( '%s<div class="row small-up-1  medium-up-2 large-up-3 grid" data-equalizer data-equalize-on="medium">%s</div>', 
				$heading, $columns );
	
}

function _s_get_members( $row ) {
	
	$_posts = $row['members'];
	
	if( empty( $_posts ) ) {
		return false;
	}
	
	$args = array(
		'post_type'      => 'team',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'order'          => 'ASC',
	);
	
	$args['post__in'] = $_posts;
	$args['orderby'] = 'post__in';

	
	$columns =  '';

	// Use $loop, a custom variable we made up, so it doesn't overwrite anything
	$loop = new WP_Query( $args );

	// have_posts() is a wrapper function for $wp_query->have_posts(). Since we
	// don't want to use $wp_query, use our custom variable instead.
	if ( $loop->have_posts() ) : 
	
 		while ( $loop->have_posts() ) : $loop->the_post(); 
			
			$_post = $loop->post;
			
			$photo = get_the_post_thumbnail( get_the_ID(), 'doctor-thumbnail' );
			$title = sprintf( '<h4>%s</h4>', get_the_title() );
			
			$specialties = get_field( 'specialties', $_post );
			if( !empty( $specialties ) ) {
				$specialties = doctor_format_specialties( $specialties );
			}
			
			$details = sprintf( '<div class="details" data-equalizer-watch>%s%s</div>', $title, $specialties );
				
			$columns .= sprintf( '<div class="column"><a href="%s">%s%s<i class="icon icon-more"></i></a></div>', get_permalink(), $photo, $details );
			
		
		endwhile;
		
	else:
		return false;
	endif;

	wp_reset_postdata();
	
	return $columns;
	
}


function doctor_format_specialties( $field, $el = 'p' ) {
	if( empty( $field ) ) {
		return false;
	}
	
	$out = $field;
	
	if( is_array( $field ) ) {
		$out = '';
		foreach( $field as $f ) {
			$out .= sprintf( '<%2$s>%1$s</%2$s>', $f, $el );
		}
	}
		
	return $out;
}



function get_doctor_social_profiles() {
	// Social Profiles
	$social_profiles = array();	
	
	$socials = array(
				'facebook',
				'googleplus',
				'linkedin',
				'twitter',
				'vimeo',
			  );
	foreach( $socials as $social ) {
		$profile = get_post_meta( get_the_ID(), $social, true );
		if( !empty( $profile ) ) {
			$social_profiles[$social] = $profile;
		}
	}
										
	return _s_get_social_icons( $social_profiles );	
}


function get_doctor_locations() {
	global $post;
	
	$defaults = array();
	
	// Set defaults
	if( is_singular( 'service' ) ) {
		$post_term = false;
		$service_cat = false;
		$terms = wp_get_post_terms( $post->ID, 'service_cat');
		if( !empty( $terms ) ) {
			$post_term = $terms[0];
			$defaults = get_field( 'default_service_locations', $post_term );
		}
	}
  	
	$ids = get_field( 'locations' );	
	
	//$ids = wp_parse_args( $ids, $defaults );
	
	if( empty( $ids ) ) {
		
		$ids = $defaults;
		
		if( empty( $ids ) ) {
			return false;
		}
		
	}
		
	$args = array(
			'post_type'      => 'location',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
 			'order'          => 'ASC',
 		);
		
	$args['post__in'] = $ids;
	$args['orderby'] = 'post__in';

	
	$columns =  '';

	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) : 
					
		while ( $loop->have_posts() ) : $loop->the_post(); 
						
			$title = the_title( '<h2>', '</h2>', false );
			
			$address =  apply_filters( 'pb_the_content', get_post_meta( get_the_ID(), 'address', true ) );
				
			$phone = get_post_meta( get_the_ID(), 'phone', true );
			if( !empty( $phone ) ) {
				$phone_link = preg_replace('/\D+/', '', $phone);
				$phone = sprintf( '<p class="location-phone"><i class="icon icon-phone"></i><a href="tel:%s">%s</a></p>', $phone_link, $phone );
			}
			
			$columns .= sprintf( '<div class="column">%s%s%s</div>', $title, $address, $phone );
		
		endwhile;
   		
	else:
		//
	endif;

	wp_reset_postdata();
	
	return sprintf( '<div class="locations"><div class="row small-up-1 medium-up-2 large-up-3">%s</div></div>', $columns );
	
}

function get_doctor_awards() {
	
	$awards = get_field( 'awards' );	
		
	if( empty( $awards ) ) {
		return false;
	}
	
	$logos = '';
	
	foreach( $awards as $award ) {
		$thumbnail = wp_get_attachment_image( $award['ID'], 'award-thumbnail' );
				
		$logos .= sprintf( '<li>%s</li>', $thumbnail );
	}
	
	return sprintf( '<div class="awards"><ul class="logos">%s</ul></div>', $logos );
}


function get_doctor_video() {
		
	$video_id = get_field( 'video' );
	
	if( empty( $video_id ) ) {
		return false;
	}
	
 	//$video_id = $video[0]->ID;	
	return _s_get_foobox_video( $video_id[0] );	
		 
 }
 


function get_doctor_testimonial( $single  = '' ) {
	
	global $post;
	
	$title = $post->doctor_quote_title;
	$text = $post->doctor_quote_text;
	
	if( empty( $text ) ) {
		return false;
	}
	
	// format and return
	
	if( !empty( $title ) ) {
		$title = sprintf( '<h2>%s</h2>', $title );
	}
	
	$text = apply_filters( 'pb_the_content', $text );
	
	return sprintf( '<div class="doctor-testimonial panel %s" data-equalizer-watch><div class="table"><div class="cell">%s<div id="ajax-testimonial"></div></div></div></div>', $single, $title );
}


function _get_doctor_home_testimonial( $post_id ) {
	
 	$title = get_post_meta( $post_id, 'doctor_quote_title', true );
	$text = get_post_meta( $post_id, 'doctor_quote_text', true );
	$doctor_quote_photo = get_post_meta( $post_id, 'doctor_quote_photo', true );
 	
	if( empty( $text ) ) {
		return false;
	}
	
	// format and return
	
	if( !empty( $title ) ) {
		$title = sprintf( '<h3>%s</h3>', $title );
	}
	
	$text = apply_filters( 'pb_the_content', $text );
	
	// get the photo
	
	$photo = _s_get_acf_image( $doctor_quote_photo, 'medium' );
	
	return sprintf( '<div class="testimonial">%s<div class="details">%s%s</div></div>', $photo, $title, $text );
	
}


function doctor_media_gallery() {
	
	$media = get_field( 'media_carousel' );	
	
	if( empty( $media ) ) {
		return false;
	}
	
	$columns = '';
	
	foreach( $media as $single ) {
		
		$temp = '';
		
		if( 'video' == $single->post_type ) {
			$temp = get_media_type_video( $single );
		}
		else {
			$temp = get_media_type_service( $single );	
		}
		
		
		$columns .= $temp;
	}
	
	
	return $columns;
}


function get_media_type_video( $single ) {
	
	$video_id = $single->ID;
	$caption = get_post_meta( $single->ID, 'caption', true );
	$video_args = array( 'video_id' => $video_id, 'resize_width' => 640, 'resize_height' => 360 );
	$video = sprintf( '<div class="thumbnail">%s</div>', _s_get_foobox_video( $video_args ) );
	if( !empty( $caption ) ) {
		$caption  = sprintf( '<div class="caption">%s</div>', $caption );
	}
	
	return sprintf( '<div class="owl-column">%s%s</div>', $video, $caption );	
	
}

function get_media_type_service( $single ) {
	
	$photos = get_field( 'before_and_after_photos', $single->ID );
	
	if( empty( $photos ) ) {
		return false;	
	}
	
	// get first photo
	$background = '';
	$thumbnail = '';
	$first_photo = $photos[0];
        $attachment_id = $first_photo['ID'];
        $caption = $first_photo['title'];
	if( !empty( $attachment_id ) ) {
		$photo = wp_get_attachment_image_src( $attachment_id, 'large' );
		$background = sprintf( ' style="background-image: url(%s);"', $photo[0] );
		$background = '';
		$thumbnail = wp_get_attachment_image( $attachment_id, 'large' );
		$resized_thumbnail = sprintf( '<img src="%s" alt="%s" />', aq_resize( $photo[0], 640, 360, true, true, true ), $caption );
	}
	
	$thumbnail = sprintf( '<div class="thumbnail"%s><a href="%s" class="foobox">%s</a></div>', $background, $photo[0], $resized_thumbnail );
 	$caption  = sprintf( '<div class="caption">%s</div>', $caption );
 	
	return sprintf( '<div class="owl-column">%s%s</div>', $thumbnail, $caption );
}



// Reputation code widget
add_action( 'wp_footer', 'doctor_review_js' );
function doctor_review_js() {
	global $post;
	
	if( empty( $post->review_id ) ) {
		return false;
	}
	
	?>
	<script>!function(d,s,c){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";js=d.createElement(s);js.className=c;js.src=p+"://widgets.reputation.com/src/client/widgets/widgets.js";fjs.parentNode.insertBefore(js,fjs);}(document,"script","reputation-wjs");</script>
	<?php
}

function get_doctor_review( $review_id ) {
	if( !empty( $review_id ) ) {
		return sprintf( '<a class="reputation-widget" target="_blank" href="https://widgets.reputation.com/widgets/589e2289e4b06f50386a8ec6/run?tk=b075…" data-tk="b07514e91ca" data-widget-id="589e2289e4b06f50386a8ec6" data-lk="%s" env="">Loading Reputation Reviews...</a>', $review_id );
	}
}


function get_doctor_services() {
	
	global $post;
	
	$additional_services = get_field( 'additional_services' );
	
 		
	$ids = get_field( 'services' );	
	
 	
	if( empty( $ids ) && empty( $additional_services ) ) 
		return false;
		
	$args = array(
			'post_type'      => 'service',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
 			'order'          => 'ASC',
 		);
		
	$args['post__in'] = $ids;
	$args['orderby'] = 'post__in';

	$list_items = array();
	

	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) : 
					
		while ( $loop->have_posts() ) : $loop->the_post(); 
			$title = sanitize_title( get_the_title() );
			$list_items[$title] = sprintf( '<li><a href="%s">%s</a></li>', get_permalink(), get_the_title() );
		
		endwhile;
   		
	else:
		
	endif;

	wp_reset_postdata();
	
	// additional services?
	
	if( !empty( $additional_services ) ) {
		foreach( $additional_services as $service ) {
			$title = sanitize_title( $service );
			$list_items[$title] = sprintf( '<li>%s</li>', $service );
		}
	}
		
	// sort alphabetically
	ksort( $list_items );
	
	// split into columns
	$columns =  array();
	$out = '';
	
	$columns = c2c_array_partition( $list_items, 2 );
	
	if( 1 == count( $columns ) ) {
		$out = sprintf( '<div class="column row"><ul>%s</ul></div>', $columns[0] );
	}
	else {
		foreach( $columns as $column ) {
			$out .= sprintf( '<div class="column"><ul>%s</ul></div>', implode( '', $column ) );
		}
		
		$out = sprintf( '<div class="row small-up-1 medium-up-2">%s</div>', $out );
	}
	
	
	return sprintf( '<div class="related-services">%s</div>', $out );
	
}


function get_doctor_education() {
	
	global $post;
	
	$rows = get_field( 'education' );
	
	if( empty( $rows ) ) {
		return false;
	}
	
	$items = array();
	$columns = array();
	$out = '';
	
	foreach( $rows as $row ) {
		
		$items[] = sprintf( '<p><strong>%s</strong>%s</p>', $row['degree'], $row['location'] );
	}
	
	$columns = c2c_array_partition( $items, 2 );
	
	if( 1 == count( $columns ) ) {
		$out = sprintf( '<div class="column row">%s</div>', $columns[0] );
	}
	else {
		foreach( $columns as $column ) {
			$out .= sprintf( '<div class="column">%s</div>', implode( '', $column ) );
		}
		
		$out = sprintf( '<div class="row small-up-1 medium-up-2">%s</div>', $out );
	}
	
	
	return sprintf( '<div class="education">%s</div>', $out );
}
