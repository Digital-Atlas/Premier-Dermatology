<?php
/*
Template Name: Services Landing
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );
	
?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	<?php
			
	
	// Default
	section_default();
	function section_default() {
				
		global $post;
		
		$attr = array( 'class' => 'section default' );
		_s_section_open( $attr );		
			print( '<div class="column row"><div class="entry-content">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div></div>';
		_s_section_close();	
	}

	
	
	// Services
	section_services();
	function section_services() {
				
		$prefix = 'services';
		$prefix = set_field_prefix( $prefix );
		
		$content = '';
	
		$rows = get_field( sprintf( '%sgrid', $prefix ) );
		$columns = '';
		
		if( !empty( $rows ) ) {
			foreach( $rows as $row ) {
 				
				$photo = $row['grid_photo'];
				$background = '';
				
				if( !empty( $photo ) ) {
					$photo = wp_get_attachment_image( $photo, 'large' );
					//$background = sprintf( 'style="background-image: url(%s)"', $photo[0] );
				}
				
				$title = !empty(  $row['grid_title'] ) ? sprintf( '<%1$s>%2$s</%1$s>', 'h2', $row['grid_title'] ) : '';
				
				$description = isset(  $row['grid_description'] ) ? _s_get_textarea( $row['grid_description'] ) : '';
				
				$page = $row['grid_page'];
				$url = $row['grid_url'];
				
				if( !empty( $page ) ) {
					$url = $page;
				}
				
				$details = sprintf( '<div class="details" data-equalizer-watch>%s%s</div>', $title, $description );
					
				$columns .= sprintf( '<div class="column"><a href="%s">%s%s<i class="icon icon-more"></i></a></div>', $url, $photo, $details );
 				
			}
	
	
		}
		
		if( !empty( $columns ) ) {
			$content = sprintf( '<div class="row small-up-1 large-up-3 grid" data-equalizer data-equalize-on="large">%s</div>', $columns );
 		}
		
				
		$attr = array( 'class' => 'section services' );
		_s_section_open( $attr );
			echo $content;
		_s_section_close();	
	}
	?>
	</main>


</div>

<?php
get_footer();
