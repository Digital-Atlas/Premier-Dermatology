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

    $confirmation_url = get_page_link('1789') . $query_string;
    $confirmation = array( 'redirect' => $confirmation_url );

    return $confirmation;
};

