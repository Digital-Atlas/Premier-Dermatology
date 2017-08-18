<?php
/*
Template Name: Cosmetic Services Landing
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
					
					
					<div class="show-for-medium">
					<h4>Choose a Service:</h4>
					<?php echo get_services_list( 8 ); ?>
					</div>
					
					<div class="hide-for-medium">
						<button class="button services" type="button" data-toggle="service-dropdown">Choose a Service</button>
						<div class="dropdown-pane services bottom" id="service-dropdown" data-dropdown>
							<?php echo get_services_list( 8 ); ?>
						</div>
					</div>
				
				</div>
		
			</div>
		
		
			<div class="medium-8 columns">
				
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
								
								//the_content();
									
							endwhile;
					
						echo '</div>';
						
					}
				
					
					section_collage();

					function section_collage() {

						printf('<div class="row columns small-12 medium-12" id="services-premium-intro">');
						printf('<div class="column small-12 large-6" id="awesome-copy"><h3>Experts in <br />cosmetic skincare.</h3><p>Experience, training, and compassionate care means the best treatment options and after care.</p></div>');
						printf('<div class="column small-12 large-6" id="awesome-image"><img src="http://via.placeholder.com/450x350"></div>');
						printf('</div>');

					}



					// Benefits ACF Repeater
					section_benefits();
					function section_benefits() {

						// check if the repeater field has rows of data
						if( have_rows('list_of_benefits') ):					

						 	// loop through the rows of data
						    while ( have_rows('list_of_benefits') ) : the_row();
								printf('<div id="benefits-list"><div class="row benefits small-10 medium-12">');
						        printf('<div class="column small-2 medium-2">%s</div>', get_sub_field('icon') );
						        printf('<div class="column small-10 medium-10"><strong>%s</strong><br />%s</div>', get_sub_field('benefit_title'), get_sub_field('benefit_text'));						        
						        printf('</div></div>');
						    endwhile;

						else :

						    // no rows found
						endif;
						

					}

					
					// Featured Content
					//section_featured_content();
					function section_featured_content() {
						global $post;
							
						$prefix = 'featured_block';
						$prefix = set_field_prefix( $prefix );
						
						$content = '';
					
						$rows = get_field( sprintf( '%sgrid', $prefix ) );
						$columns = '';
						
						if( !empty( $rows ) ) {
							foreach( $rows as $row ) {
								
								$photo = $row['grid_photo'];
								$background = '';
								
								if( !empty( $photo ) ) {
									$photo = wp_get_attachment_image_src( $photo, 'large' );
									$background = sprintf( ' style="background-image: url(%s)"', $photo[0] );
									$photo = sprintf( '<div class="thumbnail"%s></div>', $background );
								}
								
								$title = !empty(  $row['grid_title'] ) ? sprintf( '<%1$s>%2$s</%1$s>', 'h5', $row['grid_title'] ) : '';
								
								$description = isset(  $row['grid_description'] ) ? _s_get_textarea( $row['grid_description'] ) : '';
								
								$page = $row['grid_page'];
								$url = $row['grid_url'];
								
								if( !empty( $page ) ) {
									$url = $page;
								}
								
								$details = sprintf( '<div class="details">%s%s<a href="%s" class="btn white small">Find Out More</a></div>', $title, $description, $url );
									
								$columns .= sprintf( '<div class="column"><div class="featured-block">%s%s</div></div>', $photo, $details );
								
							}
					
			
						}
						
						if( !empty( $columns ) ) {
																		
							$content = sprintf( '<div class="row small-up-1">%s</div>',  $columns );
						}
						
						
						printf( '<div class="entry-content">%s</div>', $content );
					}
					
					
					
					// Infographic
					//section_infographic();
					function section_infographic() {
						global $post;
							
						$prefix = '';
						$prefix = set_field_prefix( $prefix );
						
						$content = '';
					
						$attachment_id = $post->infographic;
						
						if( !$attachment_id ) {
							return false;
						}
						
						$image = wp_get_attachment_image( $attachment_id, 'large' );
						
						printf( '<div class="entry-content">%s</div>', $image );
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
