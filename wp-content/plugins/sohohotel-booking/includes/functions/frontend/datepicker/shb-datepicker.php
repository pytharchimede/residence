<?php
	
function shbdp($shbdp_settings) {
	
	if(!empty($shbdp_settings['show_year_qty'])) {
		$show_year_qty = $shbdp_settings['show_year_qty'];
	} else {
		$show_year_qty = 3;
	}
	
	if(!empty($shbdp_settings['blocked_dates'])) {
		$data['blocked_dates'] = $shbdp_settings['blocked_dates'];
	} else {
		$data['blocked_dates'] = array();
	}
	
	if(!empty($shbdp_settings['datepicker_first_day'])) {
		$data['datepicker_first_day'] = $shbdp_settings['datepicker_first_day'];
	} else {
		$data['datepicker_first_day'] = 0;
	}

	if(!empty($shbdp_settings['checkin'])) {
		$checkin = $shbdp_settings['checkin'];
	} else {
		$checkin = '';
	}
	
	if(!empty($shbdp_settings['checkout'])) {
		$checkout = $shbdp_settings['checkout'];
	} else {
		$checkout = '';
	}

	if(!empty($shbdp_settings['panels'])) {
		$datepicker_panels = $shbdp_settings['panels'];
	} else {
		$datepicker_panels = 2;
	}
	
	$current_year = date("Y");
	$current_month = date("m");
	$end_year = $current_year + $show_year_qty;
	
	$o = '';
	
	foreach (range($current_year, $end_year) as $year) {
		
		foreach (range(1, 12) as $month) {
			
			if( ( ($year == $current_year) && ($current_month <= $month) ) || ( ($year != $current_year) && ($year != $end_year) ) || ( ($year == $end_year) && ($month < $current_month) ) )  {
				$calendar_array[$year][$month] = $month;
			}
			
		}
		
	}
	
	$o .= '<div class="shbdp-cal-wrapper shbdp-clearfix" data-panels="' . $datepicker_panels . '">';
	$o .= '<a href="#" class="shbdp-nav-prev"><i class="fas fa-chevron-left"></i></a>';
	$o .= '<a href="#" class="shbdp-nav-next"><i class="fas fa-chevron-right"></i></a>';
	$o .= '<div class="shbdp-clearboth"></div>';	
	$o .= '<div class="shbdp-cal">';

	foreach($calendar_array as $year => $month_data) {
		
		foreach($month_data as $month) {
			
			$o .= shbdp_calendar($year,$month,$data);
			
		}
		
	}
	
	$o .= '</div>';
	$o .= '<input type="hidden" class="shbdp-checkin" name="shbdp-checkin" value="' . $checkin . '" />';
	$o .= '<input type="hidden" class="shbdp-checkout" name="shbdp-checkout" value="' . $checkout . '" />';
	$o .= '<input type="hidden" class="shbdp-min" value="" />';
	$o .= '<input type="hidden" class="shbdp-max" value="" />';
	$o .= '</div>';
	
	return $o;
	
}

function shbdp_calendar($year,$month,$data) {
	
	$months = array(
		1 => __('January','sohohotel_booking'),
		2 => __('February','sohohotel_booking'),
		3 => __('March','sohohotel_booking'),
		4 => __('April','sohohotel_booking'),
		5 => __('May','sohohotel_booking'),
		6 => __('June','sohohotel_booking'),
		7 => __('July','sohohotel_booking'),
		8 => __('August','sohohotel_booking'),
		9 => __('September','sohohotel_booking'),
		10 => __('October','sohohotel_booking'),
		11 => __('November','sohohotel_booking'),
		12 => __('December','sohohotel_booking')
	);
	
	$days = array(
		1 => __('Mo','sohohotel_booking'),
		2 => __('Tu','sohohotel_booking'),
		3 => __('We','sohohotel_booking'),
		4 => __('Th','sohohotel_booking'),
		5 => __('Fr','sohohotel_booking'),
		6 => __('Sa','sohohotel_booking'),
		7 => __('Su','sohohotel_booking'),
	);
	
	$month_first_day = date('N',strtotime($year . '-' . $month . '-01'));
	$month_day_qty = date('t',strtotime($year . '-' . $month . '-01'));
	$month_dates = shb_get_date_range_array($year . '-' . sprintf("%02d", $month) . '-01',$year . '-' . sprintf("%02d", $month) . '-' . sprintf("%02d", $month_day_qty));

	foreach (range(1, $month_first_day) as $r) {
			
		if($month_first_day == $r) {
			break;
		} else {
			array_unshift($month_dates , '');
		}
			
	}
	
	$i = 0;
	$i2 = 0;
	
	foreach($month_dates as $key => $date) {
		
		if ($i % 7 == 0) {
			$i2++;
		}
		
		$i++;
		
		$month_dates_formatted[$i2][$i] = $date;
		
	}
	
	// Insert blank values empty date fields so that all rows have 7 columns
	foreach($month_dates_formatted as $key1 => $val1) {
		$count = count($val1);
		if($count < 7) {
			$insert = 7 - $count;
			foreach (range(1, $insert) as $r) {
				$month_dates_formatted[$key1][] = '';
			}
		}
	}
	
	$o = '';
	
	$o .= '<div class="shbdp-item">';
	$o .= '<div class="shbdp-month-title">' . $months[$month] . ' ' . $year . '</div>';
	
	$o .= '<table>';
	
	$o .= '<tr>';
	
	foreach($days as $day) {
		$o .= '<td>' . $day . '</td>';	
	}
	
	$o .= '</tr>';
	
	foreach($month_dates_formatted as $key1 => $val1) {
		
		$o .= '<tr>';
		
		foreach($val1 as $key2 => $val2) {
			
			if(!empty($val2)) {
				
				$class = '';
				
				// Disable dates which are in the past
				if($val2 < date('Y-m-d')) {
					
					$class .= 'shbdp-cal-disabled ';
					
				} else {
					
					// The date is available and selectable
					if(!in_array($val2,$data['blocked_dates'])) {
						$class .= 'shbdp-cal-available ';
					}
					
				}
				
				// Disable dates which are booked
				if(in_array($val2,$data['blocked_dates'])) {
					
					$class .= 'shbdp-cal-unavailable ';
					
					// If previous date is available, it is possible to select a blocked date for check out
					$previous_date = date( 'Y-m-d', strtotime( $val2 . ' -1 day' ) );
					if( !in_array($previous_date,$data['blocked_dates']) ) {
						$class .= 'shbdp-cal-available-checkout-only ';
					}
					
				}
				
				$o .= '<td data-date="' . $val2 . '" class="shbdp-datepicker-date ' . $class . '">' . date('j',strtotime($val2)) . '</td>';
			} else {
				$o .= '<td></td>';
			}
			
		}
		
		$o .= '</tr>';
		
	}
	
	$o .= '</table>';
	$o .= '</div>';
	
	return $o;
	
}
	
?>