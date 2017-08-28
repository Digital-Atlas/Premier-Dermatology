<?php
get_header(); ?>

<?php
// Hero
section_hero();
function section_hero() {
		
	$heading = sprintf( '<h1>%s</h1>', get_the_title() );
	
	$content = $heading;
	
	$attr = array( 'class' => 'section hero' );
	_s_section_open( $attr );
	printf( '<div class="column row"><div class="table"><div class="cell">%s</div></div></div>', $content );	
	_s_section_close();		
}
?>

<?php
// Get the term ID

global $post;
$post_term = false;
$service_cat = false;
$terms = wp_get_post_terms( $post->ID, 'service_cat');
if( !empty( $terms ) ) {
	$post_term = $terms[0];
	$service_cat = $post_term->term_id;
}
?>

<section class="section default">

	<div class="wrap">

		<div class="row">
		
			<div class="large-4 columns">
				<div id="secondary" class="widget-area" role="complementary">
					
					
					<div class="show-for-large">
						<?php 
						// find first term of post
  						$services = get_services_list( $service_cat ); 
						
						if( !empty( $services ) ) {
							printf( '<h4>%s Services</h4>', $post_term->name );
						}
  						
						echo $services;
						?>
					</div>
					
					<div class="hide-for-large">
						<button class="button services" type="button" data-toggle="service-dropdown">Select Service</button>
						<div class="dropdown-pane services bottom" id="service-dropdown" data-dropdown>
							<?php echo $services; ?>
						</div>
					</div>
				
				</div>
			
			</div>
				
				
			<div class="large-8 columns">
		
				<div id="primary" class="content-area">
				
					<main id="main" class="site-main" role="main">
					<?php
						
					// Default
					section_default();
					function section_default() {
								
						global $post;
 						print( '<div class="entry-content">' );
					
							while ( have_posts() ) :
					
								the_post();
								
								the_content();
									
							endwhile;
					
						echo '</div>';
						
					}
					
					
					section_procedure_video();
					function section_procedure_video() {
								
						global $post;
						
						
						$video_description = $post->video_description;
						if( !empty( $video_description ) ) {
							$video_description = apply_filters( 'pb_the_content', $video_description );
						}
						
 						$video = get_field( 'video_post' );
						
						if( !empty( $video ) ) {
							
							$video_id = $video[0];
							
							$video = _s_get_foobox_video( $video_id );
							
							$caption = get_post_meta( $video_id, 'caption', true );
							
							if( !empty( $caption ) ) {
								$video .= sprintf( '<div class="caption">%s</div>', $caption );
							}
						}
						
						if( empty( $video_description ) && empty( $video ) ) {
							return false;
						}
						
						
 						print( '<div class="entry-content">' );
					
							echo $video_description;
							
							printf( '<div class="video-block">%s</div>', $video );
					
						echo '</div>';
						
					}
					
					
					section_before_and_after();
					function section_before_and_after() {
						global $post;
						
						$before_and_after_description = _s_get_textarea( $post->before_and_after_description );
 						
						$photos = get_field( 'before_and_after_photos' );
						
						$gallery = foobox_gallery( $photos, 'foobox-thumbnail', 'foobox-large', 'foobox-thumbnail' );
						
						if( !empty( $gallery ) ) {
							
							//print( '<div class="entry-content">' );
								
								echo $before_and_after_description;
								
								echo $gallery;

							//echo '</div>';
							
						}

						if (!empty ($gallery)) {
							printf("<p><small>*Before and after photos are unretouched from Dr. Matthew R. Kelleher's actual patients.</small><p>");
						}

						
					}
					
					
					// Questions
					section_questions();
					function section_questions() {
								
						global $post;
						
						$rows = get_field( 'questions' );
						
						if( empty( $rows ) ) {
							return false;
						}
						
						// Create accordion
						$accordion = '';
						$accordion_content = '';
						
						$is_active = ' is-active';
						
						foreach( $rows as $row ) {
							
							if( !empty( $row['question'] ) && !empty( $row['answer'] ) ) {
								$accordion_title = sprintf( '<a href="#" class="accordion-title"><h4>%s</h4></a>', $row['question'] );
								$is_active = empty( $accordion_content ) ? $is_active : '';
								$accordion_content .= sprintf( '<li class="accordion-item%s" data-accordion-item>%s
								<div class="accordion-content" data-tab-content>%s</div></li>', $is_active, $accordion_title, $row['answer'] );
							}
							
						}
						
						if( empty( $accordion_content ) ) {
							return false;
						}
						
						
						printf( '<div class="entry-content"><ul class="accordion" data-accordion data-allow-all-closed="true">%s</ul></div>', 	
								$accordion_content );
							
					}
					
					
					
					// Best Results
					section_best_results();
					function section_best_results() {
								
						global $post;
 						$best_results = $post->best_results;
						if( !empty( $best_results ) ) {
							$best_results = apply_filters( 'pb_the_content', $best_results );
 							printf( '<div class="entry-content">%s</div>', $best_results );
						}
					
					}
					
					
					// Brochure
					section_brochure();
					function section_brochure() {
								
						global $post;
 						$pdf = $post->brochure_pdf;
 						if( !empty( $pdf ) ) {
  							$pdf = wp_get_attachment_url( $pdf );
 							printf( '<div class="entry-content"><div class="download-brochure"><a href="%s"><i class="icon icon-pdf"></i><p>%s</p></a></div></div>', $pdf, 'Download Brochure' );
						}
					
					}
					
					// Locations
					section_locations();
					function section_locations() {
						
						$locations =  get_doctor_locations();
						
						if( !empty( $locations ) ) {
							
							printf( '<div class="entry-content"><h2>Offered at these locations</h2>%s</div>', $locations );
							
						}
						
					}
					
					?>
					
					</main>
				
				
				</div>
			
			</div>
		
		</div>
		
	
	</div>

</section>

<?php
get_footer();
