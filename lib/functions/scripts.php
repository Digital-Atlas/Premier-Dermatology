<?php

add_action( 'wp_enqueue_scripts', '_s_register_scripts' );
function _s_register_scripts() {
	//wp_register_script( 'gmaps', sprintf( 'https://maps.googleapis.com/maps/api/js?key=%s', GOOGLE_API_KEY ), array(), '', true );
	wp_register_script( 'foundation', trailingslashit( THEME_JS ) . 'foundation.min.js', array('jquery'), '', true );
	wp_register_script( 'front-page', trailingslashit( THEME_JS ) . 'front-page.js', array('jquery'), '', true );
	
 	wp_register_script( 'locations', trailingslashit( THEME_JS ) . 'locations.js', array('jquery'), '', true );
	
	$project_script_url = 'project.js';
						
	// Child Theme JS
	wp_register_script( 'project' , trailingslashit( THEME_JS ) . $project_script_url, 
			array(
					'jquery', 
 					'wp-util',
					'foundation'
					), 
				NULL, TRUE );
				
	
	// Owl Carousel
	wp_register_script( 'owl-carousel', 
						trailingslashit( THEME_ASSETS ) . 'modules/owl.carousel/dist/owl.carousel.min.js', 
						array('jquery'), '', true );
	wp_register_script( 'owl-carousel-config', 
						trailingslashit( THEME_JS ) . 'owl-carousel.config.js', 
						array('owl-carousel'), '', true );
	wp_register_style( 'owl-carousel', 
					   trailingslashit( THEME_ASSETS ) . 'modules/owl.carousel/dist/assets/owl.carousel.min.css' , 
					   false );
	wp_register_style( 'owl-carousel-theme', 
					   trailingslashit( THEME_ASSETS ) . 'modules/owl.carousel/dist/assets/owl.theme.default.min.css' , 
					   false );
	
}


// Load Scripts
add_action( 'wp_enqueue_scripts', '_s_load_scripts' );
function _s_load_scripts() {
 		
		wp_enqueue_script( 'project' );
		
		if( is_front_page() ) {
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
			wp_enqueue_script( 'owl-carousel' );
 			wp_enqueue_script( 'front-page');	
		}
		
		if( is_page_template( 'page-templates/locations.php' ) || is_page_template( 'page-templates/book-appointment.php' ) ) {
 			wp_enqueue_script( 'locations');	
		}
		
		if( is_singular( 'team' ) ) {
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_script( 'owl-carousel-config' );
		}
}


function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array( 'project', 'front-page' );
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);


function add_async_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_async = array( 'jquery-core', 'jquery-migrate', 'foobox-min' );
     
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
          return str_replace(' src', ' async src', $tag);
      }
   }
   return $tag;
}


// Google Analytics
add_action( 'wp_footer', 'add_analytics');

function add_analytics() {

$script_old = sprintf('<script>(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create", "UA-20585528-1", {"cookieDomain":"auto"});ga("send", "pageview");</script>');

    $script = sprintf('<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-44281803-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
    gtag(\'js\', new Date());

    gtag(\'config\', \'UA-44281803-2\');
    </script>
');

               echo $script_old;
echo $script;
}



//add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
