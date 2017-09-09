<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'column row' ); ?>>
	
	<?php
	if( !is_single() && has_post_thumbnail() ) {
  		$thumb = get_post_thumbnail_id();
  		$attachment_url = wp_get_attachment_url($thumb, 'large');
 		$image_url = aq_resize( $attachment_url, 400, null, true, true, true ); //resize & crop the image
		$image = '<img src="' . $image_url . '" alt="Featured Image" />';			
		printf( '<a href="%s">%s', get_permalink(),$image );
	

		//the_post_thumbnail( 'post-thumbnail' );	
		echo '</a>';
	}
	?>
	
	<div class="entry-content">
	
		<header class="entry-header">
			<?php
			if( is_single() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			}
			else {
				printf( '<h3><a href="%s">%s</a></h3>', get_permalink(), get_the_title() );
			}
			?>
 		</header><!-- .entry-header -->
		<?php 
		if( is_single() ) {
			
			the_content(); 
			
			echo _s_get_addtoany_share_icons();
			
		} else {
	
			_s_the_excerpt( '', '' );
			
			printf( '<p class="read-more"><a href="%s" class="more">Continue Reading ></a></p>', get_permalink() ) ;
		}
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
