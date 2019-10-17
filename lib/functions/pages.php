
<?php


function _home_features_func( $atts ){
    return _home_features();

}
add_shortcode( 'homebar', '_home_features_func' );

function _home_features() {

                if ( has_nav_menu( 'home-featured' ) ) {
                        $args = array(
                                'theme_location' => 'home-featured',
                                'container' => 'div',
                                'container_class' => 'home-featured',
                                'container_id' => '',
                                'menu_id'        => 'home-featured',
                                'menu_class'     => 'menu',
                                //'menu_class'     => 'menu row small-up-2 medium-up-4',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                                'echo' => false
                        );

                        $attr = array( 'id' => 'featured-menu', 'class' => 'section featured-menu' );

                        _s_section_open( $attr );
                                printf( '<div class="column row">%s</div>', wp_nav_menu($args) );
                        _s_section_close();

                }

}


function section_benefits() {

						// check if the repeater field has rows of data
						if( have_rows('list_of_benefits') ):					

							printf('<div id="benefits-list"><div class="row benefits small-12 medium-12">');

						 	// loop through the rows of data
						    while ( have_rows('list_of_benefits') ) : the_row();

								$image = sprintf('<img src="%s" alt="Image" />', get_sub_field('image'));
								$title = get_sub_field('benefit_title');

								if (!get_sub_field('benefit_text')):
									$copy = '';
								else:
									$copy = get_sub_field('benefit_text');
								endif; 

						        printf('<div class="column small-4 block">%s<div class="inner"><h5>%s</h5>%s</div></div>', $image, $title, $copy);
						        //printf('<div class="column small-10 medium-10"><strong>%s</strong><br />%s</div>', get_sub_field('benefit_title'), get_sub_field('benefit_text'));						        
						       
						    endwhile;

						     printf('</div></div>');

						endif;
					}


	function section_infographic_stats($string) {

            if (!isset($string)) {
                $string = '';
            }

						// check if the repeater field has rows of data
						if( have_rows('infographic_stats') ):					

							printf('<div class="infographic-stats row small-12 medium-12">');

                                                        echo sprintf('<h2>%s Dermatology Expertise:</h2>', $string);

						 	// loop through the rows of data
						    while ( have_rows('infographic_stats') ) : the_row();

								$icon = sprintf('<img src="%s" alt="Icon" />', get_sub_field('icon'));
								$stat = get_sub_field('stat');

						        printf('<div class="column small-12 medium-6 large-6"><div class="inner"><div class="small-4 column icon">%s</div><div class="small-8 column data">%s</div></div></div>', $icon, $stat);
						       
						    endwhile;

						     printf('</div>');

						endif;
					}

	function section_testimonial() {

					if ( get_field('testimonial') ):

							$testimonial = get_field('testimonial');
							$video_id = get_field('featured_video');

							printf('<div class="patient-review small-12 medium-12">');

								if( !empty( $video_id ) ) {
					 				$video  = _s_get_foobox_video( $video_id );	
								}

							printf( '<div class="small-12 large-6 column testimonial"><span>%s</span></div><div class="small-12 large-6 column video">%s</div>', $testimonial, $video );								
						 
						    printf('</div>');
					endif;
					}



	function section_summary($breakpoint_classes = '') {

		if (get_field('introduction_summary')):
			
			$content = get_field('introduction_summary');

			printf('<div class="introductory-summary row small-12 %s">%s</div>', $breakpoint_classes, $content);
		endif;

	}					


	function section_surgical_services() {
		

		$attr = array ('class' => 'section default services-listing');

		_s_section_open( $attr );
	
		//printf ('<div id="surgical-services">');
		
		$args = array(
			'post_type'      => 'service',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'orderby' 		 => 'menu_order',
			'order'          => 'ASC',
			'tax_query' => array(
					array(
						'taxonomy' => 'service_cat',
						'field'    => 'slug',
						'terms'    => 'surgical',
					),
				),			
 		);

		// Use $loop, a custom variable we made up, so it doesn't overwrite anything
		$loop = new WP_Query( $args );
	
		// have_posts() is a wrapper function for $wp_query->have_posts(). Since we
		// don't want to use $wp_query, use our custom variable instead.

		

		if ( $loop->have_posts() ) : 
		
			$columns = $sections = '';
 						
 			while ( $loop->have_posts() ) : $loop->the_post(); 

 			$title = sprintf('<h5>%s</h5>', get_the_title());
 			
 			$body = sprintf('%s', get_the_content());
 			$body = preg_replace ("/<h2>(.*?)<\/h2>/i", "", $body);


 			$output = sprintf('<div class="row columns small-12 medium-11 item-service">%s<p>%s</p></div>', $title, $body);

 			echo $output;

 			endwhile;

 		endif;
		wp_reset_postdata();
		
		_s_section_close();

	}
