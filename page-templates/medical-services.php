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
				
					

					// Benefits ACF Repeater
					section_benefits();
					

					// Introductory Summary ACF
					section_summary();

					function section_summary() {

						$content = get_field('introduction_summary');

						printf('<div class="introductory-summary row small-12">%s</div>', $content);

					}


					// Infographics ACF Repeater
					section_infographic_stats();
				
					// Testimonial and Video 
					section_testimonial();
				

					?>
					</main>
				
				
				</div>
		
		</div>
		
	</div>
	
	</div>
	
</section>

<?php
get_footer();
