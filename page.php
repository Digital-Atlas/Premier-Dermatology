<?php

get_header(); ?>

<?php
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
	
	$attr = array( 'class' => 'section hero' );
	_s_section_open( $attr );
	printf( '<div class="column row"><div class="table"><div class="cell">%s</div></div></div>', $content );	
	_s_section_close();		
}	
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
			print( '<div class="column row"><div class="entry-content">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div></div>';
		_s_section_close();	
	}
	
	?>
	</main>


</div>

<?php
get_footer();
