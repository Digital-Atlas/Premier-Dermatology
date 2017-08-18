<?php

function _s_location_office_hours() {
		
	global $post;
	
	if( empty( $post->office_hours ) ) {
		return false;
	}
	
	
	$day_names = array( 1 => 'mon', 2 => 'tue', 3 => 'wed', 4 => 'thu', 5 => 'fri', 6 => 'sat', 7 => 'sun' );
	
	$out = '';
	
	$days = parse_office_hours( $post->office_hours );
			
	foreach ( $days as $day => $hours ) {
		
		if( is_array( $hours ) && count( $hours ) == 2 ) {
			
			$day_name = 
			$out .= sprintf( '<li><strong>%s</strong> %sam - %spm</li>', ucwords( $day_names[$day] ), $hours[0], $hours[1] );	
		}
		else {
			$out .= sprintf( '<li><strong>%s</strong> %s</li>', ucwords( $day_names[$day] ), 'Closed' );
		}
		
	}
	
	if( empty( $out ) ) {
		return false;		
	}
			
	return sprintf( '<div class="location-office-hours"><ul class="hours">%s</ul></div>', $out );
		
}
	
	
function parse_office_hours( $hours ) {
	// ex. 1|8:30|4:30;2|8:30|4:30;3|8:30|4:30;4|8:30|4:30;5|8:30|4:00;6|;7|
	// 1|8:30|4:30
	$days = explode( ';', $hours );	
	
	$ret = array();
	
	foreach( $days as $day ) {
		
		$fields = explode( '|', $day );
		
		if( count( $fields ) < 3 ) {
			break;
		}
		
		list( $day_of_week, $open, $close ) = $fields;
		
		if( !empty( $day_of_week ) && !empty( $open ) && !empty( $close ) ) {
			$ret[$day_of_week] = array( $open, $close );
		}
 		
	}
	
	fix_empty_office_hour_days( $ret );
	
	// sort the days
	ksort( $ret );
	
	return $ret;
	
}

// fix empty days - set to closed
function fix_empty_office_hour_days(&$array) {
    foreach( range(1,7) as $num ) {
        if( !isset( $array[$num] ) ) {
            $array[$num] = 'Closed';
        }
    }
}