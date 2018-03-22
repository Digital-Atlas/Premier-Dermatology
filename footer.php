<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?>

</div><!-- #content -->

<?php
// Footer CTA
get_template_part( 'template-parts/section', 'footer-cta' );
?>

<?php
function _s_footer_copyright() {
	$privacy_policy = sprintf( '| <a href="%s" style="text-decoration:underline">Privacy Policy</a>', get_permalink( 5 ) );
	printf('<div class="copyright"><p>&copy; %s Premier Dermatology. <span>All rights reserved. %s</span></p></div>', date( 'Y' ), $privacy_policy );
}
?>


			
<footer id="colophon" class="site-footer" role="contentinfo">

	<div class="wrap">
	
		<div class="row footer-widgets">
		
			<?php
				$footer_logo = sprintf('<img src="%s" alt="%s"/>', THEME_IMG .'/footer-logo.png', get_bloginfo( 'name' ) );
				$site_url = site_url();
				$footer_logo = sprintf('<div class="footer-logo"><a href="%s" title="%s">%s</a></div>', $site_url, get_bloginfo( 'name' ), $footer_logo );
				
			?>
			
			<div class="small-12 columns show-for-small-only">
				<div class="widget">
				<?php
				echo $footer_logo;
				?>
				</div>
			</div>
			
			<div class="small-12 large-4 columns show-for-large">
				<div class="widget">
				<?php
				echo $footer_logo;
				?>
				</div>
			</div>
			
			<div class="small-12 medium-6 large-2 columns">
				<div class="widget">
					<?php
					if ( has_nav_menu( 'footer-1' ) ) {
						$args = array(
							'theme_location' => 'footer-1',
							'container' => 'false',
							'container_class' => '',
							'container_id' => '',
							'menu_id'        => 'footer-1-menu',
							'menu_class'     => 'menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 0
						);
						print( '<h4>Find</h4>' );
						wp_nav_menu($args);				
					}
					?>
				</div>
			</div>
			
			
			<div class="small-12 medium-6 large-3 columns">
				<div class="widget">
					<?php
					if ( has_nav_menu( 'footer-2' ) ) {
						$args = array(
							'theme_location' => 'footer-2',
							'container' => 'false',
							'container_class' => '',
							'container_id' => '',
							'menu_id'        => 'footer-2-menu',
							'menu_class'     => 'menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 0
						);
						print( '<h4>Premier Dermatology</h4>' );
						wp_nav_menu($args);				
					}
					?>
				</div>
			</div>
			
			
			<div class="small-12 medium-6 columns show-for-medium-only">
				<div class="widget">
				<?php
				echo $footer_logo;
				?>
				</div>
			</div>
			
			<div class="small-12 medium-6 large-3 columns">
				<div class="widget">
					<h4>Connect With Us</h4>
					<?php
					$social_profiles = array( 
											'facebook' => 'https://www.facebook.com/premierdermillinois/',
											'twitter' => 'https://twitter.com/premierdermil',
											'youtube' => 'https://www.youtube.com/channel/UCqiOz5Pra2VpEo3qK35Y8cA',
											'instagram' => 'https://www.instagram.com/premierdermillinois/',

										);
											
					_s_do_social_icons( $social_profiles );
					_s_footer_copyright();
					?>
 				</div>
			</div>
				
				
				
		</div>
	
	</div>
	
	

 </footer><!-- #colophon -->

<?php wp_footer(); ?>

<?php if (is_singular('post')): ?>
<script>
jQuery(document).ready(function(){
    $ = jQuery; 
    $('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
}); 

});</script>
<?php endif; ?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1032240816856511');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1032240816856511&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</div> <!-- Close .site-container opened in header -->
</body>
</html>
