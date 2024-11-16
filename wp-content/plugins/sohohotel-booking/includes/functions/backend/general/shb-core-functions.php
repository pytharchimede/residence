<?php



/* ----------------------------------------------------------------------------

   Get all IDs for a specific post type

---------------------------------------------------------------------------- */
function shb_get_all_ids($post_type) {
	
	$ids = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => $post_type,
		'orderby' => 'date',
		'order' => 'ASC'
	));
	
	return $ids;
	
}



/* ----------------------------------------------------------------------------

   Set currency session

---------------------------------------------------------------------------- */
function shb_set_currency() {
	
	if(!empty($_GET['shb-currency'])) {
		
		if($_GET['shb-currency'] == '1') {
			$_SESSION['shb_currency'] = 1;
		}
		
		if($_GET['shb-currency'] == '2') {
			$_SESSION['shb_currency'] = 2;
		}
		
		if($_GET['shb-currency'] == '3') {
			$_SESSION['shb_currency'] = 3;
		}
		
	}
	
}



/* ----------------------------------------------------------------------------

   Set currency select

---------------------------------------------------------------------------- */
function shb_currency_select($class) {
	
	shb_set_currency();
	
	$o = '';
	
	if(!empty($_SESSION['shb_currency'])) {
		
		if($_SESSION['shb_currency'] == '1') {
			$currency = 1;
		}
		
		if($_SESSION['shb_currency'] == '2') {
			$currency = 2;
		}
		
		if($_SESSION['shb_currency'] == '3') {
			$currency = 3;
		}
		
	} else {
		
		$currency = 1;
		
	}
	
	$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$current_url = str_replace('?shb-currency=' . $currency, '', $current_url);
	$current_url = str_replace('&shb-currency=' . $currency, '', $current_url);
	
	if (strpos($current_url, '?') !== false) {
		$url_add = '&';
	} else {
		$url_add = '?';
	}
	
	if($currency == 1) {
		$currency_array[1]['code'] = get_option('shb_currency_code_1');
		$currency_array[1]['url'] = $current_url . $url_add .'shb-currency=1';
		$currency_array[2]['code'] = get_option('shb_currency_code_2');
		$currency_array[2]['url'] = $current_url . $url_add .'shb-currency=2';
		$currency_array[3]['code'] = get_option('shb_currency_code_3');
		$currency_array[3]['url'] = $current_url . $url_add .'shb-currency=3';
	}
	
	if($currency == 2) {
		$currency_array[1]['code'] = get_option('shb_currency_code_2');
		$currency_array[1]['url'] = $current_url . $url_add .'shb-currency=2';
		$currency_array[2]['code'] = get_option('shb_currency_code_1');
		$currency_array[2]['url'] = $current_url . $url_add .'shb-currency=1';
		$currency_array[3]['code'] = get_option('shb_currency_code_3');
		$currency_array[3]['url'] = $current_url . $url_add .'shb-currency=3';
	}
	
	if($currency == 3) {
		$currency_array[1]['code'] = get_option('shb_currency_code_3');
		$currency_array[1]['url'] = $current_url . $url_add .'shb-currency=3';
		$currency_array[2]['code'] = get_option('shb_currency_code_1');
		$currency_array[2]['url'] = $current_url . $url_add .'shb-currency=1';
		$currency_array[3]['code'] = get_option('shb_currency_code_2');
		$currency_array[3]['url'] = $current_url . $url_add .'shb-currency=2';
	}
	
	$o .= '<ul class="' . $class . '">';
	$o .= '<li>';
	$o .= '<a href="' . $currency_array[1]['url'] . '">' . $currency_array[1]['code'] . '<i class="fas fa-chevron-down"></i></a>';
	$o .= '<ul>';
	$o .= '<li><a href="' . $currency_array[2]['url'] . '">' . $currency_array[2]['code'] . '</a></li>';
	$o .= '<li><a href="' . $currency_array[3]['url'] . '">' . $currency_array[3]['code'] . '</a></li>';
	$o .= '</ul>';
	$o .= '</li>';
	$o .= '</ul>';
	
	return $o;
	
}



/* ----------------------------------------------------------------------------

   Get price with currency symbol

---------------------------------------------------------------------------- */
function shb_get_price($price) {
	
	
	if(!empty($price['currency'])) {
		$currency = $price['currency'];
		$price = $price['price'];
	}

	// Set currency
	shb_set_currency();
	
	// If no currency options are set use defaults
	if( (empty(get_option('shb_currency_symbol_1'))) && (empty(get_option('shb_currency_symbol_2'))) && (empty(get_option('shb_currency_symbol_3'))) ) {
		
		$currency_array[1]['price'] = $price;
		$currency_array[1]['symbol'] = '$';
		$currency_array[1]['symbol_position'] = 'before';
		$currency_array[1]['decimal_places'] = 2;
		$currency_array[1]['decimal_separator'] = '.';
		$currency_array[1]['thousand_separator'] = ',';
		$currency_array[1]['conversion_multiplier'] = 1;
		
	} else {
		
		// Get currency data
		foreach (range(1, 3) as $r) {
		
			$currency_array[$r]['price'] = $price;
		
			if(!empty(get_option('shb_currency_symbol_' . $r))) {
				$currency_array[$r]['symbol'] = get_option('shb_currency_symbol_' . $r);
			}
		
			if(!empty(get_option('shb_currency_symbol_position_' . $r))) {
				$currency_array[$r]['symbol_position'] = get_option('shb_currency_symbol_position_' . $r);
			}
		
			if(!empty(get_option('shb_decimal_places_' . $r))) {
				$currency_array[$r]['decimal_places'] = get_option('shb_decimal_places_' . $r);
			}
		
			if(!empty(get_option('shb_decimal_separator_' . $r))) {
				$currency_array[$r]['decimal_separator'] = get_option('shb_decimal_separator_' . $r);
			}
		
			if(!empty(get_option('shb_thousand_separator_' . $r))) {
				$currency_array[$r]['thousand_separator'] = get_option('shb_thousand_separator_' . $r);
			}
	
			if(!empty(get_option('shb_conversion_multiplier_' . $r))) {
				$currency_array[$r]['conversion_multiplier'] = get_option('shb_conversion_multiplier_' . $r);
			}

		}
		
	}
	
	// Convert currency if set
	if(!empty($_SESSION['shb_currency'])) {
		
		if($_SESSION['shb_currency'] == 2) {
			$price_data = $currency_array[2];
		} elseif($_SESSION['shb_currency'] == 3) {
			$price_data = $currency_array[3];
		} else {
			$price_data = $currency_array[1];
		}
		
	} else {
		$price_data = $currency_array[1];
	}
	
	// Override session if you want to display default none converted price
	if(!empty($currency)) {
		$price_data = $currency_array[$currency];
	}
	
	// Set decimal places
	if($price_data['decimal_places'] == 'one') {
		$decimal_places = 1;
	} elseif($price_data['decimal_places'] == 'two') {
		$decimal_places = 2;
	} elseif($price_data['decimal_places'] == 'three') {
		$decimal_places = 3;
	} elseif($price_data['decimal_places'] == 'four') {
		$decimal_places = 4;
	} else {
		$decimal_places = 0;
	}
	
	// Convert to other currency
	if($price_data['price'] > 0) {
		$price_data['price'] = $price_data['price'] * $price_data['conversion_multiplier'];
	} else {
		$price_data['price'] = 0;
	}

	// Format number
	$price_data['price'] = number_format((float)$price_data['price'], $decimal_places, $price_data['decimal_separator'], $price_data['thousand_separator']);
	
	// Set currency symbol position
	if($price_data['symbol_position'] == 'before') {
		$return_price = $price_data['symbol'] . $price_data['price'];
	} else {
		$return_price = $price_data['price'] . $price_data['symbol'];
	}
	
	return $return_price;
	
	/*
	if(!empty(get_option('shb_currency_symbol'))) {
		$currency_symbol = get_option('shb_currency_symbol');
	} else {
		$currency_symbol = '$';
	}
	
	if(!empty(get_option('shb_currency_symbol_position'))) {
		$currency_symbol_position = get_option('shb_currency_symbol_position');
	} else {
		$currency_symbol_position = 'before';
	}
	
	if(!empty(get_option('shb_price_decimal_places'))) {
		
		if(get_option('shb_price_decimal_places') == 'zero') {
			$price_decimal_places = 0;
		} elseif(get_option('shb_price_decimal_places') == 'one') {
			$price_decimal_places = 1;
		} elseif(get_option('shb_price_decimal_places') == 'two') {
			$price_decimal_places = 2;
		} elseif(get_option('shb_price_decimal_places') == 'three') {
			$price_decimal_places = 3;
		} elseif(get_option('shb_price_decimal_places') == 'four') {
			$price_decimal_places = 4;
		} else {
			$price_decimal_places = 0;
		}
		
	} else {
		$price_decimal_places = 0;
	}
	
	if(!empty(get_option('shb_price_decimal_separator'))) {
		$price_decimal_separator = get_option('shb_price_decimal_separator');
	} else {
		$price_decimal_separator = '.';
	}
	
	if(!empty(get_option('shb_price_thousand_separator'))) {
		$price_thousand_separator = get_option('shb_price_thousand_separator');
	} else {
		$price_thousand_separator = ',';
	}
	
	$price = number_format((float)$price, $price_decimal_places, $price_decimal_separator, $price_thousand_separator);
	
	if($currency_symbol_position == 'before') {
		$get_price = $currency_symbol . $price;
	} else {
		$get_price = $price . $currency_symbol;
	}
	
	return $get_price;
	*/
	
}



/* ----------------------------------------------------------------------------

   Get date

---------------------------------------------------------------------------- */
function shb_get_date($date) {
	
	$date = explode('-',$date);
	$date_format = get_option('shb_date_format');
	
	if($date_format == 'DD/MM/YYYY') {
		$formatted_date = $date[2] . '/' . $date[1] . '/' . $date[0];
	} 
	
	elseif($date_format == 'MM/DD/YYYY') {
		$formatted_date = $date[1] . '/' . $date[2] . '/' . $date[0];
	}
	
	elseif($date_format == 'YYYY/MM/DD') {
		$formatted_date = $date[0] . '/' . $date[1] . '/' . $date[2];
	}
	
	elseif($date_format == 'DD.MM.YYYY') {
		$formatted_date = $date[2] . '.' . $date[1] . '.' . $date[0];
	}
	
	elseif($date_format == 'MM.DD.YYYY') {
		$formatted_date = $date[1] . '.' . $date[2] . '.' . $date[0];
	}
	
	elseif($date_format == 'YYYY.MM.DD') {
		$formatted_date = $date[0] . '.' . $date[1] . '.' . $date[2];
	}
	
	else {
		$formatted_date = $date[2] . '/' . $date[1] . '/' . $date[0];
	}
	
	return $formatted_date;
	
}



/* ----------------------------------------------------------------------------

   Get currency symbol

---------------------------------------------------------------------------- */
function shb_get_currency_symbol() {
	
	if(!empty(get_option('shb_currency_symbol'))) {
		$currency_symbol = get_option('shb_currency_symbol');
	} else {
		$currency_symbol = '$';
	}
	
	return $currency_symbol;
	
}



/* ----------------------------------------------------------------------------

   Get select season/room for admin columns

---------------------------------------------------------------------------- */
function shb_get_column_selected_fields($meta_data,$post_type) {
	
	$column = '';
	$seasons = '';
	$accommodations = '';
	
	if($post_type == 'season') {
		$season_ids = shb_get_all_ids('shb_season');
	} elseif($post_type == 'accommodation') {
		$accommodation_ids = shb_get_all_ids('shb_accommodation');
	} elseif($post_type == 'rate') {
		$rate_ids = shb_get_all_ids('shb_rate');
		$accommodation_ids = shb_get_all_ids('shb_accommodation');
	}
	
	if($post_type == 'rate') {
		
		foreach($accommodation_ids as $accommodation_id) {
			
			$rates = '';
			
			foreach($rate_ids as $rate_id) {
			
				if(!empty($meta_data['shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id][0])) {	
					$rates .= '<span class="shb-rate-column">' . get_the_title($rate_id) . '<span>, </span></span>';
				}
			
			}
			
			if(!empty($rates)) {
				$column .= '<span class="shb-rate-column-wrapper">';
				$column .= '<a target="_blank" href="' . get_the_permalink($accommodation_id) . '">' . get_the_title($accommodation_id) . '<span>, </span></a>';
				$column .= $rates;
				$column .= '</span>';
				$rates = '';
			}
			
		}
		
	}
	
	if($post_type == 'season') {
		
		if(!empty($meta_data['shb_season_default'][0])) {	
			$seasons .= __('Default','sohohotel_booking') . '<span>, </span>';
		}
		
		foreach($season_ids as $season_id) {
			
			if(!empty($meta_data['shb_season_' . $season_id][0])) {	
				$seasons .= get_the_title($season_id) . '<span>, </span>';
			}
			
		}
		
		$column .= '<span class="shb-season-column-wrapper">';
		$column .= $seasons;
		$column .= '</span>';
	
	}
	
	if($post_type == 'accommodation') {
		
		foreach($accommodation_ids as $accommodation_id) {
			
			if(!empty($meta_data['shb_accommodation_' . $accommodation_id][0])) {	
				$accommodations .= '<a target="_blank" href="' . get_the_permalink($accommodation_id) . '">' . get_the_title($accommodation_id) . '<span>, </span></a>';
			}
			
		}
		
		$column .= '<span class="shb-accommodation-column-wrapper">';
		$column .= $accommodations;
		$column .= '</span>';
	
	}
	
	if ($column == '') {
		return '-';
	} else {
		return $column;
	}
	
}



/* ----------------------------------------------------------------------------

   Get display text

---------------------------------------------------------------------------- */
function shb_get_display_text($data) {
	
	$text = array(
		'fixed_amount' => __('Fixed Fee','sohohotel_booking'),
		'per_room' => __('Per Room','sohohotel_booking'),
		'per_person' => __('Per Person','sohohotel_booking'),
		'night' => __('Per Night','sohohotel_booking'),
		'booking' => __('Per Booking','sohohotel_booking'),
		'shb_pending' => __('Pending','sohohotel_booking'),
		'shb_confirmed' => __('Confirmed','sohohotel_booking'),
		'shb_cancelled' => __('Cancelled','sohohotel_booking'),
		'shb_ical' => __('iCal','sohohotel_booking'),
		'shb_maintenance' => __('Maintenance','sohohotel_booking'),
		'percentage' => __('Percentage','sohohotel_booking'),
		'exact' => __('Exact Price','sohohotel_booking'),
		'private' => __('Private','sohohotel_booking'),
		'dorm' => __('Dorm','sohohotel_booking'),
		'yes' => __('Yes','sohohotel_booking'),
		'no' => __('No','sohohotel_booking'),
		'duration' => __('Duration','sohohotel_booking'),
		'early' => __('Early','sohohotel_booking'),
		'late' => __('Late','sohohotel_booking')
	);
	
	foreach ($text as $key => $val) {
		
		if($key == $data) {
			return $val;
		}
		
	}

}



/* ----------------------------------------------------------------------------

   Get time elapsed

---------------------------------------------------------------------------- */
function shb_get_time_elapsed($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => __('year(s)','sohohotel_booking'),
        'm' => __('month(s)','sohohotel_booking'),
        'w' => __('week(s)','sohohotel_booking'),
        'd' => __('day(s)','sohohotel_booking'),
        'h' => __('hour(s)','sohohotel_booking'),
        'i' => __('minute(s)','sohohotel_booking'),
        's' => __('second(s)','sohohotel_booking'),
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ' . __('ago','sohohotel_booking') : __('just now','sohohotel_booking');
	
}



/* --------------------------------------------------------------------------------

   Get date range array

-------------------------------------------------------------------------------- */
function shb_get_date_range_array($date_from,$date_to) {
	
	$aryRange=array();
	
	$idate_from=mktime(1,0,0,substr($date_from,5,2),     substr($date_from,8,2),substr($date_from,0,4));
	$idate_to=mktime(1,0,0,substr($date_to,5,2),     substr($date_to,8,2),substr($date_to,0,4));
	
	if ($idate_to>=$idate_from) {
		array_push($aryRange,date('Y-m-d',$idate_from));
		while ($idate_from<$idate_to) {
			$idate_from+=86400;
			array_push($aryRange,date('Y-m-d',$idate_from));
		}
	}

	return $aryRange;

}



/* --------------------------------------------------------------------------------

   Check if date ranges overlap

-------------------------------------------------------------------------------- */
function shb_get_date_range_overlap($from1,$to1,$from2,$to2) {
	
	if ( $from1 <= $to2 && $to1 >= $from2 ) {
		return true;
	} else {
		return false;
	}
	
}



/* --------------------------------------------------------------------------------

   Calculate number of nights

-------------------------------------------------------------------------------- */
function shb_get_booking_nights($check_in,$check_out) {
	
	$check_in = strtotime($check_in);
	$check_out = strtotime($check_out);
	$num_nights = $check_out - $check_in;
	return floor($num_nights/(60*60*24));
	
}



/* --------------------------------------------------------------------------------

   Get the season for each date in an array of dates

-------------------------------------------------------------------------------- */
function shb_get_date_season($dates) {
	
	$o = array();
	
	$season_ids = shb_get_all_ids('shb_season');
	array_push($season_ids,'default');
	
	foreach($season_ids as $season_id) {
		
		$start = get_post_meta($season_id,'shb_start_date_alt',TRUE);
		$end = get_post_meta($season_id,'shb_end_date_alt',TRUE);
		$repeat = get_post_meta($season_id,'shb_repeat',TRUE);
		
		foreach($dates as $date) {
			
			if( (!empty($start)) && (!empty($end)) ) {
				
				/*if($repeat == 'yes') {
			
					$start_e = explode('-',$start);
					$end_e = explode('-',$end);
					$date_e = explode('-',$date);
			
					$start = $date_e[0] . '-' . $start_e[1] . '-' . $start_e[2];
					$end = $date_e[0] . '-' . $end_e[1] . '-' . $end_e[2];
				
				}*/
				
				if(shb_get_date_range_overlap($start,$end,$date,$date) == true) {
				
					$o[$date] = $season_id;
				
				}
				
			}
		
		}
		
	}
	
	foreach($dates as $date) {
			
		if(empty($o[$date])) {
			$o[$date] = 'default';
		}
			
	}
	
	return $o;
	
}



/* --------------------------------------------------------------------------------

   Check if a booking is eligible for a rate variation

-------------------------------------------------------------------------------- */
function shb_check_ratevariation($checkin,$checkout,$ratevariation_ids) {
	
	$booking_nights = shb_get_booking_nights($checkin,$checkout);
	
	foreach($ratevariation_ids as $ratevariation_id) {
		
		$ratevariation_type = get_post_meta($ratevariation_id,'shb_type',TRUE);
	
		if($ratevariation_type == 'duration') {
			if($booking_nights >= get_post_meta($ratevariation_id,'shb_applied_to',TRUE)) {	
				$durationids[$ratevariation_id] = get_post_meta($ratevariation_id,'shb_applied_to',TRUE);
			}
		}
	
		if($ratevariation_type == 'early') {
			$nights_before_checkin = shb_get_booking_nights(date("Y-m-d"),$checkin);
			if($nights_before_checkin > get_post_meta($ratevariation_id,'shb_applied_to',TRUE)) {
				$current_rate_id = $ratevariation_id;
			}
		}
	
		if($ratevariation_type == 'late') {
			$nights_before_checkin = shb_get_booking_nights($checkin,date("Y-m-d"));
			if(abs($nights_before_checkin) <= get_post_meta($ratevariation_id,'shb_applied_to',TRUE)) {
				$current_rate_id = $ratevariation_id;
			}
		}
		
	}
	
	if(!empty($durationids)) {
		
		$longest_duration = max($durationids);
		
		foreach($durationids as $durationid_key => $durationid_val) {
			if($durationid_val == $longest_duration) {
				$current_rate_id = $durationid_key;
			}
		}
		
	}

	if(empty($current_rate_id)) {
		$current_rate_id = 'default';
	}
	
	return $current_rate_id;
	
}



/* --------------------------------------------------------------------------------

   Calculate accommodation price

-------------------------------------------------------------------------------- */
function shb_get_accommodation_prices($data) {
	
	$checkin = $data['checkin'];
	$checkout = date( 'Y-m-d', strtotime( $data['checkout'] . ' -1 day' ) );
	$guests = $data['guests'];
	$dates = shb_get_date_range_array($checkin,$checkout);
	$season = shb_get_date_season($dates);
	
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$ratevariation_ids = shb_get_all_ids('shb_ratevariation');
	$rate_ids = shb_get_all_ids('shb_rate');
	$season_ids = shb_get_all_ids('shb_season');

	$o = array();
	
	foreach($accommodation_ids as $accommodation_id) {
		
		$price = get_post_meta($accommodation_id,'shb_pricing',TRUE);
		
		// Rate
		foreach($rate_ids as $rate_id) {
			
			if( get_post_meta($rate_id,'shb_accommodation_rate',TRUE) == $accommodation_id ) {
				
				foreach($dates as $date) {
			
					// Day of week
					$day = date('w', strtotime($date));
					
					// Set guestclass id to 'room' if room type is charge per room
					if( get_post_meta($accommodation_id,'shb_price_scheme',TRUE) == 'per_room' ) {
						$guestclass_ids = array('room');
						$guests['room'] = 1;
					} else {
						$guestclass_ids = shb_get_all_ids('shb_guestclass');
						$guests = $data['guests'];
					}
					
					// Guest class
					foreach($guestclass_ids as $guestclass_id) {
					
						if($guests[$guestclass_id] > 0) {
						
							// Guest qty
							$guestclass_qty = $guests[$guestclass_id];
							
							// Check season is added for rate and accommodation
							if(!empty($season[$date])) {
								if($season[$date] == 'default') {
									$current_season = 'default';
								} elseif(!empty(get_post_meta($season[$date],'shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id,TRUE))) {
									$current_season = $season[$date];
								} else {
									$current_season = 'default';
								}
							} else {
								$current_season = 'default';
							}
							
							$ratevariation_ids_accommodation_checked = array();
							
							// Rate variation
							foreach($ratevariation_ids as $ratevariation_id) {
								
								if( !empty(get_post_meta($ratevariation_id,'shb_season_' . $current_season,TRUE)) ) {
									
									if( !empty(get_post_meta($ratevariation_id,'shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id,TRUE)) ) {
									
										$ratevariation_ids_accommodation_checked[] = $ratevariation_id;
										
									}
									
								}
								
							}
							
							$ratevariation_ids_accommodation_checked = array_unique($ratevariation_ids_accommodation_checked);
						
							if(!empty($ratevariation_ids_accommodation_checked)) {
								$current_ratevariation = shb_check_ratevariation($data['checkin'],$data['checkout'],$ratevariation_ids_accommodation_checked);	
							} else {
								$current_ratevariation = 'default';
							}
							
							if(!empty($price[$rate_id][$current_season][$current_ratevariation][$day][$guestclass_id][$guestclass_qty])) {
								$get_price = $price[$rate_id][$current_season][$current_ratevariation][$day][$guestclass_id][$guestclass_qty];
							} else {
								$get_price = 0;
							}
							
							$o[$accommodation_id]['dates'][$date]['guestclass'][$guestclass_id]['rate'][$rate_id] = $get_price;
							$o[$accommodation_id]['dates'][$date]['details']['season'][$current_season] = $current_season;
							$o[$accommodation_id]['dates'][$date]['details']['ratevariation'][$current_ratevariation] = $current_ratevariation;
							
							$date_total[$accommodation_id]['dates'][$date]['rate'][$rate_id][] = $get_price;
							$total[$rate_id][] = $get_price;
							
						}
					
					}
					
					if(!empty($date_total[$accommodation_id]['dates'][$date]['rate'][$rate_id])) {
						$o[$accommodation_id]['dates'][$date]['details']['date_total'][$rate_id] = array_sum($date_total[$accommodation_id]['dates'][$date]['rate'][$rate_id]);
					}
			
				}
				
			}
			
			if(!empty($total[$rate_id])) {
				$o[$accommodation_id]['total']['rate'][$rate_id] = array_sum($total[$rate_id]);
			}
			
		}
		
		$total = array();
		
	}
	
	return $o;
	
}



/* --------------------------------------------------------------------------------

   Get accommodation availability

-------------------------------------------------------------------------------- */
function shb_get_accommodation_availability($data,$type) {
	
	$availability = array();
	
	// Get accommodation original quantity
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	foreach($accommodation_ids as $accommodation_id) {
	
		if(get_post_meta($accommodation_id,'shb_accommodation_type',TRUE) == 'shared-dorm') {
			$accommodation_original_qty[$accommodation_id] = (get_post_meta($accommodation_id,'shb_qty',TRUE) * get_post_meta($accommodation_id,'shb_total_max',TRUE));
		} else {
			$accommodation_original_qty[$accommodation_id] = get_post_meta($accommodation_id,'shb_qty',TRUE);
		}
	
	}
	
	// Live availability
	if(!empty($_SESSION['shb_booking_data'])) {
		
		foreach($_SESSION['shb_booking_data'] as $booking_detail_key => $booking_detail_val) {
		
			if(!empty($booking_detail_val['guests'])) {
				$total_guests = array_sum($booking_detail_val['guests']);
			} else {
				$total_guests = 1;
			}
		
			$room_type = get_post_meta($booking_detail_val['room_id'],'shb_accommodation_type',TRUE);
	
			$booking_date_range = shb_get_date_range_array($booking_detail_val['checkin'],date( 'Y-m-d', strtotime( $booking_detail_val['checkout'] . ' -1 day' ) ));
		
			foreach($booking_date_range as $booking_date) {
			
				if($room_type == 'private') {
		
					$accommodation_bookings[$booking_detail_val['room_id']][$booking_date][] = 1;
		
				} else {
		
					foreach (range(1, $total_guests) as $r) {
						$accommodation_bookings[$booking_detail_val['room_id']][$booking_date][] = 1;
					}
		
				}
			
			}
		
		}
		
	}
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
	
		$shb_post_translations = json_decode( get_option('shb_post_translations'), true );
		$main_base_language = sh_get_languages('base_language',1);
	
		if(!empty($accommodation_bookings)) {
			
			foreach($accommodation_bookings as $accommodation_id => $accommodation_data) {
		
				foreach($shb_post_translations[$main_base_language['id']] as $key1 => $data1) {
		
					foreach($data1 as $key2 => $data2) {
			
						foreach($data2 as $key3 => $data3) {
				
							if($key3 == $accommodation_id) {
						
								$accommodation_bookings_translated[$key1] = $accommodation_data;
						
							}
	
						}
		
					}
		
				}
		
			}
	
			$accommodation_bookings = $accommodation_bookings_translated;
			
		}

	}
	
	// Get booking IDs
	$booking_ids_query = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'shb_booking',
		'post_status' => array('shb_confirmed','shb_ical','shb_maintenance')
	));

	// Get bookings
	foreach($booking_ids_query as $booking_id) {
	
		$booking_details = json_decode( get_post_meta($booking_id,'shb_booking_data',TRUE), true);
		
		if(!empty($booking_details)) {
			
			foreach($booking_details as $booking_detail_key => $booking_detail_val) {
			
				if(!empty($booking_detail_val['guests'])) {
					$total_guests = array_sum($booking_detail_val['guests']);
				} else {
					$total_guests = 1;
				}
			
				$room_type = get_post_meta($booking_detail_val['room_id'],'shb_accommodation_type',TRUE);
				$booking_date_range = shb_get_date_range_array($booking_detail_val['checkin'],date( 'Y-m-d', strtotime( $booking_detail_val['checkout'] . ' -1 day' ) ));
			
				foreach($booking_date_range as $booking_date) {
				
					if($room_type == 'private') {
			
						$accommodation_bookings[$booking_detail_val['room_id']][$booking_date][] = 1;
			
					} else {
			
						foreach (range(1, $total_guests) as $r) {
							$accommodation_bookings[$booking_detail_val['room_id']][$booking_date][] = 1;
						}
			
					}
				
				}
			
			}
			
		}
		
	}
	
	// Calculate availability
	if(!empty($accommodation_bookings)) {
		
		foreach($accommodation_bookings as $accommodation_id => $accommodation_dates) {
		
			foreach($accommodation_dates as $accommodation_date => $accommodation_qty) {
			
				$total = $accommodation_original_qty[$accommodation_id] - array_sum($accommodation_qty);
			
				if($total <= 0) {
					$accommodation_bookings_total[$accommodation_id][$accommodation_date] = 'unavailable';
				} else {
					$accommodation_bookings_total[$accommodation_id][$accommodation_date] = $total;
				}
			
			}
		
		}
		
	}
	
	if($type == 1) {
		
		$checkin = $data['checkin'];
		$checkout = date( 'Y-m-d', strtotime( $data['checkout'] . ' -1 day' ) );
		$dates = shb_get_date_range_array($checkin,$checkout);
		
		foreach($accommodation_ids as $accommodation_id) {
		
			foreach($dates as $date) {
			
				if(!empty($accommodation_bookings_total[$accommodation_id][$date])) {
					
					if($accommodation_bookings_total[$accommodation_id][$date] == 'unavailable') {
						$booking_calc[$accommodation_id][$date] = 0;
					} else {
						$booking_calc[$accommodation_id][$date] = $accommodation_bookings_total[$accommodation_id][$date];
					}
 					
					
				} else {
					$booking_calc[$accommodation_id][$date] = $accommodation_original_qty[$accommodation_id];
				}
				
			}
			
			$availability[$accommodation_id] = min($booking_calc[$accommodation_id]);
			
		}
		
		
	} else {
		
		$checkin = $data['checkin'];
		$checkout = $data['checkout'];
		$dates = shb_get_date_range_array($checkin,$checkout);
		
		foreach($accommodation_ids as $accommodation_id) {
		
			foreach($dates as $date) {
				
				if(isset($accommodation_bookings_total[$accommodation_id][$date])) {
					$availability[$accommodation_id][$date] = $accommodation_bookings_total[$accommodation_id][$date];
				} else {
					$availability[$accommodation_id][$date] = $accommodation_original_qty[$accommodation_id];
				}
				
			}
			
		}
		
	}
	
	return $availability;

}



/* --------------------------------------------------------------------------------

   Get accommodation occupancy limits

-------------------------------------------------------------------------------- */
function shb_get_accommodation_occupancy_limits($data) {
	
	$o = array();

	$guests = $data['guests'];
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	foreach($accommodation_ids as $accommodation_id) {
		
		// Check min / max occupancy for each guest class
		foreach($guestclass_ids as $guestclass_id) {
			
			$guestclass_min = get_post_meta($accommodation_id,'shb_' . $guestclass_id . '_min',TRUE);
			$guestclass_max = get_post_meta($accommodation_id,'shb_' . $guestclass_id . '_max',TRUE);
			
			if($guestclass_min > 1 || $guestclass_max > 1) {
				$guestclass_title = get_post_meta($guestclass_id,'shb_guestclass_title_plural',TRUE);
			} else {
				$guestclass_title = get_the_title($guestclass_id);
			}
			
			// Check min occupancy
			if($guests[$guestclass_id] < $guestclass_min) {		
				$o[$accommodation_id]['min_' . $guestclass_id] = sprintf( __( 'Minimum %u %s', 'sohohotel_booking' ), $guestclass_min, $guestclass_title );
			}
			
			// Check max occupancy
			if($guests[$guestclass_id] > $guestclass_max) {
				$o[$accommodation_id]['max_' . $guestclass_id] = sprintf( __( 'Maximum %u %s', 'sohohotel_booking' ), $guestclass_max, $guestclass_title );
			}

		}
		
		// Check total min / max occupancy
		$total_guests = array_sum($guests);
		$total_min = get_post_meta($accommodation_id,'shb_total_min',TRUE);
		$total_max = get_post_meta($accommodation_id,'shb_total_max',TRUE);
		
		if($total_min > 1 || $total_max > 1) {
			$total_guests_title = __('guests','sohohotel_booking');
		} else {
			$total_guests_title = __('guest','sohohotel_booking');
		}
		
		// Check min occupancy
		if($total_guests < $total_min) {		
			$o[$accommodation_id]['min_total'] = sprintf( __( 'Minimum total of %u %s', 'sohohotel_booking' ), $total_min, $total_guests_title );
		}
		
		// Check max occupancy
		if($total_guests > $total_max) {		
			$o[$accommodation_id]['max_total'] = sprintf( __( 'Maximum total of %u %s', 'sohohotel_booking' ), $total_max, $total_guests_title );
		}

	}
	
	return $o;
	
}



/* --------------------------------------------------------------------------------

   Get accommodation conditions

-------------------------------------------------------------------------------- */
function shb_get_accommodation_conditions($data) {
	
	$o = array();
	
	$checkin = $data['checkin'];
	$checkout = date( 'Y-m-d', strtotime( $data['checkout'] . ' -1 day' ) );
	$guests = $data['guests'];
	$dates = shb_get_date_range_array($checkin,$checkout);
	$season = shb_get_date_season($dates);
	$condition_ids = shb_get_all_ids('shb_condition');
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$season_ids = shb_get_all_ids('shb_season');
	$season_ids[] = 'shb_season_default';
	$stay_duration = shb_get_booking_nights($data['checkin'],$data['checkout']);	
	$notice_duration = shb_get_booking_nights(date("Y-m-d"),$checkin);
	$checkin_day = date('w', strtotime($checkin));
	$checkout_day = date('w', strtotime($data['checkout']));
	$days = shb_day_names('full');
	$seasons_added = array();
	
	foreach($condition_ids as $condition_id) {
		
		$seasons_added = array();
		
		foreach($accommodation_ids as $accommodation_id) {
			
			foreach($season_ids as $season_id) {
				
				if(!empty(get_post_meta($condition_id,'shb_season_default',TRUE))) {
					$seasons_added[] = 'default';
				} 
				
				if(!empty(get_post_meta($condition_id,'shb_season_' . $season_id,TRUE))) {
					$seasons_added[] = $season_id;
				}
			
			}
			
			$rate_ids = shb_get_accommodation_rates($accommodation_id);
			
			foreach($rate_ids as $rate_id) {
				
				if(empty(get_post_meta($condition_id,'shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id,TRUE))) {
					$separate_conditions[$accommodation_id][] = true;
				}
				
			}
			
			foreach($rate_ids as $rate_id) {
				
				// Check added for accommodation and rate
				if(!empty(get_post_meta($condition_id,'shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id,TRUE))) {
					
					// Check if added for booking's season
					if ( array_intersect($seasons_added, $season) ) {
						
						$apply_on_specific_day = array();
						
						// Only apply rules on specific check in days
						if(!empty(get_post_meta($condition_id,'shb_apply_check_in_' . $checkin_day,TRUE))) {
							$apply_on_specific_day[] = true;
						}
						
						// Only apply rules on specific check out days
						if(!empty(get_post_meta($condition_id,'shb_apply_check_out_' . $checkout_day,TRUE))) {
							$apply_on_specific_day[] = true;
						}
						
						if (in_array(true, $apply_on_specific_day)) {
							
							$min_nights = get_post_meta($condition_id,'shb_min_stay',TRUE);
							$max_nights = get_post_meta($condition_id,'shb_max_stay',TRUE);
							
							$allowed_check_in = array();
							$allowed_check_out = array();
							$apply_check_in = array();
							$apply_check_out = array();
							
							foreach (range(0, 6) as $r) {
								
								if(!empty(get_post_meta($condition_id,'shb_allowed_check_in_' . $r,TRUE))) {
									$allowed_check_in[] = $days[$r];
								}
								
								if(!empty(get_post_meta($condition_id,'shb_allowed_check_out_' . $r,TRUE))) {
									$allowed_check_out[] = $days[$r];
								}
								
								if(!empty(get_post_meta($condition_id,'shb_apply_check_in_' . $r,TRUE))) {
									$apply_check_in[] = $days[$r];
								}
								
								if(!empty(get_post_meta($condition_id,'shb_apply_check_out_' . $r,TRUE))) {
									$apply_check_out[] = $days[$r];
								}
								
							}
							
							// Check if condition added for all rates of accommodation, if it is there is no need to repeat same conditions output for multiple conditions
							if(empty($separate_conditions[$accommodation_id])) {
								$condition_path = 'room_conditions';
								$rate_id = 'room';
							} else {
								$condition_path = 'rate_conditions';
							}
							
							// Check min stay
							if($stay_duration < $min_nights) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['min_stay_check_in'] = sprintf( __( 'You must book a minimum of %s nights when checking in on %s', 'sohohotel_booking' ), $min_nights, shb_format_list($apply_check_in) );
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['min_stay_check_out'] = sprintf( __( 'You must book a minimum of %s nights when checking out on %s', 'sohohotel_booking' ), $min_nights, shb_format_list($apply_check_out) );
								
							} 
		
							// Check max stay
							if($stay_duration > $max_nights) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['max_stay_check_in'] = sprintf( __( 'You can book a maximum of %s nights when checking in on %s', 'sohohotel_booking' ), $max_nights, shb_format_list($apply_check_in) );
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['max_stay_check_out'] = sprintf( __( 'You can book a maximum of %s nights when checking out on %s', 'sohohotel_booking' ), $max_nights, shb_format_list($apply_check_out) );
							}
							
							// Check advance notice
							$advance_notice = get_post_meta($condition_id,'shb_advance_notice',TRUE);
							$today = date('Y-m-d');
							$booking_notice = shb_get_booking_nights($today,$checkin);
							
							if($booking_notice < $advance_notice) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['advance_notice'] = sprintf( __( 'You must book %s nights in advance', 'sohohotel_booking' ), $advance_notice );
							}
							
							// Check increments
							$increments = get_post_meta($condition_id,'shb_increments',TRUE);
							$booking_increment = $stay_duration;
							
							if ($booking_increment % $increments != 0) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['advance_notice'] = sprintf( __( 'You must book in increments of %s nights e.g. %s nights, %s nights, %s nights, etc', 'sohohotel_booking' ), $increments,$increments,($increments * 2),($increments * 3) );
							}
							
							// Check allowed check in
							if(empty(get_post_meta($condition_id,'shb_allowed_check_in_' . $checkin_day,TRUE))) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['allowed_check_in'] = sprintf( __( 'Check in allowed on %s for the selected dates', 'sohohotel_booking' ), shb_format_list($allowed_check_in) );
							}
		
							// Allowed check out
							if(empty(get_post_meta($condition_id,'shb_allowed_check_out_' . $checkout_day,TRUE))) {
								$o[$accommodation_id][$condition_path][$rate_id][$condition_id]['allowed_check_out'] = sprintf( __( 'Check out allowed on %s for the selected dates', 'sohohotel_booking' ), shb_format_list($allowed_check_out) );
							}
							
						}
					   
					}
					
				}
				
			}
			
		}
		
	}
	
	return $o;
	
}



/* --------------------------------------------------------------------------------

   Format list

-------------------------------------------------------------------------------- */
function shb_format_list($data) {
	
	$data_last = array_pop($data);
	return count($data) ? implode(", ", $data) . ' ' . __('and','sohohotel_booking') . ' ' . $data_last : $data_last;
	
}



/* --------------------------------------------------------------------------------

   Get day names

-------------------------------------------------------------------------------- */
function shb_day_names($data) {
	
	if($data == 'full') {
		
		$days = array(
			1 => __('Monday','sohohotel_booking'),
			2 => __('Tuesday','sohohotel_booking'),
			3 => __('Wednesday','sohohotel_booking'),
			4 => __('Thursday','sohohotel_booking'),
			5 => __('Friday','sohohotel_booking'),
			6 => __('Saturday','sohohotel_booking'),
			0 => __('Sunday','sohohotel_booking'),
			//7 => __('Sunday','sohohotel_booking'),
		);
		
	} elseif($data == 'short') {
		
		$days = array(
			1 => __('Mon','sohohotel_booking'),
			2 => __('Tue','sohohotel_booking'),
			3 => __('Wed','sohohotel_booking'),
			4 => __('Thu','sohohotel_booking'),
			5 => __('Fri','sohohotel_booking'),
			6 => __('Sat','sohohotel_booking'),
			0 => __('Sun','sohohotel_booking'),
			//7 => __('Sun','sohohotel_booking'),
		);
		
	}
	
	return $days;
	
}



/* --------------------------------------------------------------------------------

   Get day names 7 (PHP date uses array index 7 for sundays instead of 0)

-------------------------------------------------------------------------------- */
function shb_day_names_7($data) {
	
	if($data == 'full') {
		
		$days = array(
			1 => __('Monday','sohohotel_booking'),
			2 => __('Tuesday','sohohotel_booking'),
			3 => __('Wednesday','sohohotel_booking'),
			4 => __('Thursday','sohohotel_booking'),
			5 => __('Friday','sohohotel_booking'),
			6 => __('Saturday','sohohotel_booking'),
			7 => __('Sunday','sohohotel_booking'),
		);
		
	} elseif($data == 'short') {
		
		$days = array(
			1 => __('Mon','sohohotel_booking'),
			2 => __('Tue','sohohotel_booking'),
			3 => __('Wed','sohohotel_booking'),
			4 => __('Thu','sohohotel_booking'),
			5 => __('Fri','sohohotel_booking'),
			6 => __('Sat','sohohotel_booking'),
			7 => __('Sun','sohohotel_booking'),
		);
		
	}
	
	return $days;
	
}



/* --------------------------------------------------------------------------------

   Get accommodation rates

-------------------------------------------------------------------------------- */
function shb_get_accommodation_rates($accommodation_id) {
	
	$o = array();
	$rate_ids = shb_get_all_ids('shb_rate');
	
	foreach($rate_ids as $rate_id) {
	
		if( get_post_meta($rate_id,'shb_accommodation_rate',TRUE) == $accommodation_id ) {
			$o[] = $rate_id;
		}
		
	}
	
	return $o;
	
}



/* --------------------------------------------------------------------------------

   Get accommodation booking select

-------------------------------------------------------------------------------- */
function shb_accommodation_booking_select($data) {
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
	
		$current_blog_id = get_current_blog_id();
		$current_base_language = sh_get_languages('base_language',get_current_blog_id());
		$main_base_language = sh_get_languages('base_language',1);
	
		switch_to_blog(1);
	
		$shb_post_translations = json_decode( get_option('shb_post_translations'), true );
		$guestclass_ids_base_language = shb_get_all_ids('shb_guestclass');
	
	
		foreach($guestclass_ids_base_language as $guestclass_id) {
			$guestclass_ids_translated[array_key_first($shb_post_translations[$main_base_language['id']][$guestclass_id][$current_base_language['id']])] = $guestclass_id;	
		}
	
		$data_base_language['checkin'] = $data['checkin'];
		$data_base_language['checkout'] = $data['checkout'];
	
		foreach($data['guests'] as $guestclass_id => $guestclass_qty) {
			$data_base_language['guests'][$guestclass_ids_translated[$guestclass_id]] = $guestclass_qty;
		}
	
		$data = $data_base_language;
	
	}
	
	$shb_get_accommodation_prices = shb_get_accommodation_prices($data);
	$shb_get_accommodation_availability = shb_get_accommodation_availability($data,1);
	$shb_get_accommodation_occupancy_limits = shb_get_accommodation_occupancy_limits($data);
	
	// Only apply booking conditions to bookings placed on the frontend, not in admin dashboard
	if ( is_user_logged_in() && current_user_can( 'administrator' ) && is_admin() ) {
	    $shb_get_accommodation_conditions = array();
	} else {
	   $shb_get_accommodation_conditions = shb_get_accommodation_conditions($data);
	}
	
	foreach($shb_get_accommodation_availability as $accommodation_id => $accommodation_qty) {
		
		if($accommodation_qty == 'unavailable') {
			$o[$accommodation_id]['quantity_available'] = 0;
		} else {
			$o[$accommodation_id]['quantity_available'] = $accommodation_qty;
		}

		if(!empty($shb_get_accommodation_occupancy_limits[$accommodation_id]) || !empty($shb_get_accommodation_conditions[$accommodation_id]['room_conditions']['room']) || $accommodation_qty < 1) {
			$o[$accommodation_id]['bookable'] = 'unavailable';
		} else {
			$o[$accommodation_id]['bookable'] = 'available';
		}
		
		if($accommodation_qty < 1) {
			$o[$accommodation_id]['conditions'][] = __('This room is fully booked for the selected dates','sohohotel_booking');
		}
		
		if(!empty($shb_get_accommodation_occupancy_limits[$accommodation_id]) || !empty($shb_get_accommodation_conditions[$accommodation_id]['room_conditions']['room']) || $accommodation_qty < 1) {
			
			if(!empty($shb_get_accommodation_occupancy_limits[$accommodation_id])) {
			
				foreach($shb_get_accommodation_occupancy_limits[$accommodation_id] as $condition_key => $condition_val) {
					$o[$accommodation_id]['conditions'][] = $condition_val;
				}
			
			}
			
			if(!empty($shb_get_accommodation_conditions[$accommodation_id]['room_conditions']['room'])) {
				
				foreach($shb_get_accommodation_conditions[$accommodation_id]['room_conditions']['room'] as $condition_key => $condition_val) {
				
					foreach($condition_val as $condition_val2) {
						$o[$accommodation_id]['conditions'][] = $condition_val2;
					}
				
				}
				
			}
			
		}
		
		if(!empty($shb_get_accommodation_prices[$accommodation_id]['total']['rate'])) {
			
			foreach($shb_get_accommodation_prices[$accommodation_id]['total']['rate'] as $rate_id => $price) {
			
				if(!empty($shb_get_accommodation_conditions[$accommodation_id]['rate_conditions'][$rate_id]) || !empty($shb_get_accommodation_occupancy_limits[$accommodation_id]) || $accommodation_qty < 1 || !empty($shb_get_accommodation_conditions[$accommodation_id]['room_conditions']['room'])) {
					$o[$accommodation_id]['rates'][$rate_id]['bookable'] = 'unavailable';
				} else {
					$o[$accommodation_id]['rates'][$rate_id]['bookable'] = 'available';
				}
			
				if(!empty($shb_get_accommodation_conditions[$accommodation_id]['rate_conditions'][$rate_id])) {
			
					foreach($shb_get_accommodation_conditions[$accommodation_id]['rate_conditions'][$rate_id] as $condition_key => $condition_val) {
				
						foreach($condition_val as $condition_val2) {
							$o[$accommodation_id]['rates'][$rate_id]['conditions'][] = $condition_val2;
						}
				
					}
			
				}
			
				$o[$accommodation_id]['rates'][$rate_id]['price'] = $price;
	
			}
			
		}
		
	}
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
		
		foreach($o as $room_id => $booking_info) {
			
			$translated_room = array_key_first($shb_post_translations[$main_base_language['id']][$room_id][$current_base_language['id']]);
			
			$o_translated[$translated_room]['quantity_available'] = $booking_info['quantity_available'];
			$o_translated[$translated_room]['bookable'] = $booking_info['bookable'];
			$o_translated[$translated_room]['conditions'] = $booking_info['conditions'];
			
			foreach($booking_info['rates'] as $rate_id => $rate_info) {
				
				$translated_rate = array_key_first($shb_post_translations[$main_base_language['id']][$rate_id][$current_base_language['id']]);
				
				$o_translated[$translated_room]['rates'][$translated_rate] = $rate_info;
				
			}
			
		}
		
		$o = $o_translated;
		
		switch_to_blog($current_blog_id);
	
	}
	
	// Sort results so that available rooms display first
	foreach($o as $accommodation_id => $accommodation_data) {
		
		if($accommodation_data['bookable'] == 'unavailable') {
			$unavailable[$accommodation_id] = $accommodation_data;
		} elseif($accommodation_data['bookable'] == 'available') {
			$available[$accommodation_id] = $accommodation_data;
		}
		
	}
	
	$result = array();
	
	if(!empty($available)) {
		foreach($available as $accommodation_id => $accommodation_data) {
			$result[$accommodation_id] = $accommodation_data;
		}
	}
	
	if(!empty($unavailable)) {
		foreach($unavailable as $accommodation_id => $accommodation_data) {
			$result[$accommodation_id] = $accommodation_data;
		}
	}
	
	return $result;

}



/* --------------------------------------------------------------------------------

   Different booking dates check

-------------------------------------------------------------------------------- */
function shb_different_booking_dates_check($booking_details) {
	
	$checkin_diff = array();
	$checkout_diff = array();

	foreach($booking_details as $booking_detail) {
	
		if(empty($checkin)) {
			$checkin = $booking_detail['checkin'];
		} else {
		
			if($checkin !== $booking_detail['checkin']) {
				$checkin_diff[] = true;
			}
		
		}
	
		if(empty($checkout)) {
			$checkout = $booking_detail['checkout'];
		} else {
		
			if($checkout !== $booking_detail['checkout']) {
				$checkout_diff[] = true;
			}
		
		}
	
	}

	if (in_array(true, $checkin_diff) || in_array(true, $checkout_diff)) {
		return true;
	} else {
		return false;
	}
	
}



/* --------------------------------------------------------------------------------

   Get available additional fee IDs

-------------------------------------------------------------------------------- */
function shb_get_available_additionalfee_ids($data) {
	
	$available_additionalfee_ids = array();
	
	$additionalfee_ids = shb_get_all_ids('shb_additionalfee');
	
	if(!empty($additionalfee_ids)) {
		foreach($data as $key => $booking_data) {
		
			$dates = shb_get_date_range_array($booking_data['checkin'],$booking_data['checkout']);
			$seasons = shb_get_date_season($dates);
		
			foreach($additionalfee_ids as $additionalfee_id) {

				$additionalfee_data = get_post_meta($additionalfee_id);
			
				foreach($seasons as $date => $season) {
				
					if(!empty($additionalfee_data['shb_season_' . $season][0])) {
						
						if(!empty($additionalfee_data['shb_accommodation_rate_' . $booking_data['room_id'] . '_' . $booking_data['rate_id']][0])) {
							$available_additionalfee_ids[$key][$additionalfee_id] = $additionalfee_id;
						}
					
					}
			
				}

			}
		
		}
	} else {
		$available_additionalfee_ids = array();
	}
	
	return $available_additionalfee_ids;
	
}



/* --------------------------------------------------------------------------------

   Get booking summary

-------------------------------------------------------------------------------- */
function shb_get_booking_summary($data) {
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if(!empty($data['shb_booking_data'][0])) {
		
		$booking_data = json_decode( $data['shb_booking_data'][0], true);
		
		foreach($booking_data as $key => $val) {
			
			$calculate_price = array();
			
			$guests_list = array();
			$price_data['checkin'] = $val['checkin'];
			$price_data['checkout'] = $val['checkout'];
			
			foreach($val['guests'] as $guest_id => $guest_qty) {
				$price_data['guests'][$guest_id] = $guest_qty;
				//$guests_list[] = get_the_title($guest_id) . ' ' . $guest_qty;
			}
	
			$accommodation_price = shb_get_accommodation_prices($price_data);
			$daterange = shb_get_date_range_array($price_data['checkin'],$price_data['checkout']);
			$nights = shb_get_booking_nights($val['checkin'],$val['checkout']);
	
			$booking_summary['items'][$key]['checkin'] = $val['checkin'];
			$booking_summary['items'][$key]['checkout'] = $val['checkout'];
			$booking_summary['items'][$key]['room_title'] = get_the_title($val['room_id']);
			$booking_summary['items'][$key]['rate_title'] = get_the_title($val['rate_id']);
			$booking_summary['items'][$key]['room_id'] = $val['room_id'];
			
			if($nights > 1) {
				$booking_summary['items'][$key]['nights'] = $nights . ' ' . __('Nights','sohohotel_booking');
			} else {
				$booking_summary['items'][$key]['nights'] = $nights . ' ' . __('Night','sohohotel_booking');
			}
			
			$booking_summary['items'][$key]['guests'] = shb_guestclass_qty_label($val['guests']);
			$booking_summary['items'][$key]['delete_url'] = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-delete-room=' . $key;
			
			if(!empty(get_option('shb_booking_page'))) {
				$booking_page_url = get_permalink(get_option('shb_booking_page'));
			} else {
				$booking_page_url = '';
			}
			
			$booking_summary['items'][$key]['delete_url_frontend'] = $booking_page_url . '?shb-delete-room=' . $key;
			
			foreach($daterange as $date) {
				if(!empty($accommodation_price[$val['room_id']]['dates'][$date]['details']['date_total'][$val['rate_id']])) {
					$booking_summary['items'][$key]['pricebreakdown'][$date] = $accommodation_price[$val['room_id']]['dates'][$date]['details']['date_total'][$val['rate_id']];
				
					$calculate_price[] =  $accommodation_price[$val['room_id']]['dates'][$date]['details']['date_total'][$val['rate_id']];
				
				}
			}
		
			$booking_summary['items'][$key]['price'] = array_sum($calculate_price);
			//$calculate_price = array();
			
			$booking_total_price[] = array_sum($calculate_price);
		
			if(!empty($val['additionalfee'])) {
				
				foreach($val['additionalfee'] as $additionalfee_key => $additionalfee_val) {
					
					$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['id'] = $additionalfee_val['additionalfee_id'];
					$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['title'] = get_the_title($additionalfee_val['additionalfee_id']);
					$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['price'] = $additionalfee_val['price'];
					$booking_total_price[] = $additionalfee_val['price'];
					
					if(!empty($additionalfee_val['qty'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['qty'] = $additionalfee_val['qty'];
					}
			
					if(!empty($additionalfee_val['date'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['date'] = $additionalfee_val['date'];
					}
			
					if(!empty($additionalfee_val['time'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['time'] = $additionalfee_val['time'];
					}
					
					if(!empty($additionalfee_val['custom_input'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['custom_input'] = $additionalfee_val['custom_input'];
					}
					
					if(!empty($additionalfee_val['custom_input'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['custom_input_name'] = get_post_meta($additionalfee_val['additionalfee_id'],'shb_custom_text_input_name',TRUE);
					}
					
					if(!empty($additionalfee_val['custom_select'])) {
						
						$select_option_exp = get_post_meta($additionalfee_val['additionalfee_id'],'shb_custom_select_options',TRUE);
						$select_option_exp_arr = explode("|",$select_option_exp);
						
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['custom_select'] = $select_option_exp_arr[($additionalfee_val['custom_select'] - 1)];
						
					}
					
					if(!empty($additionalfee_val['custom_select'])) {
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['custom_select_name'] = get_post_meta($additionalfee_val['additionalfee_id'],'shb_custom_select_name',TRUE);
					}
					
					if(get_post_meta($additionalfee_val['additionalfee_id'],'shb_optional',TRUE) == 'yes') {
						
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['delete_url'] = get_admin_url() . 'post.php?post=' . get_the_ID() . '&action=edit&shb-delete-additionalfee=' . $additionalfee_key . '&shb-room=' . $key;
						
						$booking_summary['items'][$key]['additionalfee'][$additionalfee_key]['delete_url_frontend'] = $booking_page_url . '?shb-step=2&shb-delete-fee=' . $additionalfee_key . '&shb-delete-feeroom=' . $key;
						
					}
			
				}
			}

		}
	
		$booking_summary['total_items'] = count($booking_summary['items']);
		$booking_summary['total_price'] = array_sum($booking_total_price);
	
		return $booking_summary;
		
	}
	
}



/* --------------------------------------------------------------------------------

   Select additional fees admin

-------------------------------------------------------------------------------- */
function shb_select_additionalfee_admin($data) {
	
	// Check user level
	if ( !current_user_can( 'edit_post', get_the_ID() )) {
		return get_the_ID();
	}
	
	if(!empty($data['shb_additionalfee'][0])) {
		
		$existing_booking = json_decode( $data['shb_booking_data'][0], true);
		$existing_additionalfee = json_decode( $data['shb_additionalfee'][0], true);
		
		foreach($existing_booking as $key => $val) {
		
			if(!empty($val['additionalfee'])) {
				$additionalfee_count = count($val['additionalfee']) + 1;
			} else {
				$additionalfee_count = 1;
			}
		
			if(!empty($data['shb_additionalfee_accommodation_selected'][0])) {
			
				if($key == $data['shb_additionalfee_accommodation_selected'][0]) {
		
					$additionalfee_id = $data['shb_additionalfee_selected'][0];
					$additionalfee_meta = get_post_meta($additionalfee_id);
			
					if($additionalfee_meta['shb_charge'][0] == 'per_room') {
						$charge_price = $additionalfee_meta['shb_price'][0];
					} elseif($additionalfee_meta['shb_charge'][0] == 'per_person') {
						$charge_price = $additionalfee_meta['shb_price'][0] * $val['guests_total'];
					}
			
					if($additionalfee_meta['shb_per'][0] == 'night') {
						$per_price = $charge_price * $val['nights'];
					} elseif($additionalfee_meta['shb_per'][0] == 'booking') {
						$per_price = $charge_price;
					}
			
					if(!empty($additionalfee_val['qty'])) {
						$price = $per_price * $existing_additionalfee[$key][$additionalfee_id]['qty'];
					} else {
						$price = $per_price;
					}
			
					$existing_booking[$key]['additionalfee'][$additionalfee_count]['additionalfee_id'] = $additionalfee_id;
					$existing_booking[$key]['additionalfee'][$additionalfee_count]['price'] = $price;
			
					if(!empty($existing_additionalfee[$key][$additionalfee_id]['qty'])) {
						$existing_booking[$key]['additionalfee'][$additionalfee_count]['qty'] = $existing_additionalfee[$key][$additionalfee_id]['qty'];
					}
			
					if(!empty($existing_additionalfee[$key][$additionalfee_id]['date'])) {
						$existing_booking[$key]['additionalfee'][$additionalfee_count]['date'] = $existing_additionalfee[$key][$additionalfee_id]['date'];
					}
			
					if(!empty($existing_additionalfee[$key][$additionalfee_id]['time-hour'])) {
						$existing_booking[$key]['additionalfee'][$additionalfee_count]['time'] = $existing_additionalfee[$key][$additionalfee_id]['time-hour'] . ':' . $existing_additionalfee[$key][$additionalfee_id]['time-min'];
					}
					
					if(!empty($existing_additionalfee[$key][$additionalfee_id]['custom_input'])) {
						$existing_booking[$key]['additionalfee'][$additionalfee_count]['custom_input'] = $existing_additionalfee[$key][$additionalfee_id]['custom_input'];
					}
					
					if(!empty($existing_additionalfee[$key][$additionalfee_id]['custom_select'])) {
						$existing_booking[$key]['additionalfee'][$additionalfee_count]['custom_select'] = $existing_additionalfee[$key][$additionalfee_id]['custom_select'];
					}
					
				}
			
			}
		
		}
	
		update_post_meta(get_the_ID(),'shb_booking_data',json_encode($existing_booking));
	
		// Remove selected additional fee to prevent selection again if page is refreshed
		update_post_meta(get_the_ID(),'shb_additionalfee_selected','');
		update_post_meta(get_the_ID(),'shb_additionalfee_accommodation_selected','');
		
	}
	
}



/* --------------------------------------------------------------------------------

   Select additional fee mandatory

-------------------------------------------------------------------------------- */
function shb_select_additionalfee_mandatory($booking_data,$admin) {
	
	// Check user level
	/*if ( !current_user_can( 'edit_post', get_the_ID() )) {
		return get_the_ID();
	}*/
	
	$insert_additionalfee = array();
	
	$checkin = $booking_data['shb_checkin_alt'][0];
	$checkout = $booking_data['shb_checkout_alt'][0];
	$nights = shb_get_booking_nights($booking_data['shb_checkin_alt'][0],$booking_data['shb_checkout_alt'][0]);
	$room_id = $booking_data['shb_accommodation_selected'][0];
	$rate_id = $booking_data['shb_rate_selected'][0];
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	foreach($guestclass_ids as $guestclass_id) {
		$guests[] = $booking_data['shb_' . $guestclass_id . '_qty'][0];
	}
	
	$guests_total = array_sum($guests);
	
	$dates = shb_get_date_range_array($checkin,$checkout);
	$season = shb_get_date_season($dates);
	$additionalfee_ids = shb_get_all_ids('shb_additionalfee');
	
	foreach($additionalfee_ids as $additionalfee_id) {
		
		// Check if additional fee is optional
		if(get_post_meta($additionalfee_id,'shb_optional',TRUE) == 'no') {
			
			// Check added for selected room_id and rate_id
			if(!empty(get_post_meta($additionalfee_id,'shb_accommodation_rate_' . $room_id . '_' . $rate_id,TRUE))) {
				
				foreach($season as $date => $season_id) {
					
					// Check added for current season
					if(!empty(get_post_meta($additionalfee_id,'shb_season_' . $season_id,TRUE))) {
						
						$select_additionalfee_ids[] = $additionalfee_id;
						
					}
					
				}
				
			}
			
		}
		
	}
	
	// Calculate price
	if(!empty($select_additionalfee_ids)) {
		
		foreach($select_additionalfee_ids as $select_additionalfee_id) {
		
			$price = get_post_meta($select_additionalfee_id,'shb_price',TRUE);
		
			if(get_post_meta($select_additionalfee_id,'shb_charge',TRUE) == 'per_person') {
				$charge_price = $price * $guests_total;
			} else {
				$charge_price = $price;
			}
		
			if(get_post_meta($select_additionalfee_id,'shb_per',TRUE) == 'night') {
				$per_price = $charge_price * $nights;
			} else {
				$per_price = $charge_price;
			}
		
			$insert_additionalfee[$select_additionalfee_id] = $per_price;
		
		}
		
	}
	
	if($admin == true) {
		
		// Insert into booking
		$booking_data = get_post_meta(get_the_ID());
		$existing_booking = json_decode( $booking_data['shb_booking_data'][0], true);
	
		$room_num = count($existing_booking);
	
		foreach($insert_additionalfee as $additionalfee_id => $additionalfee_price) {
		
			$existing_booking[$room_num]['additionalfee'][] = array(
				'additionalfee_id' => $additionalfee_id,
				'price' => $additionalfee_price
			);
		
		}
	
		update_post_meta(get_the_ID(),'shb_booking_data',json_encode($existing_booking));
		
	} else {
		
		return $insert_additionalfee;
		
	}
 	
}



/* --------------------------------------------------------------------------------

   Select accommodation admin

-------------------------------------------------------------------------------- */
function shb_select_accommodation_admin($booking_data) {
	
	// Check user level
	if ( !current_user_can( 'edit_post', get_the_ID() )) {
		return get_the_ID();
	}
	
	if(!empty($booking_data['shb_accommodation_selected'][0]) && !empty($booking_data['shb_rate_selected'][0])) {
		
		// Get selected data
		$select['checkin'] = $booking_data['shb_checkin_alt'][0];
		$select['checkout'] = $booking_data['shb_checkout_alt'][0];
		
		$nights = shb_get_booking_nights($booking_data['shb_checkin_alt'][0],$booking_data['shb_checkout_alt'][0]);
		
		$select['nights'] = $nights;
		
		$select['room_id'] = $booking_data['shb_accommodation_selected'][0];
		$select['rate_id'] = $booking_data['shb_rate_selected'][0];
		
		$guestclass_ids = shb_get_all_ids('shb_guestclass');
		foreach($guestclass_ids as $guestclass_id) {
			$select['guests'][$guestclass_id] = $booking_data['shb_' . $guestclass_id . '_qty'][0];
			$guests_total[] = $booking_data['shb_' . $guestclass_id . '_qty'][0];
		}
		
		$select['guests_total'] = array_sum($guests_total);
		
		if(!empty($booking_data['shb_booking_data'][0])) {
			$existing_booking = json_decode( $booking_data['shb_booking_data'][0], true);
			array_push($existing_booking,$select);
		} else {
			$existing_booking = array(
				1 => $select
			);
		}
		
		// Do another availability check before adding the accommodation to the booking
		$shb_accommodation_booking_select = shb_accommodation_booking_select($select);
		
		if($shb_accommodation_booking_select[$select['room_id']]['rates'][$select['rate_id']]['bookable'] == 'available') {
		
			// Use room #1 dates for sorting on booking listing page
			update_post_meta(get_the_ID(),'shb_checkin_sort',$existing_booking[1]['checkin']);
			update_post_meta(get_the_ID(),'shb_checkout_sort',$existing_booking[1]['checkout']);
			update_post_meta(get_the_ID(),'shb_booking_data',json_encode($existing_booking));
					
			// If there are mandatory additional fees for the room, add them
			shb_select_additionalfee_mandatory($booking_data,true);
	
		} else {
			echo '<div class="shb-select-accommodation-unavailable"><p>' . __('Sorry the selected accommodation is unavailable','sohohotel_booking') . '</p></div>';
		}
		
		// Remove selected accommodation and rate to prevent selection again if page is refreshed
		update_post_meta(get_the_ID(),'shb_accommodation_selected','');
		update_post_meta(get_the_ID(),'shb_rate_selected','');
	
	}
	
}



/* --------------------------------------------------------------------------------

   Delete accommodation admin

-------------------------------------------------------------------------------- */
function shb_delete_accommodation_admin($booking_data) {
	
	if(!empty($_GET['shb-delete-room'])) {
		
		$existing_booking = json_decode( $booking_data['shb_booking_data'][0], true);
	
		if(!empty($existing_booking[2])) {
		
			unset($existing_booking[$_GET['shb-delete-room']]);
			$existing_booking = array_combine(range(1, count($existing_booking)), array_values($existing_booking));
		
			// Use room #1 dates for sorting on booking listing page
			update_post_meta(get_the_ID(),'shb_checkin_sort',$existing_booking[1]['checkin']);
			update_post_meta(get_the_ID(),'shb_checkout_sort',$existing_booking[1]['checkout']);
			update_post_meta(get_the_ID(),'shb_booking_data',json_encode($existing_booking));
		
		} else {
	
			update_post_meta(get_the_ID(),'shb_checkin_sort','');
			update_post_meta(get_the_ID(),'shb_checkout_sort','');
			update_post_meta(get_the_ID(),'shb_booking_data','');
		
		}
	
	}
	
}



/* --------------------------------------------------------------------------------

   Delete additional fees admin

-------------------------------------------------------------------------------- */
function shb_delete_additionalfee_admin($booking_data) {
	
	if(!empty($_GET['shb-delete-additionalfee'])) {
		
		$existing_booking = json_decode( $booking_data['shb_booking_data'][0], true);
	
		unset($existing_booking[$_GET['shb-room']]['additionalfee'][$_GET['shb-delete-additionalfee']]);
		$existing_booking = array_combine(range(1, count($existing_booking)), array_values($existing_booking));
		
		update_post_meta(get_the_ID(),'shb_booking_data',json_encode($existing_booking));
	
	}
	
}



/* --------------------------------------------------------------------------------

   Create WooCommerce product (required for checkout to work)

-------------------------------------------------------------------------------- */
function shb_create_woocommerce_product() {
	
	// Create WooCommerce product
	$woocommerce_products = get_posts('post_type=product');
	if( empty ( $woocommerce_products ) ) {
	
		$post_id = wp_insert_post(array(
		    'post_title' => 'Reservation',
		    'post_type' => 'product',
		    'post_status' => 'publish', 
		    'post_content' => ''
		));
	
	}
	
	$product_ids = shb_get_all_ids('product');
	
	foreach($product_ids as $product_id) {
		
		if(get_the_title($product_id) == 'Reservation') {
			
			if(!empty(get_option( 'shb_woocommerce_product_id'))) {
				
				if(get_option( 'shb_woocommerce_product_id') !== $product_id) {
					update_option( 'shb_woocommerce_product_id', $product_id );
				}
				
			} else {
				update_option( 'shb_woocommerce_product_id', $product_id );
			}
			
			
		}
		
	}
	
	if(!empty($product_id)) {
		update_post_meta($product_id,'_regular_price',100);
		update_post_meta($product_id,'_price',100);
	}
	
}
add_action( 'init', 'shb_create_woocommerce_product' );



/* --------------------------------------------------------------------------------

   Add booking "product" to cart automatically 

-------------------------------------------------------------------------------- */
add_action( 'template_redirect', 'shb_add_product_to_cart_automatically' );
function shb_add_product_to_cart_automatically() {
	$product_id = get_option( 'shb_woocommerce_product_id');
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
		WC()->cart->add_to_cart( $product_id );
	}
}



/* --------------------------------------------------------------------------------

   Automatically set cart price to current booking price

-------------------------------------------------------------------------------- */
add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 20, 1);
function add_custom_price( $cart ) {
	
	if(!empty($_SESSION['shb_total_price'])) {
		$total_price = $_SESSION['shb_total_price'];
	} else {
		$total_price = 0;
	}
	
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach ( $cart->get_cart() as $item ) {
        $item['data']->set_price( $total_price );
    }
	
}



/* ----------------------------------------------------------------------------

   Custom form functions

---------------------------------------------------------------------------- */
function shb_custom_form_email($data) {
	
	//$shb_custom_fields = get_option('shb_custom_fields');
	
	$shb_custom_fields = '[text required name="first_name" label="' . __('First Name','sohohotel_booking') . '" column="1/2"][text required name="last_name" label="' . __('Last Name','sohohotel_booking') . '" column="1/2"][text required class="shb-email-validation" name="email" label="' . __('Email Address','sohohotel_booking') . '" column="1/2"][text required class="shb-phone-validation" name="phone" label="' . __('Phone Number','sohohotel_booking') . '" column="1/2"]';
	
	$str = str_replace('\\',"",$shb_custom_fields);
	$fields = shb_custom_form_fields_email($str,$data);
	return $fields;

}

function shb_custom_form_fields_email($str,$data) {

	$c = 0;
	$fields = array();

	if(preg_match_all('/\[/', $str, $m1)){
	
		foreach($m1[0] as $val1){
		
			$c++;
			$e = explode("[",$str);
			$e2 = explode("]",$e[$c]);
			$ps = preg_split('/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"(*SKIP)(*F)|\h+/', $e2[0]);
		
			foreach($ps as $val2){
			
				// Type
				if ($val2 == 'text' || $val2 == 'textarea' || $val2 == 'select' || $val2 == 'radio' || $val2 == 'checkbox') {
					$fields[$c]['type'] = $val2;
				}
			
				// Required
				if ($val2 == 'required') {
					$fields[$c]['required'] = $val2;
				}
			
				// Name
				if(preg_match_all('/name="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['name'] = $m3[1];
					}
				}
			
				// Label
				if(preg_match_all('/label="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['label'] = $m3[1];
					}
				}
			
				// Column
				if(preg_match_all('/column="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['column'] = $m3[1];
					}
				}
			
				// Option
				if(preg_match_all('/option="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['option_' . $fields[$c]['name']][] = $m3[1];
					}
				}
				
			}
		
		}
	
	}
	
	$count = 0;
	
	foreach($fields as $val3){
		
		$count++;
		
		// Set value
		if ( $val3['type'] != 'checkbox' ) {
			if ( !empty($data['shb_custom_form_' . $val3['name']][0]) ) {
				$val3['value'] = $data['shb_custom_form_' . $val3['name']][0];
			} else {
				$val3['value'] = '';
			}
		}
	
		// Label
		$o[$count]['label'] = $val3['label'];
	
		// Text
		if ($val3['type'] == 'text') {
			$o[$count]['value'] = $val3['value'];
		}
	
		// Textarea
		if ($val3['type'] == 'textarea') {
			$o[$count]['value'] = $val3['value'];
		}
	
		// Select
		if ($val3['type'] == 'select') {
		
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
		
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o[$count]['value'] = $val4;
				}
				
			}
			
		} 
	
		if ($val3['type'] == 'radio') {
		
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
	
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o[$count]['value'] = $val4;
				}
	
			}

		}
	
		// Checkbox
		if ($val3['type'] == 'checkbox') {
	
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
			
				if ( !empty($data['shb_custom_form_' . $val3['name'] . '_' . $key][0]) ) {
					$val3['value'] = $data['shb_custom_form_' . $val3['name'] . '_' . $key][0];
				} else {
					$val3['value'] = '';
				}
			
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o[$count]['value'] = $val4;
				}
			
			}
	
		}
	
	}
	
	return $o;

}

function shb_custom_form_field_names_email() {

	$str = str_replace('\\',"",get_option('shb_custom_fields'));

	$c = 0;
	$o = array();
	$fields = array();

	if(preg_match_all('/\[/', $str, $m1)){
	
		foreach($m1[0] as $val1){
		
			$c++;
			$e = explode("[",$str);
			$e2 = explode("]",$e[$c]);
			$ps = preg_split('/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"(*SKIP)(*F)|\h+/', $e2[0]);
		
			foreach($ps as $val2){
			
				// Type
				if ($val2 == 'text' || $val2 == 'textarea' || $val2 == 'select' || $val2 == 'radio' || $val2 == 'checkbox') {
					$fields[$c]['type'] = $val2;
				}
			
				// Required
				if ($val2 == 'required') {
					$fields[$c]['required'] = $val2;
				}
			
				// Name
				if(preg_match_all('/name="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['name'] = $m3[1];
					}
				}
			
				// Label
				if(preg_match_all('/label="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['label'] = $m3[1];
					}
				}
			
				// Column
				if(preg_match_all('/column="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['column'] = $m3[1];
					}
				}
			
				// Option
				if(preg_match_all('/option="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['option_' . $fields[$c]['name']][] = $m3[1];
					}
				}
				
			}
		
		}
	
	}

	foreach($fields as $val3){
	
		if ($val3['type'] == 'checkbox') {
	
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
			
				$o['fields'][]['id'] = 'custom_form_' . $val3['name'] . '_' . $key;
			
			}
		
		} else {
		
			$o['fields'][]['id'] = 'custom_form_' . $val3['name'];
		
		}
	
	}

	return $o;

}



/* ----------------------------------------------------------------------------

   Add new booking

---------------------------------------------------------------------------- */
function shb_add_new_booking($data) {
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	//$data['status'] = 'shb_ical';
	//$data['woocommerce_id] = '123';
	//$data['woocommerce_price] = '100';

	//$data['booking_data'][1]['checkin'] = '2021-01-01';
	//$data['booking_data'][1]['checkout'] = '2021-01-05';
	//$data['booking_data'][1]['nights'] = 4;
	//$data['booking_data'][1]['room_id'] = 528;
	//$data['booking_data'][1]['rate_id'] = 547;
	//$data['booking_data'][1]['guests'][503] = 2;
	//$data['booking_data'][1]['guests'][504] = 1;
	//$data['booking_data'][1]['guests_total'] = 3;
	//$data['booking_data'][1]['additionalfee'][1]['additionalfee_id'] = 577;
	//$data['booking_data'][1]['additionalfee'][1]['price'] = 100;
	
	//$data['custom_form']['shb_custom_form_first_name'] = 'Bob';
	//$data['custom_form']['shb_custom_form_last_name'] = 'Jones';
	
	$booking_data = json_encode($data['booking_data']);
	
	if(!empty($data['custom_form']['shb_custom_form_first_name']) && !empty($data['custom_form']['shb_custom_form_last_name'])) {
		$title = $data['custom_form']['shb_custom_form_first_name'] . ' ' . $data['custom_form']['shb_custom_form_last_name'];
	} else {
		$title = '';
	}
	
	// Add new post
	$post_id = wp_insert_post(array (
	   'post_type' => 'shb_booking',
	   'post_title' => $title,
	   'post_content' => '',
	   'post_status' => $data['status'],
	   'comment_status' => 'closed',
	   'ping_status' => 'closed',
	));

	if ($post_id) {
		
		if(!empty($_SESSION['sht_language']['selected_language'])) {
			add_post_meta($post_id, 'shb_booking_language', $_SESSION['sht_language']['selected_language'], true);
		}
		
		if(!empty($data['booking_data'][1]['checkin'])) {
			add_post_meta($post_id, 'shb_checkin', shb_get_date($data['booking_data'][1]['checkin']), true);
			add_post_meta($post_id, 'shb_checkin_alt', $data['booking_data'][1]['checkin'], true);
			add_post_meta($post_id, 'shb_checkin_sort', $data['booking_data'][1]['checkin'], true);
		}
		
		if(!empty($data['booking_data'][1]['checkout'])) {
			add_post_meta($post_id, 'shb_checkout', shb_get_date($data['booking_data'][1]['checkout']), true);
			add_post_meta($post_id, 'shb_checkout_alt', $data['booking_data'][1]['checkout'], true);
			add_post_meta($post_id, 'shb_checkout_sort', $data['booking_data'][1]['checkout'], true);
		}
		
		foreach($guestclass_ids as $guestclass_id) {
			
			if(!empty($data['booking_data'][1]['guests'][$guestclass_id])) {
				add_post_meta($post_id, 'shb_' . $guestclass_id . '_qty', $data['booking_data'][1]['guests'][$guestclass_id], true);
			}
			
		}
		
		if(!empty($booking_data)) {
			add_post_meta($post_id, 'shb_booking_data', $booking_data, true);
		}
		
		if(!empty($data['custom_form']['shb_custom_form_first_name'])) {
			add_post_meta($post_id, 'shb_custom_form_first_name', $data['custom_form']['shb_custom_form_first_name'], true);
		}
		
		if(!empty($data['custom_form']['shb_custom_form_last_name'])) {
			add_post_meta($post_id, 'shb_custom_form_last_name', $data['custom_form']['shb_custom_form_last_name'], true);
		}
		
		if(!empty($data['custom_form']['shb_custom_form_email'])) {
			add_post_meta($post_id, 'shb_custom_form_email', $data['custom_form']['shb_custom_form_email'], true);
		}
		
		if(!empty($data['custom_form']['shb_custom_form_phone'])) {
			add_post_meta($post_id, 'shb_custom_form_phone', $data['custom_form']['shb_custom_form_phone'], true);
		}
		
		if(!empty($data['ical_summary'])) {
			add_post_meta($post_id, 'shb_ical_summary', $data['ical_summary'], true);
		}
		
		if(!empty($data['ical_url'])) {
			add_post_meta($post_id, 'shb_ical_url', $data['ical_url'], true);
		}
		
		if(!empty($data['woocommerce_id'])) {
			add_post_meta($post_id, 'shb_woocommerce_id', $data['woocommerce_id'], true);
		}
		
		if(!empty($data['woocommerce_translated_id'])) {
			add_post_meta($post_id, 'shb_woocommerce_translated_id', $data['woocommerce_translated_id'], true);
		}
		
		if(!empty($data['woocommerce_translated_id_site'])) {
			add_post_meta($post_id, 'shb_woocommerce_translated_id_site', $data['woocommerce_translated_id_site'], true);
		}
		
		if(!empty($data['woocommerce_price'])) {
			add_post_meta($post_id, 'shb_woocommerce_price', $data['woocommerce_price'], true);
		}
		
	}
	
	return $post_id;

}



/* ----------------------------------------------------------------------------

   Send booking email

---------------------------------------------------------------------------- */
function shb_send_booking_email($booking_id,$type,$recipient) {
	
	$blog_name = str_replace("&amp;","&",get_bloginfo('name'));
	
	$current_blog_id = get_current_blog_id();
	
	$to_name = '{recipient_name},';
	
	if(!empty(get_option('shb_email_address'))) {
		$from = get_option('shb_email_address');
	} else {
		$from = '';
	}
	
	if($type == 'booking_pending') {
		$body_title = __('Booking Pending','sohohotel_booking');
		$body_message_1 = get_option('shb_pending_message_1');
		$body_message_2 = get_option('shb_pending_message_2');
	} elseif($type == 'booking_confirmed') {
		$body_title = __('Booking Confirmation','sohohotel_booking');
		$body_message_1 = get_option('shb_confirmed_message_1');
		$body_message_2 = get_option('shb_confirmed_message_2');
	} elseif($type == 'booking_cancelled') {
		$body_title = __('Booking Cancellation','sohohotel_booking');
		$body_message_1 = get_option('shb_cancelled_message_1');
		$body_message_2 = get_option('shb_cancelled_message_2');
	}
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
		switch_to_blog(1);
		$booking_data = get_post_meta($booking_id);
		$post_object = get_post($booking_id);
		switch_to_blog($current_blog_id);
	} else {
		$booking_data = get_post_meta($booking_id);
		$post_object = get_post($booking_id);
	}
	
	if(!empty($booking_data['shb_custom_form_first_name'])) {
		$fname = $booking_data['shb_custom_form_first_name'][0];
	}
	
	if(!empty($booking_data['shb_custom_form_last_name'])) {
		$lname = $booking_data['shb_custom_form_last_name'][0];
	}
	
	if($recipient == 'admin') {
		$to_name = str_replace('{recipient_name}',$blog_name,$to_name);
		$to = $from;
	} else {
		$to_name = str_replace('{recipient_name}',$fname . ' ' . $lname,$to_name);
		$to = $booking_data['shb_custom_form_email'][0];
	}
	
	if(function_exists('shb_translate_booking_data')){
	   
		$summary_data_encoded_full['shb_booking_data'][0] = shb_translate_booking_data($booking_id);
		$shb_get_booking_summary = shb_get_booking_summary($summary_data_encoded_full);
		
	} else {
		
		$summary_data_encoded_full['shb_booking_data'][0] = get_post_meta($booking_id,'shb_booking_data',TRUE);
		$shb_get_booking_summary = shb_get_booking_summary($summary_data_encoded_full);
		
	}
	
	$shb_custom_form_email = shb_custom_form_email($booking_data);

	$from_name = $blog_name;
	$subject = $blog_name . ' ' . $body_title;
	
	$booking_date = date( shb_alt_date_format(), strtotime( $post_object->post_date ) );
	
	if(!empty(get_theme_mod('sohohotel_main_color'))) {
		$main_color = get_theme_mod('sohohotel_main_color');
	} else {
		$main_color = '#b99470';
	}
	
	$body = '<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet"> 
		
		<body bgcolor="#eeeeee" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		
		<div style="background: #fff;font-family: \'Work Sans\', sans-serif; font-weight: 400; font-size: 15px; max-width: 600px; margin: 70px auto;-moz-box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.09);-webkit-box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.09);box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.1);">
	
	<div style="background: ' . $main_color . ' ; padding: 40px;">
		<h2 style="font-size: 26px; color: #fff; font-weight: 400;">' . $body_title . '</h2>
	</div>
	
	<div style="padding: 40px;">
		
		<p style="margin: 0 0 30px 0; color: #656a70;line-height: 160%;">' . $to_name . '<br /><br /> ' . $body_message_1 . '</p>
		
		<p style="color: ' . $main_color . ' ;"><u>' . __('Booking','sohohotel_booking') . ' #' . $booking_id . '</u> (' . $booking_date . ')</p>
		
		 <table style="border: #dddddd 2px solid; width: 100%; border-collapse: collapse; color: #656a70;font-size: 15px; margin: 0 0 45px 0;line-height: 160%;">
			 <tr>
				 <td style="border-bottom: #dddddd 2px solid;border-right: #dddddd 2px solid;padding: 10px;color: #181b20;">' . __('Item','sohohotel_booking') . '</td>
				 <td style="border-bottom: #dddddd 2px solid;padding: 10px;color: #181b20;">' . __('Price','sohohotel_booking') . '</td>
			 </tr>';
			 
			 foreach($shb_get_booking_summary['items'] as $key => $val) {
				 
				 $body .= '<tr>';
				 $body .= '<td style="border-bottom: #dddddd 2px solid;border-right: #dddddd 2px solid;padding: 10px;"><span style="color: #181b20;">' . __('Room','sohohotel_booking') . ':</span> ' . $val['room_title'] . '<br /><span style="color: #181b20;">' . __('Rate','sohohotel_booking') . ':</span> ' . $val['rate_title'] . '<br /><span style="color: #181b20;">' . __('Guests','sohohotel_booking') . ':</span> ' . $val['guests'] . '<br /><span style="color: #181b20;">' . __('Check In','sohohotel_booking') . ':</span> ' . shb_get_date($val['checkin']) . '<br /><span style="color: #181b20;">' . __('Check Out','sohohotel_booking') . ':</span> ' . shb_get_date($val['checkout']) . '</td>';
				 $body .= '<td style="border-bottom: #dddddd 2px solid;padding: 10px;">' . shb_get_price($val['price']) . '</td>';
				 $body .= '</tr>';
				 
				 if(!empty($val['additionalfee'])) {
				 	
					 foreach($val['additionalfee'] as $fee_key => $fee_val) {
				 	
						$body .= '<tr>';
						$body .= '<td style="border-bottom: #dddddd 2px solid;border-right: #dddddd 2px solid;padding: 10px;">';
					
						$body .= '<span style="color: #181b20;">' . __('Fee','sohohotel_booking') . ':</span> ' . $fee_val['title'];
					
						if(!empty($fee_val['qty'])) {
							$body .= '<br /><span style="color: #181b20;">' . __('Quantity','sohohotel_booking') . ': </span>' . $fee_val['qty'];
						}
					
						if(!empty($fee_val['time'])) {
							$body .= '<br /><span style="color: #181b20;">' . __('Time','sohohotel_booking') . ': </span>' . $fee_val['time'];
						}
					
						if(!empty($fee_val['date'])) {
							$body .= '<br /><span style="color: #181b20;">' . __('Date','sohohotel_booking') . ': </span>' . $fee_val['date'];
						}
						
						if(!empty($fee_val['custom_input'])) {
							$body .= '<br /><span style="color: #181b20;">' . $fee_val['custom_input_name'] . ': </span>' . $fee_val['custom_input'];
						}
						
						if(!empty($fee_val['custom_select'])) {
							$body .= '<br /><span style="color: #181b20;">' . $fee_val['custom_select_name'] . ': </span>' . $fee_val['custom_select'];
						}
						 
						$body .= '</td>';
						$body .= '<td style="border-bottom: #dddddd 2px solid;padding: 10px;">' . shb_get_price($fee_val['price']) . '</td>';
						$body .= '</tr>';
					
					 }
					
				 }
				
			 }
			 
			$body .= '<tr>
				 <td style="border-right: #dddddd 2px solid;padding: 10px;color: #181b20;">' . __('Total','sohohotel_booking') . '</td>
				 <td style="padding: 10px;">' . shb_get_price($shb_get_booking_summary['total_price']) . '</td>
			 </tr>
		 </table>';
		 
		 $body .= '<p style="color: ' . $main_color . ' ;">' . __('Guest Information','sohohotel_booking') . '</p>
		 
		 <table style="border: #dddddd 2px solid; width: 100%; border-collapse: collapse;color: #656a70;font-size: 15px; margin: 0 0 45px 0;line-height: 160%;">';
		 
		 foreach($shb_custom_form_email as $form_val) {
		 	
			 if(!empty($form_val['value'])) {
				 $body .= '<tr>
					 <td style="padding: 10px;"><span style="color: #181b20;">' . $form_val['label'] . ':</span> ' . $form_val['value'] . '</td>
				 </tr>';
			 }
			 
		 }
		 
		 $body .= '</table>
		 
		 <p style="color: #656a70;line-height: 160%;">' . $body_message_2 . '</p>
		
	</div>
	
</div>

</body>';
	
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=UTF-8\r\n";
	$header .= "From: " . $from_name . " <" . $from . ">" . "\r\n" . "Reply-To: " . $from;
	
	wp_mail($to,$subject,$body,$header);
	
}



/* ----------------------------------------------------------------------------

   Return date only if it is booked for all accommodation

---------------------------------------------------------------------------- */
function shb_get_blocked_dates_all_array_check($arrays) {
	
	$o = array();
	
    $dates = array_shift($arrays);
    
    foreach ($dates as $date => $value) {
        $dateExistsInAllArrays = true;
        
        foreach ($arrays as $array) {
            if (!isset($array[$date])) {
                $dateExistsInAllArrays = false;
                break;
            }
        }
        
        if ($dateExistsInAllArrays) {
            $o[$date] = $date;
        }
    }
	
	return $o;
	
}



/* ----------------------------------------------------------------------------

   Get blocked dates all

---------------------------------------------------------------------------- */
function shb_get_blocked_dates_all() {
	
	$dates = array();
	
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	
	foreach($accommodation_ids as $id) {
		
		$dates[] = shb_get_blocked_dates($id);
		
	}
	
	$blocked_dates_all = shb_get_blocked_dates_all_array_check($dates);
	
	return $blocked_dates_all;

}



/* ----------------------------------------------------------------------------

   Get blocked dates

---------------------------------------------------------------------------- */
function shb_get_blocked_dates($accommodation_id_check) {
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
		
		$current_blog_id = get_current_blog_id();
		$current_base_language = sh_get_languages('base_language',get_current_blog_id());
		$main_base_language = sh_get_languages('base_language',1);
	
		switch_to_blog(1);
		
		$shb_post_translations = json_decode( get_option('shb_post_translations'), true );
		$accommodation_ids_base_language = shb_get_all_ids('shb_accommodation');
		
		
		foreach($accommodation_ids_base_language as $accommodation_id) {
			
			if($accommodation_id_check == array_key_first($shb_post_translations[$main_base_language['id']][$accommodation_id][$current_base_language['id']])) {
				$accommodation_id_check = $accommodation_id;
			}
			
		}
		
	}
	
	$blocked_dates_output = '';
	
	// Get accommodation original quantity
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	foreach($accommodation_ids as $accommodation_id) {
	
		if(get_post_meta($accommodation_id,'shb_accommodation_type',TRUE) == 'shared-dorm') {
			$accommodation_original_qty[$accommodation_id] = (get_post_meta($accommodation_id,'shb_qty',TRUE) * get_post_meta($accommodation_id,'shb_total_max',TRUE));
		} else {
			$accommodation_original_qty[$accommodation_id] = get_post_meta($accommodation_id,'shb_qty',TRUE);
		}
	
	}
	
	// Get booking data
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$data['checkin'] = date('Y-m-d');
	$data['checkout'] = date('Y-m-d', strtotime('+1 year'));
	
	foreach($guestclass_ids as $guestclass_id) {
		$data['guests'][$guestclass_id] = 0;
	}

	$shb_get_accommodation_availability = shb_get_accommodation_availability($data,2);
	
	// Build new array with blocked dates
	$blocked_dates = array();
	
	foreach($shb_get_accommodation_availability as $room_id => $booking) {
		
		foreach($booking as $date => $booking_qty) {
			
			if($booking_qty == 'unavailable') {
				$blocked_dates_specific_accommodation[$room_id][$date] = $date;
				$blocked_dates_all_accommodation[] = $date;
			}
			
		}
		
	}
	
	// Check if dates are blocked for all accommodation
	$count = array();
	
	if(!empty($blocked_dates_all_accommodation)) {
		foreach($blocked_dates_all_accommodation as $key => $val) {
		
			if(empty($count[$val])) {
				$count[$val] = 1;
			} else {
				$count[$val] = $count[$val] + 1;
			}
		
		}
	}
	
	$blocked_dates = array();
	$accommodation_total = count($accommodation_ids);
	
	foreach($count as $date => $qty) {
		
		if($qty > $accommodation_total) {
			
			$blocked_dates[] = $date;
			
		}
		
	}
	
	// Output blocked dates array for specific accommodation
	if( (!empty($accommodation_id_check)) && (!empty($blocked_dates_specific_accommodation)) ) {
		
		if(!empty($blocked_dates_specific_accommodation[$accommodation_id_check])) {
			$blocked_dates_output = $blocked_dates_specific_accommodation[$accommodation_id_check];
		}
	
	// Or all accommodation 
	} else {
		$blocked_dates_output = $blocked_dates;
	}
	
	if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
		switch_to_blog($current_blog_id);
	}
	
	return $blocked_dates_output;
	
}



/* ----------------------------------------------------------------------------

   Guest class qty label

---------------------------------------------------------------------------- */
function shb_guestclass_qty_label($data) {
	
	$guests = '';
	
	$c = count($data);
	$i = 0;
	
	foreach($data as $guestclass_id => $guestclass_qty) {
		
		$i++;
		
		$plural = get_post_meta($guestclass_id,'shb_guestclass_title_plural',TRUE);
		$singular = get_the_title($guestclass_id);
		
		if($guestclass_qty == 1) {
			$guestclass_label = $singular;
		} else {
			$guestclass_label = $plural;
		}
		
		if($i == $c) {
			$guests .= $guestclass_qty . ' ' . $guestclass_label;
		} else {
			$guests .= $guestclass_qty . ' ' . $guestclass_label . ', ';
		}
		
	}
	
	return $guests;
	
}



/* ----------------------------------------------------------------------------

   Guest class qty label session

---------------------------------------------------------------------------- */
function shb_guestclass_qty_label_session() {
	
	$guests = '';
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$shb_get_guestclass_session = shb_get_guestclass_session();
	
	$c = count($guestclass_ids);
	$i = 0;
	
	foreach($guestclass_ids as $guestclass_id) {
		
		$i++;
		
		$plural = get_post_meta($guestclass_id,'shb_guestclass_title_plural',TRUE);
		$singular = get_the_title($guestclass_id);
		
		$guest_qty = $shb_get_guestclass_session['guest_qty'][$guestclass_id];
		
		if($guest_qty == 1) {
			$guestclass_label = $singular;
		} else {
			$guestclass_label = $plural;
		}
		
		if($i == $c) {
			$guests .= $guest_qty . ' ' . $guestclass_label;	
		} else {
			$guests .= $guest_qty . ' ' . $guestclass_label . ', ';
		}
		
	}
	
	return $guests;
	
}



/* ----------------------------------------------------------------------------

   Guest class session

---------------------------------------------------------------------------- */
function shb_get_guestclass_session() {
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	foreach($guestclass_ids as $guestclass_id) {
		$o['guest_qty'][$guestclass_id] = $_SESSION['shb_guestclass_' . $guestclass_id];
	}

	$o['total_guests'] = array_sum($o['guest_qty']);
	
	return $o;
	
}



/* ----------------------------------------------------------------------------

   Calculate percentage

---------------------------------------------------------------------------- */
function shb_calc_percentage($percentage,$total) {

	return ($percentage / 100) * $total;
	
}



/* ----------------------------------------------------------------------------

   Get alternative date format

---------------------------------------------------------------------------- */
function shb_alt_date_format() {

	if(empty(get_option('shb_alt_date_format'))) {
		$dateformat = "M d, Y";
	} else {
		$dateformat = get_option('shb_alt_date_format');
	}

	return $dateformat;
	
}



/* ----------------------------------------------------------------------------

   Get booking step number

---------------------------------------------------------------------------- */
function shb_get_booking_step_class() {
	
	if(!empty($_GET['shb-step'])) {
		
		if($_GET['shb-step'] == 1) {
			$booking_step = 1;
		} elseif($_GET['shb-step'] == 2) {
			$booking_step = 2;
		} elseif($_GET['shb-step'] == 3) {
			$booking_step = 3;
		} elseif($_GET['shb-step'] == 4) {
			$booking_step = 4;
		} else {
			$booking_step = 1;
		}
		
	} else {
		$booking_step = 1;
	}
	
	return 'shb-booking-step-num-' . $booking_step;
	
}



/* ----------------------------------------------------------------------------

   Accommodation single guest quantity in form

---------------------------------------------------------------------------- */
function shb_get_booking_form_single_guest_qty($accommodation_id) {
	
	$guest_qty = array();
	$guestclass_ids = shb_get_all_ids('shb_guestclass');

	foreach($guestclass_ids as $guestclass_id) {
		$guest_qty['guests'][$guestclass_id]['min'] = get_post_meta($accommodation_id,'shb_' . $guestclass_id . '_min',TRUE);
		$guest_qty['guests'][$guestclass_id]['max'] = get_post_meta($accommodation_id,'shb_' . $guestclass_id . '_max',TRUE);
	}
	
	$guest_qty['total']['min'] = get_post_meta($accommodation_id,'shb_total_min',TRUE);
	$guest_qty['total']['max'] = get_post_meta($accommodation_id,'shb_total_max',TRUE);
	
	return $guest_qty;
	
}



/* ----------------------------------------------------------------------------

   Customize WooCommerce "Place Order" button text

---------------------------------------------------------------------------- */
function shb_place_order_button_text( $button_text ) {
    $button_text = __('Book Now','sohohotel_booking');
    return $button_text;
}
add_filter( 'woocommerce_order_button_text', 'shb_place_order_button_text' );