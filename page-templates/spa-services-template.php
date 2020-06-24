<?php
/*
Template Name: Spa Services - Service Post Type* Template Post Type: service
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );
	
?>

<section class="section default">

	<div class="wrap">

		<div class="row">
		
			<div class="medium-4 columns" id="menu-choose-service">
				<div id="secondary" class="widget-area" role="complementary">
					
					<div class="show-for-large">
					<h4>Choose a Service:</h4>
					<?php echo get_services_list( 9 ); ?>
					</div>
					
					<div class="hide-for-large">
						<button class="button services" type="button" data-toggle="service-dropdown">Choose a Service</button>
						<div class="dropdown-pane services bottom" id="service-dropdown" data-dropdown>
							<?php echo get_services_list( 9 ); ?>
						</div>
					</div>
				
				</div>
		
			</div>
		
			<div class="medium-8 columns">
				
				<div id="primary" class="content-area">
				
					<main id="main" class="site-main" role="main">
					<?php
							
					// Default
					//section_default();
					function section_default() {
								
						global $post;
 						print( '<div class="entry-content">' );
					
							while ( have_posts() ) :
					
								the_post();
								
								the_content();
									
							endwhile;
					
						echo '</div>';
						
					}
				
					
					section_spa_hero();
					function section_spa_hero() {

						$background = get_field('spa_hero');
						$content = get_field('spa_introductory_summary');

						$out .= sprintf( '<section class="default row" id="spa-hero"><div class="columns small-12 large-6">%s</div><div  style="background-image:url(%s);" class="columns small-12 large-6 background"></div></section>', $content, $background );
		
						
						echo $out;
					}



					section_addtl_summary();
					function section_addtl_summary() {

						$content = get_field('addtional_summary');
						$file_attachment = get_field('spa_brochure');

						if ($file_attachment) { 
							$download_brochure = sprintf('<div class="columns small-12"><a class="btn white" href="%s" target="_blank" rel="noopener">Download Spa Brochure (PDF)</a></div>',$file_attachment);
						}


						printf('<div class="introductory-summary row"><div class="columns small-12 medium-11">%s</div>%s</div>', $content, $download_brochure);
					}

					// Team
					section_team();
					function section_team() {
												
						$rows = get_field( 'team' );
						
						if( empty( $rows ) ) {
							return false;
						}
						
						$content = '';
						
						foreach( $rows as $row ) {
							$content .= get_team( $row );
						}
						
						printf( '<section class="sub-section team">%s</div>', $content );
						
					}
					
					
					
					?>
					</main>
				
				
				</div>
		
		</div>
		
	</div>
	
</section>

<?php
get_footer();
