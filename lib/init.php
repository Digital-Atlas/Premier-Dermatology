<?php

/****************************************
	include_once WordPress Cleanup functions
*****************************************/
	include_once( 'wp-cleanup.php' );
		
		
/****************************************
	Theme Settings
*****************************************/
	include_once( 'theme-settings.php' );


/****************************************
	include_onces (libraries, Classes etc)
*****************************************/
	include_once( 'includes/cpt-core/CPT_Core.php' );

	include_once( 'includes/taxonomy-core/Taxonomy_Core.php' );
	
	include_once( 'includes/theme-functions/array.php' );


/****************************************
	Functions
*****************************************/
		
	include_once( 'functions/theme.php' );
	
	include_once( 'functions/template-tags.php' );
 
	include_once( 'functions/acf.php' );
	
	include_once( 'functions/fonts.php' );
	
	include_once( 'functions/scripts.php' );
	
	include_once( 'functions/foobox.php' );
	
	include_once( 'functions/menus.php' );
	
	include_once( 'functions/maps.php' );
	
	include_once( 'functions/locations.php' );
	
	include_once( 'functions/doctors.php' );
	
	include_once( 'functions/resources.php' );
	
	include_once( 'functions/services.php' );

	include_once( 'functions/pages.php' );
	
	include_once( 'functions/addtoany.php' );
	
	//include_once( 'functions/gravity-forms.php' );
	
	//include_once( 'functions/widgets.php' );
	
	require_once( 'functions/aq_resizer.php' );
	
/****************************************
	Page Builder
*****************************************/
	include_once( 'page-builder/functions.php' );
	
	include_once( 'page-builder/markup.php' );
	
	include_once( 'page-builder/layout.php' );
	
	include_once( 'page-builder/filters.php' );
	
	// Load modules
	include_once( 'page-builder/modules/content-block.php' );
	
	include_once( 'page-builder/modules/grid.php' );
	
/****************************************
	Post Types
*****************************************/
	
	include_once( 'post-types/cpt-service.php' );
	
	include_once( 'post-types/cpt-location.php' );
	
	include_once( 'post-types/cpt-team.php' );
	
	include_once( 'post-types/cpt-video.php' );
	
	//include_once( 'post-types/cpt-before_after.php' );