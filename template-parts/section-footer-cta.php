<?php

/*
Section - Footer CTA
*/


 _s_footer_cta();
function _s_footer_cta() {
	
	global $post;
	
	$post_id = get_the_ID();
	
	if( is_home() || is_singular( 'post' ) ) {
		$post_id = get_option( 'page_for_posts' );
	}
 	
 	$prefix = 'footer_cta';
	$prefix = set_field_prefix( $prefix );
	
	$show_in_footer = get_post_meta( $post_id, 'show_in_footer', true );
		
	if( ! $show_in_footer ) {
		return false;
	}
	
 	
	$title = get_post_meta( $post_id, sprintf( '%stitle', $prefix ), true );
	
 	$page = get_post_meta( $post_id, sprintf( '%spage', $prefix ), true );
	
	if( $page ) {
		$page = get_permalink( $page );
	}
  	
	$button = array();
	$button[$prefix.'text'] = get_post_meta( $post_id, sprintf( '%stext', $prefix ), true );
	$button[$prefix.'link'] = get_post_meta( $post_id, sprintf( '%slink', $prefix ), true );
	$button[$prefix.'page'] = $page;
	$button[$prefix.'url'] = get_post_meta( $post_id, sprintf( '%surl', $prefix ), true );
	$button[$prefix.'link_target'] = get_post_meta( $post_id, sprintf( '%slink_target', $prefix ), true );


	if( empty( $title ) || empty( $button ) ) {
		return false;
	}
	
	$title = sprintf( '<h3>%s</h3>', $title );
  	
 	$button = pb_get_cta_button( $button, $prefix );
	
	if( !empty( $button ) ) {
		$button = sprintf( '<p>%s</p>', $button );
	}
	
	$content = sprintf( '<div class="row" data-equalizer data-equalize-on="large">
				
					<div class="small-12 large-6 columns">
						<div class="table" data-equalizer-watch>
							<div class="cell">
								%s
							</div>
 						</div>
					</div>
					
					<div class="small-12 large-6 columns">
						<div class="table" data-equalizer-watch>
							<div class="cell">
								%s
							</div>
 						</div>
					</div>
									
				</div>', $title, $button );
				
	$attr = array( 'id' => 'cta', 'class' => 'section footer-cta' );
					
	_s_section_open( $attr );
		echo $content;
	_s_section_close();		
 }