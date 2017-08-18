<?php
/*
Template Name: Services Landing
*/

get_header(); ?>

<?php
// Hero
section_hero();
function section_hero() {
		
	$heading = sprintf( '<h1>%s</h1>', 'Oops! Page not found.' );
	
	$attr = array( 'class' => 'section hero' );
	_s_section_open( $attr );
	printf( '<div class="column row"><div class="table"><div class="cell">%s</div></div></div>', $heading );	
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
			
			print( '<p>It looks like nothing was found at this location.</p>' );
		
			echo '</div></div>';
		_s_section_close();	
	}
	
	?>
	</main>


</div>

<?php
get_footer();
