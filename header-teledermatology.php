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

<style>

@media screen and (min-width: 64em) {
    .site-header .inner .nav-secondary li {
        padding: 0 15px;
    }
}


.gform_wrapper .top_label input.medium, .gform_wrapper .top_label input.large {
    background: #e5e5e5;
    color: #444;
    border: none;
    min-height: 45px;
    border-radius: 5px;
}

.gform_wrapper select.small, .gform_wrapper select.medium {
    height: 40px;
    background: #e5e5e5;
    border: none;
    border-radius: 0;
    color: #444;
}

.gform_wrapper .top_label .gfield_label {
text-transform: inherit;
font-weight: normal;
}

.gform_wrapper .gfield_radio li label {
    font-size: 16px;
}

.gform_wrapper ul.gfield_radio li {
        margin-right: 0 !important;
}

.widget-area input.medium {
    width: 100% !important;
}

.icon-phone:before {
    content: '';
} 

.ribbon { 
 	padding: 5px;
    background-color: #97BF40;
    font-size: 15px;
    color: #fff;
    text-align: center;
}

.ribbon a { 
	color: #fff;
        text-decoration: underline;
font-weight: bold;
        pointer-events: all;
        cursor: pointer;	
position:relative;
    z-index: 999;
}

</style>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

<div id="page" class="site-container">
	
	<div class="sticky-header">
		<div class="fixed">

			<?php

			if ( get_the_ID() == 169 || get_the_ID() == 174 ) {
				$phone = get_field('phone', get_the_ID());
				echo sprintf('<div class="ribbon">Same Day Appointments <span class="show-for-large">Available</span><a href="tel:%s">Call %s<span class="show-for-large">To Schedule.</span></a></div>', $phone, $phone );
			}


			?>

			<header id="masthead" class="site-header" role="banner">
				<div class="wrap">
					<div class="column row">
						<div class="inner">
						
						
						<div class="site-branding">
					
							<?php		
							$logo = sprintf('<img src="%s" alt="%s"/>', THEME_IMG .'/logo.png', get_bloginfo( 'name' ) );
							$site_url = site_url();
							printf('<div class="site-title"><a href="%s" title="%s">%s</a></div>', $site_url, get_bloginfo( 'name' ), $logo );
							?>
				
						</div><!-- .site-branding -->
					
						<nav id="site-navigation" class="nav-primary" role="navigation">
							<span>Schedule your appointment now</span> <a class="btn" href="tel:+1 8157414343" style="margin: 0 0 0 10px ;">CALL (815) 741-4343</a>
					</nav><!-- #site-navigation -->
						</div>		
					</div>
				
				</div>
				
			</header><!-- #masthead -->
			
		</div>
	
	</div>
		
	<div id="content" class="site-content">
