<?php

// hide labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// Redirect location Book Appointment confirmation to an embedded static page, so that a YoTrack event can fire post-submission
add_filter("gform_confirmation_1", "book_appointment_track_data", 3, 4 );

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
add_action( 'gform_after_submission_1', 'tgm_io_remove_form_entry' ); // Delete request appt


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

