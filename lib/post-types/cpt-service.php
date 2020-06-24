<?php
 
/**
 * Create new CPT - Service
 */
class CPT_Service extends CPT_Core {

    /**
     * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
     */
    public function __construct() {

        $this->post_type = 'service';
		
		// Register this cpt
        // First parameter should be an array with Singular, Plural, and Registered name
        parent::__construct(
        
        	array(
				__( 'Service', '_s' ), // Singular
				__( 'Services', '_s' ), // Plural
				$this->post_type // Registered name/slug
			),
			array( 
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'query_var'          => true,
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => true,
				'show_ui' 			 => true,
				'show_in_menu' 		 => true,
				'show_in_nav_menus'  => false,
				'exclude_from_search' => false,
				'rewrite' => array('slug'=> 'services', 'with_front' => false ), 
				'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
				 )

        );
		
     }
 
}

new CPT_Service();


$service_categories = array(
    __( 'Service Category', '_s' ), // Singular
    __( 'Service Categories', '_s' ), // Plural
    'service_cat' // Registered name
);

register_via_taxonomy_core( $service_categories, 
	array(
		'public' => false,
        'rewrite' => array('slug'=> 'services' ), 
	), 
	array( 'service' ) 
);
