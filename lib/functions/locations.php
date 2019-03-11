<?php

add_shortcode( 'reputation_location_ratings', 'reputation_widget_ratings_locations' );

/**
 * LOCATINS: Returns cURL Reputation Widget API for single or multiple locations, param values come from Reputation.com directory listing view Reference Link for more information.
 * Reference: https://forefront.backlog.com/view/FF1-189
 * @param $locations generated from function: _reputation_locations_pids ($post_id, $pids = null )
 * @return HTML
 */
function _get_data($url)
{
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');


    $data = curl_exec($ch);

  // Error Handling
  if (curl_error($ch)) {
    $error_msg = curl_error($ch);
   }
  curl_close($ch);

  return $data;
}

function reputation_widget_ratings_locations ( $locations = null) {

    $locations = get_field('reputation_location_id');

    $reputation_widget_ratings = sprintf('https://widgets.reputation.com/widgets/5b439cc5ff3b47757c7097ef/run?tk=%s&filterName=__primary_location__&filterValues=%s', REPUTATION_KEY, $locations);

        //return $reputation_widget_ratings;

    $output = _get_data($reputation_widget_ratings);

    if (isset($error_msg)) {
        return '<div class="error">No reviews available.</div>';
    } else {
        return $output; 
    }

}

add_shortcode( 'location_hours', '_s_location_office_hours' );

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
                            $out .= sprintf( '<li><strong>%s</strong> %s - %s</li>', ucwords( $day_names[$day] ), $hours[0], $hours[1] );

                            //var_dump(echo date("H:i", strtotime($hours[0] . ':' . $hours[1]));        
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
