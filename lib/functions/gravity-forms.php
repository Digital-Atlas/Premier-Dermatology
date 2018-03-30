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

    $query_string = sprintf('?%s&%s&%s',$full_name, $email, $phone);

    $confirmation_url = get_page_link('1789') . $query_string;
    $confirmation = array( 'redirect' => $confirmation_url );

    return $confirmation;
};

