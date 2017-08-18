<?php

// Resources Helper Functions






// Get Insurance plan accounrdion content sections
function _get_plans_section( $row ) {
	
	$plans = $row['plans'];
	
	$column_count = $row['columns'] ? $row['columns'] : 3;
	
	$list_items = array();
	
	foreach( $plans as $plan ) {
		$list_items[] = _s_get_plan( $plan );
	}
	
	$columns =  array();
	$out = '';
	
	$columns = c2c_array_partition( $list_items, $column_count );
	
	if( 1 == count( $columns ) ) {
		$out = sprintf( '<div class="column row"><ul class="no-style">%s</ul></div>', $columns[0] );
	}
	else {
		foreach( $columns as $column ) {
			$out .= sprintf( '<div class="column"><ul class="no-style">%s</ul></div>', implode( '', $column ) );
		}
		
		$out = sprintf( '<div class="row small-up-1 large-up-%s">%s</div>', $column_count, $out );
	}
	
	return $out;
}

// Get individual plan, link it if needed, and add children as well
function _s_get_plan( $row ) {
		
	$plan_name = $row['plan_name'];
	$url = $row['url'];
	$list = $row['list'];
	
	$children = '';
		
	if( !empty( $plan_name ) ) {
		
		$anchor_open = '';
		$anchor_close = '';
		
		if( !empty( $url ) ) {
			$anchor_open = sprintf( '<a href="%s">', $url );
			$anchor_close = '</a>';
		}
		
		if( !empty( $list ) ) {
			$children = _plan_child_list( $list );
		}
		
		return sprintf( '<li>%s%s%s%s</li>', $anchor_open, $plan_name, $anchor_close, $children );
		
	}
		
	
}

// Get plan child list if required
function _plan_child_list( $field ) {
	 
	if( empty( $field ) ) {
		return false;
	}
	
	return sprintf( '<ul class="children">%s</ul>', _s_nl2li( $field ) );
}


// Process text area into list items
function _s_nl2li( $string ) {
	return '<li>' . implode( '</li><li>', explode( "\n", trim( $string ) ) ) . '</li>';
}