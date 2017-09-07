<?php
/*
Template Name: Resources
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
	
	
	// Forms
	section_forms();
	function section_forms() {
		
 		$attr = array( 'class' => 'section forms' );
		_s_section_open( $attr );
		
		$rows = get_field( 'forms' );
		
		if( empty( $rows ) ) {
			return false;
		}
		
		$content = '';
		
		foreach( $rows as $row ) {
 			$content .= _get_form_section( $row );
		}
		
		echo $content;
		
		echo '<div class="column row"><p>To view these forms you’ll need Adobe reader. Download a free version <a href="https://get.adobe.com/reader/">here</a>.</p></div>';
		
		_s_section_close();
	}
	
	
	function _get_form_section( $row ) {
	
		$heading = $row['heading'];
		
		if( !empty( $heading ) ) {
			$heading = sprintf( '<div class="column row"><h3>%s</h3></div>', $heading );
		}
		
		$eq_id = uniqid();
		
		$columns = _s_get_forms( $row, $eq_id );
		
		return sprintf( '%s<div class="row small-up-1 medium-up-3 large-up-4 grid" data-equalizer="%s" data-equalize-on="small">%s</div>', 
					$heading, $eq_id, $columns );
		
	}
	
	function _s_get_forms( $row, $eq_id ) {
		
		$files = $row['pdf_files'];
		
		if( empty( $files ) ) {
			return false;	
		}
		
		$columns = '';
					
		foreach( $files as $file ) {
			
			$file_name = $file['file_name'];
			$pdf = $file['pdf'];
			
			if( !empty( $file_name ) && !empty( $pdf )  ) {
				
			}
			
			$columns .= sprintf( '<div class="column"><a href="%s" data-equalizer-watch="%s"><i class="icon icon-pdf"></i><p>%s</p></a></div>', $pdf, $eq_id, $file_name );
			
		}

		return $columns;
		
	}
	
	
	
	// Insurance Plans
	section_plans();
	function section_plans() {
		
 		$rows = get_field( 'insurance_plans' );
		
		if( empty( $rows ) ) {
			return false;
		}
		
		$accordion = '';
		$accordion_content = '';
		
		$is_active = ' is-active';
		
		foreach( $rows as $row ) {
 			
			$heading = $row['plans_heading'];
			
			$content = _get_plans_section( $row );
			
			if( !empty( $heading ) && !empty( $content ) ) {
				$accordion_title = sprintf( '<a href="#" class="accordion-title"><h5>%s</h5></a>', $heading );
				$is_active = empty( $accordion_content ) ? $is_active : '';
				$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
				<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $content );
			}
			
		}
			
  		if( empty( $accordion_content ) ) {
			return false;
		}
		
		$attr = array( 'class' => 'section plans' );
		_s_section_open( $attr );
		
		echo '<div class="column row"><div class="entry-content">';
		
		echo '<h4>Premier Dermatology accepts all the following insurance plans:</h4>';
		
		printf( '<ul class="accordion" data-accordion data-allow-all-closed="true">%s</ul>', 	
				$accordion_content );
		
		echo '</div></div>';
 		
		_s_section_close();
	}
	
	// Addendum

	section_addendum();
	function section_addendum() {

		$addendum = get_field('addendum');

		$attr = array( 'class' => 'section addendum' );
		
		_s_section_open( $attr );

		echo '<div class="column row"><div class="entry-content">';

		printf('%s', $addendum);

		echo '</div></div>';
 		
		_s_section_close();

	}
	
	
	
	
	
	?>
	
	</main>


</div>

<?php
get_footer();
