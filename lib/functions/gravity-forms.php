<?php

function forefrontderm_api_push( $entry, $form ) {
 


  // Exit if not correct form
  if ( $form['id'] != 4) return $form;


  if (rgar( $entry, '25' ) == 7) {
      $service_type == 'Cosmetic Dermatology';
    } else {
      $service_type == 'Medical Dermatology';
  }

if (is_singular('location')) { 
    $location_name = get_the_title();
}


    $endpoint_url = 'https://api.forefrontderm.com/api/appointment';
    
    $body = array(
        'entry_id' => rgar( $entry, 'id' ), 
        'date_created' => rgar( $entry, 'date_created' ), 
        'first_name' => sanitize_text_field(rgar( $entry, '21' )),
        'last_name' => sanitize_text_field(rgar( $entry, '22' )),
        'email' => sanitize_email(rgar( $entry, '5' )),
        'phone' => rgar( $entry, '23' ),
        'preferred_location' => rgar( $entry, '24' ),
        'service_type' => $service_type,
        'service_name' => rgar( $entry, '36' ),
        'location_name' => $location_name,
        'post_id' => get_the_ID(),
        'referer_url' =>  rgar( $entry, 'source_url' ),
        );

    $json_encode = json_encode($body);

    $payload = $json_encode;

    var_dump($payload);
     
    $options = [
      'body'        => $payload,
      'headers'     => [
          'Content-Type' => 'application/json',
      ],
      'timeout'     => 60,
      //'redirection' => 5,
      //'blocking'    => true,
      //'httpversion' => '1.0',
      'sslverify'   => true,
      //'data_format' => 'body',
     ];


    // POST JSON data to Remote API
    $response = wp_remote_post( $endpoint_url, $options );
    $response_code = wp_remote_retrieve_response_code($response);

    // Logging data vars
    $entry_id = $body['entry_id'];
    $date_created = $body['date_created'];
    $location_name = $body['location_name'];
    $referrer_url = $body['referer_url'];


    $retry = 1;
    $max_retries = 3;

    // Log successful responses or errors
    if ($response && $response_code == 201 ) {
      _log_appt_entry($date_created, $entry_id, $location_name, $referrer_url, 'entries');
   } elseif ( $response_code == 400) {
      _log_appt_entry($date_created, $entry_id, $location_name, $referrer_url, 'missing_fields');
      wp_mail( 'ldao@digital-atlas.com', 'Book Appointment Missing Fields Error', 'Book Appointment Missing Fields Occurred :' . $response_code ); 
   } else {

      // Retry two more times
      while ($retry <= $max_retries) {
          $response = wp_remote_post( $endpoint_url, $options );

          $retry++;
      }

      if ($retry == $max_retries) {
        _log_appt_entry($date_created, $entry_id, $location_name, $referrer_url, 'server_error');
        wp_mail( 'ldao@digital-atlas.com', 'Book Appointment API Service Error', 'Book Appointment API Service Error:' . $response_code );         
      }



   }

   // Return response code
    return $response_code;

}


function _log_appt_entry( $date_created, $entry_id, $location_name, $referrer_url, $type ) {                  
  
      $date = date("m-y");

      if ($type == 'entries') {
        $filename = sprintf('/logs/book-appt-201-%s.log', $date);
      } elseif ($type = 'missing_fields') {
        $filename = '/logs/book-appt-400.log';
      } elseif ($type = 'server_errors') {
        $filename = '/logs/book-appt-404_503.log';
      }

      if (!isset($location_name)) {
        $location_name = NULL;
      }

      $data = sprintf("%s,%s,'%s',%s",$date_created, $entry_id, $location_name, $referrer_url );


      $file=fopen( HOME_PATH . $filename,'a');
      fwrite($file, $data . PHP_EOL);
      fclose($file);  
}



/**
 * Route service lead form fills based on taxonomy term ID
 * @param 
 * @return
 */

add_filter( 'gform_field_value_service_type', 'gf_service_type', 10, 3 );

function gf_service_type( $value ) {
    //Populate Book Appointment Hidden Field 'group_type' with custom taxonomy ID
    $term_list = wp_get_post_terms(get_the_ID(),'service_cat', array("fields" => "ids"));
    
    // 28 medical
    // 29 cosmetic

    return $term_list[0];
}

/**
 * Pass in service object ID
 * @param 
 * @return
 */

add_filter( 'gform_field_value_service_id', 'gf_service_id', 10, 3 );

function gf_service_id( $value ) {

  return get_the_ID();

}

// Services lead forms

add_filter( 'gform_confirmation_3', 'services_custom_confirmation', 10, 4 );
function services_custom_confirmation( $confirmation, $form, $lead, $ajax ) {

    $response_code = forefrontderm_api_push($lead, $form);

    if ($response_code == 201) {

    // Get form object
    $lead = $_POST;

    // Grab service post ID
    $service_id = $lead['input_34'];


    $term_list = wp_get_post_terms(get_the_ID(),'service_cat', array("fields" => "ids"));

    // 28 medical
    // 29 cosmetic

    // Return parent term
    if ( $term_list[0] == 7 ) {
      $url = "book-appointment-medical-service-completed";
    } elseif ( $term_list[0] == 8 ) {
       $url = "book-appointment-cosmetic-service-completed";
    } elseif ( $term_list[0] == 9 ) {
        $url = "book-appointment-spa-service-completed";
    } else {
        $url = "book-appointment-medical-service-completed";
    }


    // Define routing URL on location service form fills

    $service_name = sprintf('service_name=%s', sanitize_title($lead['input_33']));

    $query_string = sprintf('?%s',$service_name);

    $confirmation_url = trailingslashit(site_url()) . $url . $query_string;

    $confirmation = array( 'redirect' => $confirmation_url );

    }

    return $confirmation;
}


// hide labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// Redirect location Book Appointment confirmation to an embedded static page, so that a YoTrack event can fire post-submission
//add_filter("gform_confirmation_1", "book_appointment_track_data", 3, 4 );

function book_appointment_track_data($confirmation, $form, $lead, $ajax) {

    $lead = $_POST;

    $full_name = sanitize_text_field($lead['input_21'] . ' ' . $lead['input_22']);
    $email = sanitize_email($lead['input_5']);
    $phone = $lead['input_23'];
    $address = $lead['input_25'];
    $address2 = $lead['input_26'];
    $city = $lead['input_32'];
    $state = $lead['input_30'];
    $zip = $lead['input_27'];
    $patient_type = $lead['input_35'];
    $insurance_plan = $lead['input_37'];
    $hmo = 'HMO ?:' . $lead['input_35'];
    $preferred_time = $lead['input_19'];

    $query_string = sprintf('?%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s',
    	$full_name, $email, $phone, $address, $address2, $city, $state, $zip, $patient_type, $insurance_plan, $hmo, $preferred_time );

    $confirmation_url = get_page_link('4660') . $query_string;
    $confirmation = array( 'redirect' => $confirmation_url );

    return $confirmation;
};

// Delete entries for ID gform_after_submission_x
// Do not save payment entries
//add_action( 'gform_after_submission_1', 'tgm_io_remove_form_entry' ); // Delete request appt


/**
 * Prevents Gravity Form entries from being stored in the database
 * for a specific form. In this case, the form ID is 5. Change 5 in
 * the hook to target your specific form ID.
 * 
 * @global object $wpdb The WP database object.
 * @param array $entry  Array of entry data.
 */
function tgm_io_remove_form_entry( $entry ) {
    
    global $wpdb;

    // Prepare variables.
    $lead_id                = $entry['id'];
    $lead_table             = RGFormsModel::get_lead_table_name();
    $lead_notes_table       = RGFormsModel::get_lead_notes_table_name();
    $lead_detail_table      = RGFormsModel::get_lead_details_table_name();
    $lead_detail_long_table = RGFormsModel::get_lead_details_long_table_name();

    // Delete from lead detail long.
    $sql = $wpdb->prepare( "DELETE FROM $lead_detail_long_table WHERE lead_detail_id IN(SELECT id FROM $lead_detail_table WHERE lead_id = %d)", $lead_id );
    $wpdb->query( $sql );

    // Delete from lead details.
    $sql = $wpdb->prepare( "DELETE FROM $lead_detail_table WHERE lead_id = %d", $lead_id );
    $wpdb->query( $sql );

    // Delete from lead notes.
    $sql = $wpdb->prepare( "DELETE FROM $lead_notes_table WHERE lead_id = %d", $lead_id );
    $wpdb->query( $sql );

    // Delete from lead.
    $sql = $wpdb->prepare( "DELETE FROM $lead_table WHERE id = %d", $lead_id );
    $wpdb->query( $sql );
    
    // Finally, ensure everything is deleted (like stuff from Addons).
    GFAPI::delete_entry( $lead_id );

}

