<?php
get_header(); ?>

<?php
// Hero
section_hero();
function section_hero() {
		
	$heading = sprintf( '<h1>%s</h1>', get_the_title() );
	$specialties = get_field( 'specialties' );
	if( !empty( $specialties ) ) {
		$specialties = doctor_format_specialties( $specialties, 'h4' );
	}
	
	$content = $heading . $specialties;
	
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
  			
				$photo = get_the_post_thumbnail( get_the_ID(), 'doctor-thumbnail' );
													
				$social_media = get_doctor_social_profiles();
			
			print( '<div class="row">' );
			
			printf( '<div id="headshot" class="small-12 large-3 columns">%s%s</div>', $photo, $social_media );
			
			print( '<div class="small-12 large-9 columns"><div class="entry-content bio">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
				
				// Locations
				
				echo get_doctor_locations();
				
				// Awards
				echo get_doctor_awards();
		
			echo '</div></div>';
		_s_section_close();	
	}
	
	
	section_video_testimonial();
	function section_video_testimonial() {
				
		global $post;
		
		$video = get_doctor_video();	
		if( !empty( $video ) ) {
			$video = sprintf( '<div class="video-block">%s</div>', $video );
		}
			
		$testimonial = get_doctor_testimonial();	
		
		if( empty( $video ) && empty( $testimonial ) ) {
			return false;
		}
		
		$attr = array( 'class' => 'section video-testimonial' );
		_s_section_open( $attr );
		
 			print( '<div class="row" data-equalizer data-equalize-on="small">' );
			
			if( empty( $video ) ) {
 				
				$testimonial = get_doctor_testimonial( 'single' );	
				
				printf( '<div class="small-12 columns">%s</div>', $testimonial );
			}
			else if( empty( $testimonial ) ) {
 				printf( '<div class="small-12 columns"><div class="panel" data-equalizer-watch>%s</div></div>', $video );
			}
			else {
				printf( '<div class="small-12 xlarge-6 xxlarge-6 columns"><div class="panel" data-equalizer-watch>%s</div></div>', $video );
			
				printf( '<div class="small-12 xlarge-6 xxlarge-6 columns">%s</div>', $testimonial );
			}
			
			
			
			print( '</div>' );
			
		_s_section_close();	
	}
	
	
	// Media Carousel
	section_media_carousel();
	function section_media_carousel() {
				
		global $post;
		
		$gallery = doctor_media_gallery();
		
		$professional_title = !empty( $post->professional_title ) ? ' ' . $post->professional_title : '';
		
		if ( $post->professional_title == 'MD') {
			$doctor_name = 'Dr. ' . $post->last_name;	
		} else { 
			$doctor_name = $post->first_name . ' ' . $post->last_name;
		}
		
		//if ( $post->zodoc_link_text ) {
		//	$cta_link_text = $post->zodoc_link_text;			
		//} else {
			$cta_link_text = "Request a Consult with " . $doctor_name;
		//}

		
		$cta_link = $post->zodoc_link;
		$request_consult_link = get_page_link(1188);
		
		/*
		if( empty( $gallery ) && empty( $cta_link ) ) {
			return false;
		}
		*/
		
		$attr = array( 'class' => 'section media-carousel' );
		_s_section_open( $attr );
		
 			print( '<div class="column row" data-equalizer data-equalize-on="medium">' );
			
			if( !empty( $gallery ) ) {
				
				echo sprintf( '<h3>Some of the procedures performed by %s</h3>', get_the_title() );
 				echo '<div class="owl-carousel">';
				echo $gallery;
				echo '</div>';
			
			}
			
			// CTA
			
			// If ZocDoc link exists 
			if( !empty( $cta_link ) ) {
				
				$cta_inlinestyle = 'style="float:right;"';
				$button_text = '';

				if( !empty( $cta_link_text ) ) {
					//$button_text = $cta_link_text;
					$button_text = sprintf( 'Book Online Appointment');
				}
				
				printf( '<div class="cta columns medium-6"><a %s href="%s" class="btn white">%s</a></div>', $cta_inlinestyle, $cta_link, $button_text );
			} else {
				$cta_inlinestyle = '';
			}

				printf( '<div class="cta columns medium-6"><a style="float:left;" href="%s" class="btn white">%s</a></div>', $request_consult_link , $cta_link_text );
			
			print( '</div>' );
			
		_s_section_close();	
	}
	
	
	// Testimonial/Review
	section_testimonial_review();
	function section_testimonial_review() {
				
		global $post;
		
		// quote
		$quote = '';
		$quote_text = $post->patient_quote_text;
		$quote_description = $post->patient_quote_description;
		
		$review_id = $post->review_id;
 		$review = '';
		
		// nothing to show?
		if( empty( $quote_text ) && empty( $review_id ) ) {
			return false;
		}
		
		$content = '';
		
 		if( !empty( $quote_text ) ) {
			
 			if( !empty( $quote_description ) ) {
				$quote_description = sprintf( '<div class="quote-description">%s</div>', wpautop( $quote_description ) );
			}
			
			$quote = sprintf( '<div class="quote" data-equalizer-watch><div class="quote-text">%s</div>%s</div>', wpautop( $quote_text ), $quote_description );
			
			$content .= sprintf( '<div class="small-12 large-6 columns">%s</div>', $quote);
		}
		
		// Review 		
		if( !empty( $review_id ) ) {
 			$review = sprintf( '<div class="doctor-review">%s</div>', get_doctor_review( $review_id ) );
			
			$content .= sprintf( '<div class="small-12 large-6 columns">%s</div>', $review );
		}
		
		
 		
		$attr = array( 'class' => 'section testimonial-review' );
		_s_section_open( $attr );
		
 			print( '<div class="row" data-equalizer data-equalize-on="large">' );
			
			if( empty( $quote ) ) {
				printf( '<div class="small-12 columns">%s</div>', $review );
			}
			else if( empty( $review ) ) {
				printf( '<div class="small-12 columns">%s</div>', $quote );
			}
			else {
				echo $content;
			}
			
			print( '</div>' );
			
		_s_section_close();	
	}
	
	
	// Services, education, certificates etc.....
	section_services();
	function section_services() {
				
		global $post;
		
		/*
		Services Description
		Services Relaitonship field
		
		Education - $post->education, repeater 
		Certificates - $post->certificates
		Hospital Associaitons - $post->hospital_affiliations
		Professional Memberships - $post->professional_memberships
		Acheivements - $post->achievements
		*/
		
		$services_description  = _s_get_heading( $post->services_description, 'h4' );
		$services 			   = get_doctor_services();
		
		
		$education    = get_doctor_education();
		$certificates = _s_get_textarea( $post->certificates );
		$affiliations = _s_get_textarea( $post->hospital_affiliations );
		$memberships  = _s_get_textarea( $post->professional_memberships );
		$achievements = _s_get_textarea( $post->achievements );
		
		// Create accordion
		$accordion = '';
		$accordion_content = '';
		
		$is_active = ' is-active';
		
		/*
		<li class="accordion-item is-active" data-accordion-item>
		<!-- Accordion tab title -->
		<a href="#" class="accordion-title">Accordion 1</a>
	
		<!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
		<div class="accordion-content" data-tab-content>
		  <p>Panel 1. Lorem ipsum dolor</p>
		  <a href="#">Nowhere to Go</a>
		</div>
	  </li>
		*/
		
		if( !empty( $education ) ) {
			$accordion_title = '<a href="#" class="accordion-title"><h4>Education</h4></a>';
			$is_active = empty( $accordion_content ) ? $is_active : '';
			$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
			<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $education );
		}
		
		if( !empty( $certificates ) ) {
			$accordion_title = '<a href="#" class="accordion-title"><h4>Certificates</h4></a>';
			$is_active = empty( $accordion_content ) ? $is_active : '';
			$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
			<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $certificates );
		}
		
		if( !empty( $affiliations ) ) {
			$accordion_title = '<a href="#" class="accordion-title"><h4>Hospital Affiliations</h4></a>';
			$is_active = empty( $accordion_content ) ? $is_active : '';
			$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
			<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $affiliations );
		}
		
		if( !empty( $memberships ) ) {
			$accordion_title = '<a href="#" class="accordion-title"><h4>Professional Memberships</h4></a>';
			$is_active = empty( $accordion_content ) ? $is_active : '';
			$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
			<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $memberships );
		}
		
		if( !empty( $achievements ) ) {
			$accordion_title = '<a href="#" class="accordion-title"><h4>Achievements</h4></a>';
			$is_active = empty( $accordion_content ) ? $is_active : '';
			$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
			<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $achievements );
		}
		
		
		if( !empty( $accordion_content ) ) {
			$accordion = sprintf( '<ul class="accordion" data-accordion data-allow-all-closed="true">%s</ul>', $accordion_content );
		}
		
		
		$attr = array( 'class' => 'section services' );
		_s_section_open( $attr );
		
 			print( '<div class="column row">' );
			
				echo $services_description;
				
				echo $services;
				
				echo $accordion;
			
			
			print( '</div>' );
			
		_s_section_close();	
	}
	?>
	
	</main>


</div>

<?php
get_footer();
