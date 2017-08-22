<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>


<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	
		<?php
		
		// Hero
		section_hero();
		function section_hero() {
			
			$heading = sprintf( '<h1>%s</h1>', get_post_meta( get_the_ID(), 'hero_heading', true ) );
			$subheading = get_post_meta( get_the_ID(), 'hero_subheading', true );
			if( !empty( $subheading ) ) {
				$heading .= sprintf( '<h5>%s</h5>', get_post_meta( get_the_ID(), 'hero_subheading', true ) );
			}
			
			$content = sprintf( '<div class="panel">%s</div>', $heading );
			
			$photos = get_field( 'photos' );
			$background = '';
			
			if( !empty( $photos ) ) {
				$photo_ids = wp_list_pluck( $photos, 'ID' );
				shuffle( $photo_ids );
				
				$photo = wp_get_attachment_image_src( $photo_ids[0], 'hero' );
				
				$background = sprintf( 'background-image: url(%s);', $photo[0] );
			}
								
			$args = array(
				'html5'   => '<section %s>',
				'context' => 'section',
				'attr' => array( 'id' => 'hero', 'class' => 'section hero', 'style' => $background ),
				'echo' => false
			);
			
			$out = _s_markup( $args );
			$out .= '<div class="flex">';
			$out .= _s_structural_wrap( 'open', false );
			
			
			$out .= sprintf( '<div class="row"><div class="small-12 columns">%s</div></div>', $content );
			
			$out .= _s_structural_wrap( 'close', false );
			$out .= '</div>';
			$out .= '</section>';
			
			echo $out;
				
		}
		?>
	
		<?php
		
		function home_featured_menu_classes($classes, $item, $args) {
		  if($args->theme_location == 'home-featured') {
			$classes[] = 'column';
		  }
		  return $classes;
		}
		//add_filter('nav_menu_css_class','home_featured_menu_classes',1,3);
		
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
		
		
		// Grid
		section_default();
		function section_default() {
					
			global $post;
			
			if( empty( $post->post_content ) ) {
				return false;
			}
							
			// content/ video or photo
 			$media = '';
			$video_id = '';
			$video = '';
			
			$videos = get_field( 'video' );
						
			if( !empty( $videos ) ) {
				$video_id = $videos[0];
 				$video  = _s_get_foobox_video( $video_id );	
			}
			
			$attachment_id = get_field( 'photo' );
			$photo_ = _s_get_acf_image( $attachment_id );
			
			if( !empty( $video ) ) {
				$media = $video;
			}
			if( !empty( $photo ) ) {
				$media = $photo;
			}


 			if( !empty( $media ) ) {
				
				$content = sprintf( '<div class="small-12 large-6 columns">%s</div>', 
									apply_filters( 'pb_the_content', $post->post_content ) );
				
				$media = sprintf( '<div class="featured-media">%s</div>', $media );					
				$content .= sprintf( '<div class="small-12 large-6 columns">%s</div>', $media );
				
				$content = sprintf( '<div class="entry-content"><div class="row">%s</div></div>', $content );
			}
			else {
				$content = 	sprintf( '<div class="entry-content"><div class="column row">%s</div></div>', 
									 apply_filters( 'pb_the_content', $post->post_content ) );
			}
			
			$attr = array( 'class' => 'section default' );
			_s_section_open( $attr );
						
 					while ( have_posts() ) :
			
						the_post();
						
						echo $content;
							
					endwhile;
			
 			_s_section_close();	
		}
		
		
		
		// Featured Content
		section_featured_content();
		function section_featured_content() {
			global $post;
				
			$prefix = 'featured';
			$prefix = set_field_prefix( $prefix );
			
			$content = '';
		
			$rows = get_field( sprintf( '%sgrid', $prefix ) );
			$columns = '';
			
			if( !empty( $rows ) ) {
				foreach( $rows as $row ) {
					
					$photo = $row['grid_photo'];
					
					$background = '';
					
					if( !empty( $photo ) ) {
						//$photo = wp_get_attachment_image( $photo, 'large' );
						$attachment_url = wp_get_attachment_url($photo);
						$image_url = aq_resize( $attachment_url, 357, 272, true, true, true ); //resize & crop the image
						$image = '<img src="' . $image_url . '" alt="Featured Image" />';
					}
					
					$title = !empty(  $row['grid_title'] ) ? sprintf( '<%1$s>%2$s</%1$s>', 'h4', $row['grid_title'] ) : '';
					
					$description = isset(  $row['grid_description'] ) ? _s_get_textarea( $row['grid_description'] ) : '';
					
					$page = $row['grid_page'];
					$url = $row['grid_url'];
					
					if( !empty( $page ) ) {
						$url = $page;
					}
					
					$button = sprintf('<a href="%s" class="button-action">Learn More <i class="icon icon-arrow blue"></i></a>', $url);

					$details = sprintf( '<div class="details" data-equalizer-watch>%s%s%s</div>', $title, $description, $button);
						
					$columns .= sprintf( '<div class="column"><a href="%s">%s%s</a></div>', $url, $image, $details );
					
				}
		

			}
			
			if( !empty( $columns ) ) {
				
				$heading = '';
								
				if( !empty( $post->featured_heading ) ) {
					$heading = sprintf( '<div class="column row"><h2>%s</h2></div>', $post->featured_heading );
				}
								
				$content = sprintf( '%s<div class="row small-up-1 large-up-3 grid" data-equalizer data-equalize-on="large">%s</div>',
						   $heading,  $columns );
			}
			
					
			$attr = array( 'class' => 'section featured' );
			_s_section_open( $attr );
				echo $content;
			_s_section_close();	
		}
		
		
		// Doctor Testimonials
		section_doctor_quotes();
		function section_doctor_quotes() {
		
 			$ids = get_field( 'doctors' );	
			
 			if( empty( $ids ) ) 
				return false;
				
			$args = array(
					'post_type'      => 'team',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
					'order'          => 'ASC',
				);
				
			$args['post__in'] = $ids;
			$args['orderby'] = 'post__in';
		
			
			$columns =  '';
		
			$loop = new WP_Query( $args );
		
			if ( $loop->have_posts() ) : 
							
				while ( $loop->have_posts() ) : $loop->the_post(); 
							
					$testimonial = _get_doctor_home_testimonial( get_the_ID() );
					
					if( !empty( $testimonial ) ) {
						$columns .= sprintf( '<div class="owl-column">%s</div>', $testimonial );	
					}
 				
				endwhile;
   		
			else:
				return false;
			endif;
		
			wp_reset_postdata();
					
			
			$attr = array( 'class' => 'section doctor-quotes' );
			_s_section_open( $attr );
  				printf( '<div class="column row"><div class="owl-carousel owl-theme">%s</div></div>', $columns );
  			_s_section_close();	
			
		}
		?>
		
	</main>

</div>


<?php
get_footer();


