<?php
/*
Template Name: Book Appointment
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
	//section_default();
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
	section_book_appointment();



	function section_book_appointment() {
		

		$book_zocdoc_image = get_field('book_online_appointment_image');
		$book_zocdoc_url = get_field('book_online_appointment_url');
		$book_zocdoc_cta_text = get_field('book_online_appointment_text');
		$request_appointment_image = get_field('request_consult_image');
		$request_appointment_url = get_field('request_consult_url');
		$request_appointment_cta_text = get_field('request_appointment_text');



 		$attr = array( 'class' => 'section book-appointment' );
		_s_section_open( $attr );
	
				
		$column_book_zocdoc_appointment = sprintf( '<div class="column medium-6 small-12"><a href="%s"><img src="%s" alt="Book Online Appointment" /></a><div class="booking-details" data-equalizer-watch><a href="%s" class="more"><div class="appointment-book">Book Online Appointment <i class="icon icon-arrow blue"></i></span></a></div>%s</div></div>', $book_zocdoc_url, $book_zocdoc_image, $book_zocdoc_url, $book_zocdoc_cta_text);
				
		$column_request_appointment = sprintf( '<div class="column medium-6 small-12"><a href="%s"><img src="%s" alt="Request an Appointment" /></a><div class="booking-details" data-equalizer-watch><a href="%s" class="more"><div class="appointment-book">Request an Appointment <i class="icon icon-arrow blue"></i></span></a></div>%s</div></li>', $request_appointment_url,$request_appointment_image, $request_appointment_url, $request_appointment_cta_text);
			
			
 		printf( '<div class="expanding-grid"><div class="row medium-10 small-12 items" data-equalizer data-equalize-on="medium">%s%s</div></div>', $column_book_zocdoc_appointment,$column_request_appointment);
			
		
		_s_section_close();
	
		};
	
	?>
	
	</main>


</div>

<?php
get_footer();
