<?php

$booking_data = get_post_meta(get_the_ID());
$guestclass_ids = shb_get_all_ids('shb_guestclass');

if(!empty($guestclass_ids)) {

	if(!empty($booking_data['shb_checkin'][0])) { 
		$checkin_val = $booking_data['shb_checkin'][0];
		$checkin_alt_val = $booking_data['shb_checkin_alt'][0];
	} else {
		$checkin_val = '';
		$checkin_alt_val = '';
	}

	if(!empty($booking_data['shb_checkout'][0])) { 
		$checkout_val = $booking_data['shb_checkout'][0];
		$checkout_alt_val = $booking_data['shb_checkout_alt'][0];
	} else {
		$checkout_val = '';
		$checkout_alt_val = '';
	}

	$guestclass_count = count($guestclass_ids);

	if ($guestclass_count % 3 == 0) {
		$guestclass_column = 'shb-one-third';
	} elseif($guestclass_count % 2 == 0) {
		$guestclass_column = 'shb-one-half';
	} else {
		$guestclass_column = 'shb-full-width';
	}

	echo '<div class="shb-field shb-clearfix">';
	
		echo '<div class="shb-one-half">';
			echo '<label for="shb_checkin">' . __('Check In','sohohotel_booking') . '</label>';
			echo '<input type="text" id="shb_checkin" class="shb-check-in shb-validation-required" name="shb_checkin" value="' . $checkin_val . '" readonly="readonly" />';
			echo '<input class="shb-check-in-alt" type="hidden" name="shb_checkin_alt" value="' . $checkin_alt_val . '">';
		echo '</div>';
	
		echo '<div class="shb-one-half">';
			echo '<label for="shb_checkout">' . __('Check Out','sohohotel_booking') . '</label>';
			echo '<input type="text" id="shb_checkout" class="shb-check-out shb-validation-required" name="shb_checkout" value="' . $checkout_val . '" readonly="readonly" />';
			echo '<input class="shb-check-out-alt" type="hidden" name="shb_checkout_alt" value="' . $checkout_alt_val . '">';
		echo '</div>';
	
	echo '</div>';

	echo '<div class="shb-field shb-clearfix">';
	
		foreach($guestclass_ids as $guestclass_id) {
		
			echo '<div class="' . $guestclass_column . '">';
				echo '<label for="shb_' . $guestclass_id . '_qty">' . get_the_title($guestclass_id) . '</label>';
				echo '<select id="shb_' . $guestclass_id . '_qty" name="shb_' . $guestclass_id . '_qty">';
			
					foreach (range(0, 500) as $r) {
					
						if($booking_data['shb_' . $guestclass_id . '_qty'][0] == $r) {
							echo '<option value="' . $r . '" selected>' . $r . '</option>';
						} else {
							echo '<option value="' . $r . '">' . $r . '</option>';
						}
					
					}
				
				echo '</select>';
			echo '</div>';
		
		}
	
	echo '</div>';

	echo '<input name="save" type="submit" class="button button-primary button-large" id="publish" value="' . __('Check Availability','sohohotel_booking') . '">';

} else {
	
	echo '<p>' . __('Go to "Hotel Booking > Guest Classes" and create at least one guest class.','sohohotel_booking') . '</p>';
	
}

if(!empty($booking_data['shb_checkin_alt'][0]) && !empty($booking_data['shb_checkout_alt'][0])) {
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$data['checkin'] = $booking_data['shb_checkin_alt'][0];
	$data['checkout'] = $booking_data['shb_checkout_alt'][0];
	foreach($guestclass_ids as $guestclass_id) {
		$data['guests'][$guestclass_id] = $booking_data['shb_' . $guestclass_id . '_qty'][0];
	}
	
	$shb_accommodation_booking_select = shb_accommodation_booking_select($data);
	
	echo '<div class="shb-accommodation-result-wrapper">';

	foreach($shb_accommodation_booking_select as $accommodation_id => $accommodation_data) {
	
		echo '<div class="shb-accommodation-result shb-accommodation-accommodation-' . $accommodation_data['bookable'] . '">';
		
			if(!empty($accommodation_data['conditions'])) {
			
				echo '<div class="shb-booking-condition-wrapper">';
					echo '<h4><i class="fas fa-exclamation-triangle"></i> ' . get_the_title($accommodation_id) . ' ' . __('Conditions','sohohotel_booking') . '</h4>';
					echo '<ul>';
					
					foreach($accommodation_data['conditions'] as $condition) {
						echo '<li>' . $condition . '</li>';
					}
					
					echo '</ul>';
				echo '</div>';
			
			}
		
			echo '<h4 class="shb-accommodation-title"> ' . get_the_title($accommodation_id) . ' (' . $accommodation_data['quantity_available'] . ' ' . __('Available','sohohotel_booking') . ')</h4>';
		
			if(!empty($accommodation_data['rates'])) {
				
				echo '<div class="shb-accommodation-rate-wrapper">';

					foreach($accommodation_data['rates'] as $rate_id => $rate_data) {
			
						echo '<div class="shb-accommodation-rate-title-wrapper shb-accommodation-rate-' . $rate_data['bookable'] . ' shb-clearfix">';
					
							if(!empty($rate_data['conditions'])) {
					
								echo '<div class="shb-booking-condition-wrapper">';
									echo '<h4><i class="fas fa-exclamation-triangle"></i> ' . get_the_title($rate_id) . ' ' . __('Conditions','sohohotel_booking') . '</h4>';
									echo '<ul>';
					
										foreach($rate_data['conditions'] as $condition) {
											echo '<li>' . $condition . '</li>';
										}
					
									echo '</ul>';
								echo '</div>';
					
							}
					
							echo '<p>' . get_the_title($rate_id) . ' ' . shb_get_price($rate_data['price']) . '</p>';
					
							if($rate_data['bookable'] == 'available') {
								echo '<input name="save" type="submit" class="button button-primary button-large shb-accommodation-select" id="publish" data-accommodation="' . $accommodation_id .'" data-rate="' . $rate_id .'" value="' . __('Select','sohohotel_booking') . '" />';
							} else {
								echo '<span class="shb-select-accommodation-button button button-primary button-large">' . __('Select','sohohotel_booking') . '</span>';
							}
					
						echo '</div>';
			
					}
			
				echo '</div>';	
				
			} else {
				
				echo '<p>' . __('No rates available','sohohotel_booking') . '</p>';
				
			}
			
		echo '</div>';
	
	}

	echo '</div>';
	
} ?>