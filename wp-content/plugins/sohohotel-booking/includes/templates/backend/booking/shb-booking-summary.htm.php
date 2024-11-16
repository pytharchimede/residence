<?php

$booking_data = get_post_meta(get_the_ID());

shb_select_additionalfee_admin($booking_data);
shb_delete_additionalfee_admin($booking_data);
shb_select_accommodation_admin($booking_data);
shb_delete_accommodation_admin($booking_data);

$booking_data = get_post_meta(get_the_ID());

if(!empty($booking_data['shb_booking_data'][0])) {
	echo "<input type='hidden' name='shb_booking_data' value='" . $booking_data['shb_booking_data'][0] . "' />";
	echo "<input type='hidden' name='shb_checkin_sort' value='" . $booking_data['shb_checkin_sort'][0] . "' />";
	echo "<input type='hidden' name='shb_checkout_sort' value='" . $booking_data['shb_checkout_sort'][0] . "' />";
}

$shb_get_booking_summary = shb_get_booking_summary($booking_data);

if(!empty($shb_get_booking_summary['items'])) {
	
	echo '<div class="shb-booking-summary-wrapper">';

	foreach($shb_get_booking_summary['items'] as $room_num => $room_data) {
	
		echo '<div class="shb-booking-summary-item">';
		
			echo '<h4>Room ' . $room_num . ' ' . __('of','sohohotel_booking') . ' ' . $shb_get_booking_summary['total_items'] . '</h4>';
			echo '<ul>';
				echo '<li><strong>' . __('Room','sohohotel_booking') . ':</strong> ' . $room_data['room_title'] . '</li>';
				echo '<li><strong>' . __('Rate','sohohotel_booking') . ':</strong> ' . $room_data['rate_title'] . ', <a href="#" class="shb-booking-summary-expand">' . shb_get_price($room_data['price']) . '</a>';
					echo '<ul class="shb-booking-summary-details">';
				
						foreach($room_data['pricebreakdown'] as $date => $date_price) {
							echo '<li>' . shb_get_date($date) . ': ' . shb_get_price($date_price) . '</li>';
						}
				
					echo '</ul>';
				echo '</li>';
				echo '<li><strong>' . __('Dates','sohohotel_booking') . ':</strong> ' . shb_get_date($room_data['checkin']) . ' - ' . shb_get_date($room_data['checkout']) . ' (' . $room_data['nights'] . ')</li>';
				echo '<li><strong>' . __('Guests','sohohotel_booking') . ':</strong> ' . $room_data['guests'] . '</li>';
				echo '<li><a href="' . $room_data['delete_url'] . '" class="shb-delete-item">' . __('Delete','sohohotel_booking') . '</a></li>';
			echo '</ul>';
		
			if(!empty($room_data['additionalfee'])) {
			
				foreach($room_data['additionalfee'] as $additionalfee_key => $additionalfee_val) {
				
					echo '<ul class="shb-additionalfee-list-item">';
				
						echo '<li><strong>' . __('Additional Fee','sohohotel_booking') . ': </strong>' . $additionalfee_val['title'] . '</li>';
						echo '<li><strong>' . __('Price','sohohotel_booking') . ': </strong>' . shb_get_price($additionalfee_val['price']) . '</li>';
					
						if(!empty($additionalfee_val['qty'])) {
							echo '<li><strong>' . __('Quantity','sohohotel_booking') . ': </strong>' . $additionalfee_val['qty'] . '</li>';
						}
					
						if(!empty($additionalfee_val['date'])) {
							echo '<li><strong>' . __('Date','sohohotel_booking') . ': </strong>' . $additionalfee_val['date'] . '</li>';
						}
					
						if(!empty($additionalfee_val['time'])) {
							echo '<li><strong>' . __('Time','sohohotel_booking') . ': </strong>' . $additionalfee_val['time'] . '</li>';
						}
						
						if(!empty($additionalfee_val['custom_input'])) {
							echo '<li><strong>' . get_post_meta($additionalfee_val['id'],'shb_custom_text_input_name',TRUE) . ': </strong>' . $additionalfee_val['custom_input'] . '</li>';
						}
						
						if(!empty($additionalfee_val['custom_select'])) {
							
							$custom_select_options = get_post_meta($additionalfee_val['id'],'shb_custom_select_options',TRUE);
							$custom_select_options_exp = explode('|',$custom_select_options);
							
							echo '<li><strong>' . get_post_meta($additionalfee_val['id'],'shb_custom_select_name',TRUE) . ': </strong>' . $additionalfee_val['custom_select'] . '</li>';
						}
						
						if(!empty($additionalfee_val['delete_url'])) {
							echo '<li><a href="' . $additionalfee_val['delete_url'] . '" class="shb-delete-item">' . __('Delete','sohohotel_booking') . '</a></li>';
						}
					
					echo '</ul>';
				
				}
			
			}
		
		echo '</div>';
	
	}
	
	if(!empty($shb_get_booking_summary['total_price'])) {
		$wc_order_amount = $shb_get_booking_summary['total_price'];
	} else {
		$wc_order_amount = 0;
	}
	
	echo '<div class="shb-booking-summary-item"><p><strong>' . __('Total','sohohotel_booking') . ': </strong>' . shb_get_price($wc_order_amount) . '</p></div>';

	echo '</div>';
	
} else {
	
	echo '<p>' . __('No accommodation selected.','sohohotel_booking') . '</p>';
	
}

?>