<?php


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

	function section_testimonial() {

							printf('<div class="patient-review small-12 medium-12">');

								$testimonial = get_field('testimonial');
								$video_id = get_field('featured_video');

								if( !empty( $video_id ) ) {
					 				$video  = _s_get_foobox_video( $video_id );	
								}

							printf( '<div class="small-12 large-4 column testimonial"><span>%s</span></div><div class="small-12 large-8 column video">%s</div>', $testimonial, $video );								


						  
						       
						     printf('</div>');
					}