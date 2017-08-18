<?php
 
/**
 * Create new CPT - Video
 */
class CPT_BA extends CPT_Core {

    /**
     * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
     */
    public function __construct() {

        $this->post_type = 'before_after_images';
		
		// Register this cpt
        // First parameter should be an array with Singular, Plural, and Registered name
        parent::__construct(
        
        	array(
				__( 'Before After Image', '_s' ), // Singular
				__( 'Before After Images', '_s' ), // Plural
				$this->post_type // Registered name/slug
			),
			array( 
				'public'             => false,
				'publicly_queryable' => false,
				'show_ui'            => true,
				'query_var'          => true,
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => false,
				'show_ui' 			 => true,
				'show_in_menu' 		 => true,
				'show_in_nav_menus'  => false,
				'exclude_from_search' => false,
				'rewrite' => false, 
				'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
				 )

        );
		
     }
 
}

new CPT_BA();