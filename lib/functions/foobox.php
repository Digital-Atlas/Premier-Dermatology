<?php
// Foobox Video

// todo: add manual caption

function _s_get_foobox_video( $args ) {

	
	$defaults = array(
		'video_id' => '',
		'background' => false,
		'size' => 'large',
 		'resize_width' => 0, // 640
		'resize_height' => 0 // 360
	);
	
	if( !is_array( $args ) ) {
		$args = array( 'video_id' => $args );
 		//$args['video_id'] = $args;
	}
	
	$args = wp_parse_args( $args, $defaults );
	
	extract( $args );
		
	$thumbnail = get_the_post_thumbnail( $video_id, $size );
		
	$video_url = get_post_meta( $video_id, 'video', true );
	
	if( empty( $video_url ) ) {
		return false;
	}
		
	$video_url = add_query_arg( array( 'rel' => 0, 'autoplay' => 1 ), $video_url );
	
	$title = get_the_title( $video_id );
	
	$description = '';
	
	if( !empty( $title ) ) {
		$title = sprintf( ' data-caption-title="%s"', esc_html( $title ) );
	}
	
	if( !empty( $description ) ) {
		$description = sprintf( ' data-caption-desc="%s"', esc_html( $description ) );
	}
	
	if( $background ) {
		
		$attachment_id = get_post_thumbnail_id( $video_id );
		if( !empty( $attachment_id ) ) {
			$background = wp_get_attachment_image_src( $attachment_id, 'large' );
			$thumbnail = sprintf( ' style="background-image: url(%s);"', $background[0] );
			
			return sprintf( '<a href="%s" class="foobox video"%s%s%s><i class="icon icon-video"></i></a>', 
							$video_url, $title, $description, $thumbnail );
		}
		
	}
	else {
 		// auqa resizer hack
		$attachment_id = get_post_thumbnail_id( $video_id );
		if( !empty( $attachment_id ) ) {
			$thumbnail = wp_get_attachment_image( $attachment_id, 'large' );
			
			if( function_exists( 'aq_resize' ) && ( $resize_width + $resize_height > 0 ) ) {
				$photo = wp_get_attachment_image_src( $attachment_id, 'large' );
				$thumbnail = sprintf( '<img src="%s" />', aq_resize( $photo[0], $resize_width, $resize_height, true, true, true ) );
			}
			
		}
				
		return sprintf( '<a href="%s" class="foobox video"%s%s><i class="icon icon-video"></i>%s</a>', 
						$video_url, $title, $description, $thumbnail );
	}
	
	return false;
	
}


add_image_size( 'foobox-thumbnail', 300, 300, true ); // 1140 x 100 upload @ 2280 x 369
add_image_size( 'foobox-large', 1200, 999999 ); // 1140 x 100 upload @ 2280 x 369
add_image_size( 'foobox-mobile', 600, 999999 ); // 1140 x 100 upload @ 2280 x 369

function foobox_gallery( $photos, $thumbnail_size = 'foobox-thumbnail', $default_size = 'foobox-large', $mobile_size = 'foobox-mobile', $additional_classes = '' ) {
	
	static $gallery_num;
	
	$gallery_num++;
											
	if( empty( $photos ) )
		return FALSE;
		
	$size = $default_size;
															
	if( wp_is_mobile() ) {
		$size = $mobile_size;
	}
					
    $out = '<div class="gallery">';
    
	$out .= sprintf('<div class="row small-up-2 medium-up-3 gallery %s">', $additional_classes );
	
	foreach( $photos as $photo ):
    	
		$out .= '<div class="column">';
		$out .= sprintf('<a href="%s" title="%s" class="foobox" rel="foobox-%s">', $photo['sizes'][$size], esc_html( $photo['caption'] ), $gallery_num );
		$attachment_id = $photo['ID'];
		$img = wp_get_attachment_image( $attachment_id, 'foobox-thumbnail', '', array( 'class' => 'background-image' ) );
 		$out .= $img;
        $out .= '</div>';           
	
	endforeach;
	
    $out .= '</div></div>';
	
	return $out;
}