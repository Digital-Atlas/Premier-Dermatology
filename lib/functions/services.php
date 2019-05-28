<?php

// Get Services by category

function get_services_list( $term_id, $seo = null ) {
	
	if (isset($seo) && $seo === true ) {
		$seo_suffix = 'Treatment Clinic';
	} else {
		$seo_suffix = '';
	}

	// arguments, adjust as needed
	$args = array(
		'post_type'      => 'service',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'		 => 'title',
		'order'			 => 'ASC',
 		'tax_query' => array(                 
 			  array(
				'taxonomy' => 'service_cat',              
				'field' => 'id',                 
				'terms' => array( $term_id ),  
 			  )
			)
		);
	
	
	$list = '';

	// Use $loop, a custom variable we made up, so it doesn't overwrite anything
	$loop = new WP_Query( $args );

	// have_posts() is a wrapper function for $wp_query->have_posts(). Since we
	// don't want to use $wp_query, use our custom variable instead.
	if ( $loop->have_posts() ) : 
 		while ( $loop->have_posts() ) : $loop->the_post(); 

			$list .= sprintf( '<li><a href="%s">%s %s</a></li>', get_permalink(), get_the_title(), $seo_suffix );

		endwhile;
	else: 
		return false;
 	endif;

	// We only need to reset the $post variable. If we overwrote $wp_query,
	// we'd need to use wp_reset_query() which does both.
	wp_reset_postdata();
	
	return sprintf( '<ul class="menu">%s</ul>', $list );
	
}


function get_terms_by_tax( $args = array() ) {

	
	$orderby      = 'name'; 
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';

	$defaults = array(
	  'echo'		 => FALSE,
	  'hide_empty'   => FALSE, 
	  'taxonomy'     => $tax,
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title
	);
	
	$args = wp_parse_args( $args, $defaults );
		
	$terms = get_terms( $args );
	
	/*
	term_id
	name
	description
	*/
	
	return $terms;
	
}