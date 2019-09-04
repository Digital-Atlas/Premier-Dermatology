<style>
.section.hero h2 {
    color: #fff;
    display: inline-block;
    font-size: 20px;
    margin-top: 5px;
    padding-top: 10px;
    border-top: 3px solid #fff;
}
</style>

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
		$subheading = sprintf( '<h2>%s</h2>', get_post_meta( get_the_ID(), 'hero_subheading', true ) );
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
