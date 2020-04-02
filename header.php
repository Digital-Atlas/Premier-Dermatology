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

#interstitial { 
			display: none;
			padding: 30px;
			text-align: center;
			background: #e0e6dd;
			position: fixed;
			left: 0;
			width: 100vw;
			z-index: 999999;
			-webkit-transition: all .3s cubic-bezier(.215,.61,.355,1);
			-moz-transition: all .3s cubic-bezier(.215,.61,.355,1);
			-ms-transition: all .3s cubic-bezier(.215,.61,.355,1);
			-o-transition: all .3s cubic-bezier(.215,.61,.355,1);
			transition: all .3s cubic-bezier(.215,.61,.355,1);
			margin-left: calc( 0px - (100vw - 1440)/2); 
		}
		#interstitial .title { font-size: 24px; font-weight: bold; margin-bottm: 12px; }
		#interstitial a { font-weight: bold; color:#000000; text-decoration: underline; }
		#interstitial .button { background: #307da1; color: #ffffff; margin-top: 30px; padding: 5px 28px; border-radius: 5px; text-transform: uppercase; display: inline-block; cursor: pointer; text-decoration: none; }
		#interstitial .content { max-width: 1011px; color: #000000; margin: 0 auto;}
		#interstitial .close-interstitial { top: 20px; right: 35px; background: none; position: absolute; cursor: pointer; }
		.nowrap { white-space: nowrap;display: inline; }
		html:not(.note) #fixed { top: 0 !important; }
		
		html.note #interstitial { 
			display: block;
		}	
		@media only screen and (max-width: 1023px) {
			html.note #interstitial { position: relative; }
			html.note:not(.sticky-header) #fixed { position: initial; }
			html.note:not(.sticky-header) #main-container { padding-top: 0 !important; }
			html.sticky-header .sticky-header .fixed { top: 0 !important; }
			html.sticky-header #content { padding-top: 0 !important; }
			#interstitial .close-interstitial { top: 10px; right: 10px; }
		}
		
		.teledermatology { text-align: left; padding: 20px 50px; }
		@media screen and (max-width: 800px) { 
			.teledermatology {padding: 20px 0 !important; } 
			.teledermatology .btn { padding: 10px ; padding-right:30px; } 
			.teledermatology .btn:after{ height: 18px; right: -10px; }
		}
		.no-touchevents a[href^="tel:"] {
			pointer-events: all;
			cursor: pointer;
		}

		a.btn:hover {
			background: #bf2c52b3;
			color: #fff;;
			text-decoration: none; 
		}
		.hidden { display: none; }
</style>
</head>

<body <?php body_class(); ?>>
	<?php 
	/* Interstitial */
	echo get_template_part('template-parts/content','interstitial'); 
	?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

<div id="page" class="site-container">
	
	<div class="sticky-header">
		<div class="fixed" id="fixed">

			<?php

			/*if ( get_the_ID() == 169 || get_the_ID() == 174 ) {
				$phone = get_field('phone', get_the_ID());
				echo sprintf('<div class="ribbon">Same Day Appointments <span class="show-for-large">Available</span><a href="tel:%s">Call %s<span class="show-for-large">To Schedule.</span></a></div>', $phone, $phone );
			}*/


			?>

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
	<?php  if(is_singular("location")):
		$status = get_post_meta(get_the_ID(), 'hero_status')[0];
		
		if($status == 'TELEDERMATOLOGY') {
			switch (get_the_ID()) {
				case 169:
					echo "<style>.elementor-element-a3a59f1 { display: none; } </style>";
					break;
				case 174:
					echo "<style>.elementor-element-421e234a { display: none; } </style>";
					break;
				case 176:
					echo "<style>.elementor-element-5ab22582 { display: none; } </style>";
					break;
				case 178:
					echo "<style>.elementor-element-335ed00a { display: none; } </style>";
					break;
				case 180:
					echo "<style>.elementor-element-54f80f88 { display: none; } </style>";
					break;
			}
				 ?>
					<section class="section hero" id="hero" role="region" aria-labelledby="banner" style="background: url('https://pdskin.com/wp-content/uploads/2020/03/premier-dermatology-cosmetic-young-woman.jpg') 50% 0px / cover no-repeat;">
					<div class="flex">
					   <div class="wrap">
						  <div class="row">
							 <div class="large-5 columns">
								<div class="panel teledermatology">
									   <?php $heading = sprintf( '<h1 class="hidden">%s</h1>', get_post_meta( get_the_ID(), 'hero_heading', true ) );
										echo $heading;
									   ?>
									   <h1 style="white-space: nowrap;">Introducing<br> Teledermatology</h1>
									   <h5>Personalized skincare appointments from the comfort of your own home.</h5>
									   <p>
										<a class="btn" href="tel:+18555357175"><span>CALL NOW TO SCHEDULE</span></a>
									   </p>
									   <a href="/teledermatology/" style="display: block; color: #fff; text-decoration: underline; font-size: 19px; margin: 20px; white-space: nowrap">See how it works &gt;</a>
								</div>
							 </div>
							 <div class="large-4 columns">
								<?php echo gravity_form( 4, false, false, false, '', false ); ?>
							 </div>
							 <div class="large-3 columns">
							 </div>
						  </div>
					   </div>
					</div>
					</section>
				<?php 
			 }
		endif;
	?>