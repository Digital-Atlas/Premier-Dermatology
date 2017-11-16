<?php

/*
Hero
		
*/
	
// Hero
section_hero();
function section_hero() {
		
	$heading = sprintf( '<h1>%s</h1>', get_post_meta( get_the_ID(), 'hero_heading', true ) );
	$subheading = get_post_meta( get_the_ID(), 'hero_subheading', true );
	if( !empty( $subheading ) ) {
		$subheading = sprintf( '<h4>%s</h4>', get_post_meta( get_the_ID(), 'hero_subheading', true ) );
	}
	
	$content = $heading . $subheading;
	
	if( empty( $content ) ) {
		return false;	
	}
	
	$attr = array( 'id' => 'banner', 'class' => 'section hero', 'role' => 'region', 'aria-labelledby' => 'banner');
	_s_section_open( $attr );
	printf( '<div class="column row"><div class="table"><div class="cell">%s</div></div></div>', $content );	
	_s_section_close();		
}
