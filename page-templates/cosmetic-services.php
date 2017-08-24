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
				
					
					//section_collage();

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

							printf('<div id="benefits-list"><div class="row benefits small-12 medium-12">');

						 	// loop through the rows of data
						    while ( have_rows('list_of_benefits') ) : the_row();

								$image = sprintf('<img src="%s" alt="Image" />', get_sub_field('image'));
								$title = get_sub_field('benefit_title');
								$copy = get_sub_field('benefit_text');

						        printf('<div class="column small-12 medium-12 large-4">%s<div class="inner"><h5>%s</h5><p>%s<p></div></div>', $image, $title, $copy);
						        //printf('<div class="column small-10 medium-10"><strong>%s</strong><br />%s</div>', get_sub_field('benefit_title'), get_sub_field('benefit_text'));						        
						       
						    endwhile;

						     printf('</div></div>');

						endif;
					}

					// Infographics ACF Repeater
					section_infographic_stats();
					function section_infographic_stats() {

						// check if the repeater field has rows of data
						if( have_rows('infographic_stats') ):					

							printf('<div class="infographic-stats row small-12 medium-12">');

						 	// loop through the rows of data
						    while ( have_rows('infographic_stats') ) : the_row();

								$icon = sprintf('<img src="%s" alt="Icon" />', get_sub_field('icon'));
								$stat = get_sub_field('stat');

						        printf('<div class="column small-12 medium-6 large-6"><div class="inner"><div class="small-4 column icon">%s</div><div class="small-8 column data">%s</div></div></div>', $icon, $stat);
						       
						    endwhile;

						     printf('</div>');

						endif;
					}


					// Testimonial and Video 
					section_cosmetic_testimonial();
					function section_cosmetic_testimonial() {

							printf('<div class="patient-review small-12 medium-12">');

								$testimonial = get_field('cosmetic_testimonial');
								$video_id = get_field('cosmetic_featured_video');

								if( !empty( $video_id ) ) {
					 				$video  = _s_get_foobox_video( $video_id );	
								}

							printf( '<div class="small-12 large-4 column testimonial"><span>%s</span></div><div class="small-12 large-8 column video">%s</div>', $testimonial, $video );								


						  
						       
						     printf('</div>');
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
