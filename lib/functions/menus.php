<?php


/**
 * Descriptions on Home featured menu
 * @param string $item_output, HTML outputp for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function kr_home_menu_desc( $item_output, $item, $depth, $args ) {
	
	if( 'home-featured' == $args->theme_location && ! $depth && $item->description )
		$item_output = str_replace( '</a>', '<span class="description">' . $item->description . '</span></a>', $item_output );
		
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'kr_home_menu_desc', 10, 4 );



function set_current_menu_class($classes) {
	global $post;
	
	/*
	if( _s_is_page_template_name( 'find-an-agent' ) || is_post_type_archive( 'agent' ) || is_singular( 'agent' ) ) {
		
		$classes = array_filter($classes, "remove_parent_classes");
		
		if ( in_array('menu-item-206', $classes ) )
			$classes[] = 'current-menu-item';
	}
	*/
			
	return $classes;
}

add_filter('nav_menu_css_class', 'set_current_menu_class',1,2); 




// check for current page classes, return false if they exist.
function remove_parent_classes($class){
  return in_array( $class, array( 'current_page_item', 'current_page_parent', 'current_page_ancestor', 'current-menu-item' ) )  ? FALSE : TRUE;
}



function _s_is_page_template_name( $template_name ) {
	
	if( is_page() ) {
		$template_found = str_replace( '.php', '', basename( get_page_template_slug( get_queried_object_id() ) ) );
		return $template_name === $template_found ? true : false;
	}
	
}
