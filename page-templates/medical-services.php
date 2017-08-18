<?php
/*
Template Name: Medical Services Landing
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );
	
?>

<section class="section default">

	<div class="wrap">

		<div class="row">
		
			<div class="large-4 columns" id="menu-choose-service">
				<div id="secondary" class="widget-area" role="complementary">
					
					
					<div class="show-for-large">
					<h4>Choose a Service:</h4>
					<?php echo get_services_list( 7 ); ?>
					</div>
					
					<div class="hide-for-large">
						<button class="button services" type="button" data-toggle="service-dropdown">Choose a Service</button>
						<div class="dropdown-pane services bottom" id="service-dropdown" data-dropdown>
							<?php echo get_services_list( 7 ); ?>
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
				
					
					
					// Testimonials
					section_testimonials();
					function section_testimonials() {
																				
						$rows = get_field( 'testimonials' );
						
						if( empty( $rows ) ) {
							return false;
						}
						
						$columns = '';
						
						foreach( $rows as $row ) {
							
							$text = sprintf( '<div class="testimonial-text">%s</div>', _s_get_textarea( $row['text'] ) );
							$description = '';
							if( !empty( $row['description'] ) ) {
								$description = sprintf( '<div class="testimonial-description">%s</div>', _s_get_textarea( $row['description'] ) );
							}
							
							$columns .= sprintf( '<div class="column">%s%s</div>', $text, $description );
							
						}
						
						$heading = '<h3>What our patients are saying about us</h3>';
						
						$content = sprintf( '%s<div class="row small-up-1 large-up-2 grid">%s</div>', $heading, $columns );
					
						printf( '<section class="sub-section testimonials">%s</section>', $content );
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
