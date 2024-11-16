<?php

$booking_data1 = get_post_meta(get_the_ID());

if(!empty($booking_data1['shb_booking_data'][0])) {
	
	if(!empty($booking_data1['shb_additionalfee'][0])) {
		$existing_additionalfee = json_decode( $booking_data1['shb_additionalfee'][0], true);
	} else {
		$existing_additionalfee = array();
	}

	$existing_booking = json_decode( $booking_data1['shb_booking_data'][0], true);
	$room_total = count($existing_booking);
	$shb_get_available_additionalfee_ids = shb_get_available_additionalfee_ids($existing_booking);

	echo '<div class="shb-select-tab-wrapper">';
	
		echo '<label for="shb-additionalfee-accommodation">' . __('Accommodation','sohohotel_booking') . '</label>';
		echo '<select class="shb-select-tab" name="shb_additionalfee_accommodation">';
		
			foreach($existing_booking as $room_num => $booking_data) {
			
				if($booking_data1['shb_additionalfee_accommodation'][0] == 'shb-accommodation-' . $room_num . '-' . $booking_data['room_id']) {
					echo '<option value="shb-accommodation-' . $room_num . '-' . $booking_data['room_id'] . '" selected>' . __('Room','sohohotel_booking') .' ' . $room_num . ' ' . __('of','sohohotel_booking') . ' ' . $room_total . ' ' . get_the_title($booking_data['room_id']) . '</option>';
				} else {
					echo '<option value="shb-accommodation-' . $room_num . '-' . $booking_data['room_id'] . '">' . __('Room','sohohotel_booking') .' ' . $room_num . ' ' . __('of','sohohotel_booking') . ' ' . $room_total . ' ' . get_the_title($booking_data['room_id']) . '</option>';
				}
	
			}
		
		echo '</select>';
	
		foreach($existing_booking as $room_num => $booking_data) {

			echo '<div class="shb-accommodation-' . $room_num . '-' . $booking_data['room_id'] . ' shb-select-tab-section">';
		
				echo '<div class="shb-additionalfee-wrapper">';
		
					foreach($shb_get_available_additionalfee_ids[$room_num] as $additionalfee_id) {
					
						$additionalfee_data = get_post_meta($additionalfee_id);
					
						if($additionalfee_data['shb_optional'][0] == 'yes') {
						
							echo '<div class="shb-additionalfee-item">';
		
								echo '<h4>' . get_the_title($additionalfee_id) . '</h4>';
							
								$column_count = 0;
							
								if($additionalfee_data['shb_qty_select'][0] == 'yes') {
									$column_count++;
								}
							
								if($additionalfee_data['shb_select_date'][0] == 'yes') {
									$column_count++;
								}
							
								if($additionalfee_data['shb_select_time'][0] == 'yes') {
									$column_count++;
								}
								
								if(!empty($additionalfee_data['shb_custom_text_input_name'][0])) {
									$column_count++;
								}
								
								if( (!empty($additionalfee_data['shb_custom_select_name'][0])) && (!empty($additionalfee_data['shb_custom_select_options'][0])) ) {
									$column_count++;
								}
							
								if($column_count == 3) {
									$column_class = 'shb-one-third';
								} elseif($column_count == 2) {
									$column_class = 'shb-one-half';
								} else {
									$column_class = 'shb-full-width';
								}
								
								if($column_count > 0) {
								
									echo '<div class="shb-clearfix">';
							
									if($additionalfee_data['shb_qty_select'][0] == 'yes') {
									
										echo '<div class="' . $column_class . '">';
									
											echo '<label>' . $additionalfee_data['shb_qty_name'][0] . '</label>';
											echo '<select name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][qty]">';
								
												foreach (range($additionalfee_data['shb_qty_min'][0], $additionalfee_data['shb_qty_max'][0]) as $r) {
												
													if($existing_additionalfee[$room_num][$additionalfee_id]['qty'] == $r) {
														echo '<option value="' . $r . '" selected>' . $r . '</option>';
													} else {
														echo '<option value="' . $r . '">' . $r . '</option>';
													}
												
												}
							
												echo '</select>';
									
										echo '</div>';
							
									}
							
									if($additionalfee_data['shb_select_date'][0] == 'yes') {
									
										echo '<div class="' . $column_class . '">';
											echo '<label>' . __('Date','sohohotel_booking') . '</label>';
										
											if(!empty($existing_additionalfee[$room_num][$additionalfee_id]['date'])) {
												echo '<input type="text" class="shb-single-date" name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][date]" value="' . $existing_additionalfee[$room_num][$additionalfee_id]['date'] . '" />';
												echo '<input type="hidden" class="shb-single-date-alt" name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][date_alt]" value="' . $existing_additionalfee[$room_num][$additionalfee_id]['date_alt'] . '" />';
											} else {
												echo '<input type="text" class="shb-single-date" name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][date]" />';
												echo '<input type="hidden" class="shb-single-date-alt" name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][date_alt]" />';
											}
										
										
										echo '</div>';
									
									}
							
									if($additionalfee_data['shb_select_time'][0] == 'yes') {
									
										echo '<div class="' . $column_class . '">';
											echo '<label>' . __('Time','sohohotel_booking') . '</label>';
										
											echo '<div class="shb-clearfix">';
											
												echo '<div class="shb-one-half">';
												
													echo '<select name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][time-hour]">';
													
														foreach (range(0,23) as $r) {
															
															if($existing_additionalfee[$room_num][$additionalfee_id]['time-hour'] == $r) {
																echo '<option value="' . sprintf("%02d", $r) . '" selected>' . sprintf("%02d", $r) . '</option>';
															} else {
																echo '<option value="' . sprintf("%02d", $r) . '">' . sprintf("%02d", $r) . '</option>';
															}
															
														}
													
													echo '<select>';
												
												echo '</div>';
											
												echo '<div class="shb-one-half">';
												
													echo '<select name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][time-min]">';
													
													foreach (range(0,59) as $r) {
														
														if($existing_additionalfee[$room_num][$additionalfee_id]['time-min'] == $r) {
															echo '<option value="' . sprintf("%02d", $r) . '" selected>' . sprintf("%02d", $r) . '</option>';
														} else {
															echo '<option value="' . sprintf("%02d", $r) . '">' . sprintf("%02d", $r) . '</option>';
														}
														
													}
													
													echo '<select>';
												
												echo '</div>';
											
											echo '</div>';
										
										echo '</div>';
							
									}
									
									if(!empty($additionalfee_data['shb_custom_text_input_name'][0])) {
									
										echo '<div class="' . $column_class . '">';
											echo '<label>' . $additionalfee_data['shb_custom_text_input_name'][0] . '</label>';
									
											if(!empty($existing_additionalfee[$room_num][$additionalfee_id]['custom_input'])) {
											
											
											
												echo '<textarea name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][custom_input]">' . $existing_additionalfee[$room_num][$additionalfee_id]['custom_input'] . '</textarea>';
											
											
											} else {
											
												echo '<textarea name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][custom_input]"></textarea>';
											
											}
									
									
										echo '</div>';
								
									}
								
									if( (!empty($additionalfee_data['shb_custom_select_name'][0])) && (!empty($additionalfee_data['shb_custom_select_options'][0])) ) {
								
										$custom_select_options = get_post_meta($additionalfee_id,'shb_custom_select_options',TRUE);
										$custom_select_options_exp = explode('|',$custom_select_options);
									
										$i = 0;
										foreach($custom_select_options_exp as $key => $val) {
											$i++;
											$custom_select_options_arr[$i] = $val;
										}
								
										echo '<div class="' . $column_class . '">';
								
											echo '<label>' . $additionalfee_data['shb_custom_select_name'][0] . '</label>';
											echo '<select name="shb_additionalfee[' . $room_num . '][' . $additionalfee_id . '][custom_select]">';
							
												foreach($custom_select_options_arr as $key => $val) {
											
													if($existing_additionalfee[$room_num][$additionalfee_id]['custom_select'] == $key) {
														echo '<option value="' . $key . '" selected>' . $val . '</option>';
													} else {
														echo '<option value="' . $key . '">' . $val . '</option>';
													}
											
												}
						
												echo '</select>';
								
										echo '</div>';
						
									}
									
									echo '</div>';
								
								}
								
								echo '<div class="shb-additionalfee-select-button shb-clearfix">';
							
									echo '<input name="save" type="submit" class="button button-primary button-large shb-additionalfee-select" id="publish" data-additionalfee="' . $additionalfee_id .'" data-accommodation="' . $room_num .'" value="' . __('Select','sohohotel_booking') . '" />';
									echo '<span class="shb-additionalfee-price">' . shb_get_price($additionalfee_data['shb_price'][0]) . ' <span>/ ' . $additionalfee_data['shb_price_name'][0] . '</span></span>';
								
								echo '</div>';
	
							echo '</div>';
						
						}
					
					}
		
				echo '</div>';
		
			echo '</div>';

		}
	
	echo '</div>';
	
} else {
	
	echo '<p>' . __('Enter your booking dates and guest quantities above, click "Check Availability", select your accommodation, and then you can select additional fees','sohohotel_booking') . '</p>';
	
}