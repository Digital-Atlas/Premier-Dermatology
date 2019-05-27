<?php


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

    $reputation_widget_ratings = sprintf('https://widgets.reputation.com/widgets/5b439cc5ff3b47757c7097ef/run?tk=b07514e91ca&filterName=__primary_location__&filterValues=%s', $locations);

        //return $reputation_widget_ratings;

    $output = _get_data($reputation_widget_ratings);

    if (isset($error_msg)) {
        return '<div class="error">No reviews available.</div>';
    } else {
        return $output; 
    }

}

function _reputation_widget() {

    $url = get_field('reputation_location_id');
    
    return _get_data($url);
}


add_shortcode('reputation_widget', '_reputation_widget');

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


// Schema Shortcodes for Elementor

add_shortcode( 'schema-crest-hill', '_schema_crest_hill' );
add_shortcode( 'schema-naperville', '_schema_naperville' );


function _schema_crest_hill() {

$schema = <<<SCHEMA
<script type="application/ld+json">
			{
			"@context": "http://schema.org",
			"@type": ["MedicalClinic", "MedicalOrganization"],
			"name": "Forefront Dermatology ",
			"description": "Forefront Dermatology clinic in Crest Hill, IL offering treatment options in Medical Dermatology, Cosmetic Dermatology, Skin Cancer Surgery, Mohs Surgery.",
			"logo": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"image": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"photo": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"url": "https://pdskin.com/location/crest-hill/",
			"telephone": "(815) 701-9209",
			"faxNumber": "",
			"founder": {
			"@type": "Person",
			"name": "Dr. Matthew Kelleher",
			"jobTitle": ["Board-Certified Dermatologist" ]
			},
			"foundingDate": "2001",
			"foundingLocation": {
			"@type": "Place",
			"address": {
				"addressLocality": "Crest Hill"
			}
			},
			"areaServed": "Crest Hill",
			"location": {
			"@type": "Place",
			"address": {
			"@type": "PostalAddress",
			"addressCountry": "USA",
			"addressLocality": "Crest Hill",
			"addressRegion": "Illinois",
			"postalCode": "60403",
			"streetAddress": "2051 Plainfield Road"
			}
			},
			"geo": "41.559345, -88.133326",
			"hasMap": "https://maps.google.com/maps?saddr=&amp;daddr=Forefront Dermatology+2051+Plainfield+Road+Crest+Hill+Illinois+60403",
			"memberOf": [{
			"@type": "MedicalOrganization",
			"name": "Premier Dermatology"
			}]
			}
			</script>
SCHEMA;

return $schema;
}

function _schema_naperville() {

$schema = <<<SCHEMA
<script type="application/ld+json">
			{
			"@context": "http://schema.org",
			"@type": ["MedicalClinic", "MedicalOrganization"],
			"name": "Forefront Dermatology ",
			"description": "Forefront Dermatology clinic in Crest Hill, IL offering treatment options in Medical Dermatology, Cosmetic Dermatology, Skin Cancer Surgery, Mohs Surgery.",
			"logo": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"image": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"photo": "https://pdskin.com/wp-content/themes/pdskin/assets/images/logo.png",
			"url": "https://pdskin.com/location/naperville/",
			"telephone": "(630) 357-7536",
			"faxNumber": "(630) 904-0413",
			"founder": {
			"@type": "Person",
			"name": "Dr. Matthew Kelleher",
			"jobTitle": ["Board-Certified Dermatologist" ]
			},
			"foundingDate": "2001",
			"foundingLocation": {
			"@type": "Place",
			"address": {
				"addressLocality": "Crest Hill"
			}
			},
			"areaServed": "Naperville",
			"location": {
			"@type": "Place",
			"address": {
			"@type": "PostalAddress",
			"addressCountry": "USA",
			"addressLocality": "Naperville",
			"addressRegion": "Illinois",
			"postalCode": "60563",
			"streetAddress": "1520 Bond Street"
			}
			},
			"geo": "41.795606, -88.201274",
			"hasMap": "https://maps.google.com/maps?saddr=&amp;daddr=Forefront Dermatology+1520+Bond+Street+Naperville+Illinois+60563",
			"memberOf": [{
			"@type": "MedicalOrganization",
			"name": "Premier Dermatology"
			}]
			}
			</script>
SCHEMA;

return $schema;
}
