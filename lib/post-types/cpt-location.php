<?php
 
/**
 * Create new CPT - Location
 */
class CPT_Location extends CPT_Core {

    /**
     * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
     */
    public function __construct() {

        $this->post_type = 'location';
		
		// Register this cpt
        // First parameter should be an array with Singular, Plural, and Registered name
        parent::__construct(
        
        	array(
				__( 'Location', '_s' ), // Singular
				__( 'Locations', '_s' ), // Plural
				$this->post_type // Registered name/slug
			),
			array( 
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'query_var'          => true,
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'show_ui' 			 => true,
				'show_in_menu' 		 => true,
				'show_in_nav_menus'  => false,
				'exclude_from_search' => true,
                                'rewrite' => array('slug'=> 'location' ),
                                'supports' => array( 'title', 'thumbnail', 'page-attributes', 'revisions' ),
				 )

        );
		
     }
 
}

new CPT_Location();
