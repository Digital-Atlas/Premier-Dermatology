<?php
/*
Template Name: Doctors
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
			print( '<div class="column row"><div class="entry-content">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div></div>';
		_s_section_close();	
	}
	
	
	// Doctors grid
	section_doctors();
	function section_doctors() {
		
 		$attr = array( 'class' => 'section doctors' );
		_s_section_open( $attr );
		
		$rows = get_field( 'doctors' );
		
		if( empty( $rows ) ) {
			return false;
		}
		
		$content = '';
		
		foreach( $rows as $row ) {
 			$content .= get_doctors( $row );
		}
		
		echo $content;
		
		_s_section_close();
	}
	
	?>
	
	</main>


</div>

<?php
get_footer();
