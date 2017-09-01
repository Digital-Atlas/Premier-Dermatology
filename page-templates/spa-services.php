<?php
/*
Template Name: Spa Services Landing
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
						$args = array(
							'html5'   => '<section %s>',
							'context' => 'section',
							'attr' => array( 'id' => 'spa-hero', 'class' => 'section', 'style' => 'background-image:url('. $background .')' ),
							'echo' => false
						);
						
						$out = _s_markup( $args );
						$out .= '<div class="flex">';
						$out .= _s_structural_wrap( 'open', false );
						
						
						$out .= sprintf( '<div class="row columns small-8 medium-8 large-6">%s</div>', $content );
						
						$out .= _s_structural_wrap( 'close', false );
						$out .= '</div>';
						$out .= '</section>';
						
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
