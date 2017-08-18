<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel='dns-prefetch' href='//maps.googleapis.com' />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

<div id="page" class="site-container">
	
	<div class="sticky-header">
		<div class="fixed">
			<header id="masthead" class="site-header" role="banner">
				<div class="wrap">
					<div class="column row">
						<div class="inner">
						<?php
						// Desktop Menu
						$args = array(
							'theme_location' => 'secondary',
							'menu' => 'Secondary Menu',
							'container' => 'false',
							'container_class' => '',
							'container_id' => '',
							'menu_id'        => 'secondary-menu',
							'menu_class'     => 'menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 0,
							'echo' => false
						);
						if( has_nav_menu( 'secondary' ) ) {
							printf ( '<nav id="secondary-navigation" class="nav-secondary" role="navigation" aria-hidden="true">%s</nav>', 
									 wp_nav_menu($args) );	
						}
									
						?>
						
						<div class="site-branding">
					
							<?php		
							$logo = sprintf('<img src="%s" alt="%s"/>', THEME_IMG .'/logo.png', get_bloginfo( 'name' ) );
							$site_url = site_url();
							printf('<div class="site-title"><a href="%s" title="%s">%s</a></div>', $site_url, get_bloginfo( 'name' ), $logo );
							?>
				
						</div><!-- .site-branding -->
					
						<nav id="site-navigation" class="nav-primary" role="navigation">
							<?php
								// Desktop Menu
								$args = array(
									'theme_location' => 'primary',
									'menu' => 'Primary Menu',
									'container' => 'false',
									'container_class' => '',
									'container_id' => '',
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'menu',
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth' => 0
								);
								wp_nav_menu($args);						
								
							?>
					</nav><!-- #site-navigation -->
						</div>		
					</div>
				
				</div>
				
			</header><!-- #masthead -->
			
		</div>
	
	</div>
		
	<div id="content" class="site-content">