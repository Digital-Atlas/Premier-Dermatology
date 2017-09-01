<?php
/*
Template Name: Surgical Services Landing
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );
	
?>

<section class="section default">

	<div class="wrap">

			<div class="large-10 medium-centered columns">
				
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
					?>

					</main>
				</div>


			</div> <!-- Close wrap -->
				
			<?php 

					// Benefits ACF Repeater
					section_benefits();		
					
					printf('</div>'); // Close .wrap

					printf('<div class="skin-cancer-treatments-hero"><h2>Skin Cancer Treatments</h2></div>');




					printf('<section class="section default services"><div class="wrap">');
					
					// Introductory Summary ACF
					section_summary('small-10 medium-8 medium-centered');

					// Surgical Services Query
					section_surgical_services();

			
					// Infographics ACF Repeater
					//section_infographic_stats();
				
					// Testimonial and Video 
					//section_testimonial();
				

					?>

					</div>

					<?
					printf('<section class="section melanoma"><div class="melanoma-summary row small-12 medium-8 medium-centered">%s</div>', get_field('melanoma_summary'));
					?>

					</section>

					</main>
				
			

	
</section>

<?php
get_footer();
