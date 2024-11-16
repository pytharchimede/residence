<?php

if(!empty(get_post_meta(get_the_ID(),'shb_send_email',TRUE))) {
	
	$email = get_post_meta(get_the_ID(),'shb_send_email',TRUE);
	
	// Switch to customer language if there is one set
	if(!empty($booking_data['shb_booking_language'][0])) { 
		$booking_language = $booking_data['shb_booking_language'][0];
		$previous_locale = get_locale();
		switch_to_locale($booking_language); 
	}
	
	if($email == 'booking_pending') {
		shb_send_booking_email(get_the_ID(),'booking_pending','guest');
	} elseif($email == 'booking_confirmed') {
		shb_send_booking_email(get_the_ID(),'booking_confirmed','guest');
	} elseif($email == 'booking_cancelled') {
		shb_send_booking_email(get_the_ID(),'booking_cancelled','guest');
	}
	
	// Switch back to default language
	if(!empty($booking_data['shb_booking_language'][0])) { 
		restore_previous_locale();
	}
	
	echo '<div class="shb-email-notification"><p>' . __('Email successfully sent','sohohotel_booking') . '</p></div>';
	
}

update_post_meta(get_the_ID(),'shb_send_email','');

?>

<div class="shb-clearfix">

	<select id="shb-send-email">
		<option value="booking_pending"><?php _e('Booking Pending','sohohotel_booking'); ?></option>
		<option value="booking_confirmed"><?php _e('Booking Confirmed','sohohotel_booking'); ?></option>
		<option value="booking_cancelled"><?php _e('Booking Cancelled','sohohotel_booking'); ?></option>
	</select>

	<input name="save" type="submit" class="button button-primary button-large shb-email-select" id="publish" value="<?php _e('Send','sohohotel_booking'); ?>" />

</div>