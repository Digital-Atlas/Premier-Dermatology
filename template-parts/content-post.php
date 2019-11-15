<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

	$id = $post->id;
	$title = $post->title;
	$date = $post->date;
	$content = nl2br($post->content);
	$excerpt = $post->excerpt;
	$image = $post->featured_image->web;


?>


<article id="post-<?php echo $id; ?>" <?php post_class( 'column small-12' ); ?>>
	

	<div class="entry-content">
	
		<header class="entry-header">
		<?php 
			echo sprintf('<h2 class="entry-title">%s</h2>', $title);
			echo sprintf('<div class="featured-image clear"><img src="%s" /></a></div><br />', $image );
		?>

		

 		</header><!-- .entry-header -->
		<?php 
		
		echo $content;

	
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
