<?php

function shb_booking_calendar_data($month,$year) {
	
	$overlap = '';
	
	// Set accommodation total quantity
	$month_day_qty = date('t',strtotime($year . '-' . $month . '-01'));
	$month_dates = shb_get_date_range_array($year . '-' . sprintf("%02d", $month) . '-01',$year . '-' . sprintf("%02d", $month) . '-' . sprintf("%02d", $month_day_qty));
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	
	foreach($accommodation_ids as $accommodation_id) {
		
		if(get_post_meta($accommodation_id,'shb_accommodation_type',TRUE) == 'shared-dorm') {
			$o['accommodation'][$accommodation_id]['total'] = (get_post_meta($accommodation_id,'shb_qty',TRUE) * get_post_meta($accommodation_id,'shb_total_max',TRUE));
		} else {
			$o['accommodation'][$accommodation_id]['total'] = get_post_meta($accommodation_id,'shb_qty',TRUE);
		}
		
	}
	
	// Set accommodation availability
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	$data['checkin'] = $year . '-' . sprintf("%02d", $month) . '-01';
	$data['checkout'] = $year . '-' . sprintf("%02d", $month) . '-' . $month_day_qty;
	
	foreach($guestclass_ids as $guestclass_id) {
		$data['guests'][$guestclass_id] = 0;
	}

	$shb_get_accommodation_availability = shb_get_accommodation_availability($data,2);
	
	foreach($shb_get_accommodation_availability as $accommodation_id => $accommodation_dates) {
		
		foreach($accommodation_dates as $accommodation_date => $accommodation_qty) {
			$o['availability'][$accommodation_date][$accommodation_id] = $accommodation_qty;
		}
		
	}
	
	// Set booking query post status to select
	$post_status_arr = array('shb_pending','shb_confirmed','shb_cancelled','shb_ical','shb_maintenance');
	
	if(!empty($_GET['shb_status'])) {
		
		foreach($post_status_arr as $val) {
			
			if($_GET['shb_status'] == $val) {
				$post_status = array($val);	
				break;
			} else {
				$post_status = array('shb_pending','shb_confirmed','shb_cancelled','shb_ical','shb_maintenance');
			}
			
		}
		
	} else {
		$post_status = array('shb_pending','shb_confirmed','shb_cancelled','shb_ical','shb_maintenance');
	}
	
	// Get booking data
	$booking_ids_query = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'shb_booking',
		'post_status' => $post_status
	));
	
	$booking_array = array();
	
	foreach($booking_ids_query as $booking_id) {
		
		$booking_details = json_decode( get_post_meta($booking_id,'shb_booking_data',TRUE), true);
		$first_name = get_post_meta($booking_id,'shb_custom_form_first_name',TRUE);
		$last_name = get_post_meta($booking_id,'shb_custom_form_last_name',TRUE);
		
		foreach($booking_details as $room_key => $room_data) {
			
			$ci1 = $room_data['checkin'];
			$co1 = $room_data['checkout'];
			$ci2 = $year . '-' . sprintf("%02d", $month) . '-01';
			$co2 = $year . '-' . sprintf("%02d", $month) . '-' . $month_day_qty;
			
			if( shb_get_date_range_overlap($ci1,$co1,$ci2,$co2) == true) {
				
				$booking_array[$room_data['room_id']][] = array(
					'booking_id' => $booking_id,
					'checkin' => $room_data['checkin'],
					'checkout' => $room_data['checkout'],
					'key' => $booking_id . '-' . $room_data['room_id'] . '-' . $room_key . '-' . $room_data['checkin'] . '-' . $room_data['checkout'],
					'guest_name' => $first_name . ' ' . $last_name
				);
				
			}
			
		}
			
	}
	
	// Sort booking data by check in date
	foreach($booking_array as $key => $val) {
		usort($booking_array[$key], function($a, $b) {
			return strtotime($a['checkin']) - strtotime($b['checkin']);
		});
	}
	
	// Set calendar grid array
	foreach($accommodation_ids as $accommodation_id) {
		
		foreach (range(1, $o['accommodation'][$accommodation_id]['total']) as $r) {
			
			foreach($month_dates as $date) {
				$calendar_grid[$accommodation_id][$r][$date][1] = '';
				$calendar_grid[$accommodation_id][$r][$date][2] = '';
			}	
			
		}
		
	}
	
	// Add booking data to calendar grid array
	$added = array();
	
	foreach($calendar_grid as $key1 => $val1) {
		
		foreach($val1 as $key2 => $val2) {
			
			foreach($val2 as $key3 => $val3) {
					
				foreach($booking_array as $key4 => $val4) {
	
					foreach($val4 as $key5 => $val5) {
							
						if (!in_array($val5['key'], $added)) {
							
							$checkin = $val5['checkin'];
							$checkin_month = date('m',strtotime($val5['checkin']));
							$checkin_year = date('Y',strtotime($val5['checkin']));
							$ciym = $checkin_year . '-' . $checkin_month;
							$ym = $year . '-' . sprintf("%02d", $month);
							$coymd = $val5['checkout'];
							$fymd = $ym . '-01';
								
							if( ($ciym !== $ym) && ($coymd == $fymd) ) {
								$date_slot = 1;
								$checkout = $val5['checkout'];
								$multi_date_slot = false;
							} else {
								
								if( ($ciym !== $ym) ) {
									$multi_date_slot = true;
								} else {
									$multi_date_slot = false;
								}
								
								$date_slot = 2;
								$checkout = date( 'Y-m-d', strtotime( $val5['checkout'] . ' -1 day' ) );
								
							}
							
							$booking_dates = shb_get_date_range_array($checkin,$checkout);
							
							foreach($booking_dates as $booking_date) {
								
								if(!empty($calendar_grid[$key4][$key2][$booking_date][$date_slot])) {
									
									$overlap = true;
									break;
									
								} else {
									
									$overlap = false;
									
								}
							
							}
							
							if($overlap == false) {
								
								foreach($booking_dates as $booking_date) {
									
									if($multi_date_slot == true) {
										
										$calendar_grid[$key4][$key2][$booking_date][1] = array(
											'key' => $val5['key'],
											'checkin' => $val5['checkin'],
											'checkout' => $val5['checkout'],
											'booking_id' => $val5['booking_id'],
											'guest_name' => $val5['guest_name'],
										);
										
									}
									
									$calendar_grid[$key4][$key2][$booking_date][$date_slot] = array(
										'key' => $val5['key'],
										'checkin' => $val5['checkin'],
										'checkout' => $val5['checkout'],
										'booking_id' => $val5['booking_id'],
										'guest_name' => $val5['guest_name'],
									);
								
									$added[] = $val5['key'];
								
								}
								
							}
							
							$overlap = false;
							
						}
							
					}
						
				}
					
			}
			
		}
		
	}
	
	// Format calendar grid array
	foreach($calendar_grid as $key1 => $val1) {
		
		foreach($val1 as $key2 => $val2) {
			
			foreach($val2 as $key3 => $val3) {
				
				foreach($val3 as $key4 => $val4) {
					
					if(!empty($val4['key'])) {
					
						$checkin_day = date('d',strtotime($val4['checkin']));
						$checkin_month = date('m',strtotime($val4['checkin']));
						$checkin_year = date('Y',strtotime($val4['checkin']));
						$checkout_month = date('m',strtotime($val4['checkout']));
						$checkout_year = date('Y',strtotime($val4['checkout']));
						$ciym = $checkin_year . '-' . $checkin_month;
						$coym = $checkout_year . '-' . $checkout_month;
						$ym = $year . '-' . sprintf("%02d", $month);
						$ciymd = $val4['checkin'];
						$coymd = $val4['checkout'];
						$lymd = $ym . '-' . $month_day_qty;
						$fymd = $ym . '-01';
					
						// overlap-first
						if( ($ciym !== $ym) && ($coym == $ym) ) {
							$checkin = $ym . '-01';
							$checkout = $val4['checkout'];
							$style = 'overlap-first';
							$nights = shb_get_booking_nights($checkin,$checkout);
					
						// checkout-first
						} elseif( $coymd == $fymd ) {
							$checkin = $fymd;
							$checkout = $val4['checkout'];
							$style = 'checkout-first';
							$nights = shb_get_booking_nights($checkin,$checkout);
					
						// overlap-last
						} elseif( ($ciym == $ym) && ($coym !== $ym) && ( ($month_day_qty - $checkin_day) >= 6 ) ) {
							$checkin = $val4['checkin'];
							$checkout = $ym . '-' . $month_day_qty;
							$style = 'overlap-last';
							$nights = shb_get_booking_nights($checkin,$checkout);
						
						// overlap-last-short
						} elseif( ($ciym == $ym) && ($coym !== $ym) && ( ($month_day_qty - $checkin_day) < 6 ) ) {
							$checkin = $ym . '-' . $month_day_qty;
							$checkout = $ym . '-' . $month_day_qty;
							$style = 'overlap-last-short';
							$nights = shb_get_booking_nights($val4['checkin'],$checkout);
						
						// full
						} elseif( ($ciym !== $ym) && ($coym !== $ym) ) {
							$checkin = $ym . '-01';
							$checkout = $ym . '-' . $month_day_qty;
							$style = 'full';
							$nights = shb_get_booking_nights($checkin,$checkout) + 1;
					
						// checkin-last
						} elseif( ($ciymd == $lymd) ) {
							$checkin = $val4['checkin'];
							$checkout = $val4['checkout'];
							$style = 'checkin-last';
							$nights = shb_get_booking_nights($checkin,$checkout);
						
						// regular
						} else {
							$checkin = $val4['checkin'];
							$checkout = $val4['checkout'];
							$style = 'regular';
							$nights = shb_get_booking_nights($checkin,$checkout);
						}
						
						if($nights > 1) {
							$nights_label = __('Nights','sohohotel_booking');
						} else {
							$nights_label = __('Night','sohohotel_booking');
						}
						
						$o['bookings'][$key1][$key2][$checkin][$key4]['title_1'] = '#' . $val4['booking_id'] . ' ' . $val4['guest_name'] . ' (' . $nights . ' ' . $nights_label . ')';
						$o['bookings'][$key1][$key2][$checkin][$key4]['title_2'] = shb_get_date($val4['checkin']) . ' - ' . shb_get_date($val4['checkout']);
						$o['bookings'][$key1][$key2][$checkin][$key4]['nights'] = $nights;
						$o['bookings'][$key1][$key2][$checkin][$key4]['status'] = get_post_status($val4['booking_id']);
						$o['bookings'][$key1][$key2][$checkin][$key4]['booking_id'] = $val4['booking_id'];
						$o['bookings'][$key1][$key2][$checkin][$key4]['style'] = $style;
					
					}
					
				}
				
			}
				
		}
				
	}
	
	return $o;
	
}

function shb_booking_calendar(){
	
	// Set booking status array
	$status = array(
		'shb_pending' => __('Pending','sohohotel_booking'),
		'shb_confirmed' => __('Confirmed','sohohotel_booking'),
		'shb_cancelled' => __('Cancelled','sohohotel_booking'),
		'shb_ical' => __('iCal','sohohotel_booking'),
		'shb_maintenance' => __('Maintenance','sohohotel_booking'),
	);
	
	$url = get_admin_url() . 'admin.php?page=shb-booking-calendar';
	
	// Get selected booking status from URL
	if(!empty($_GET['shb_status'])) {
		
		foreach($status as $key => $val) {
			
			if($_GET['shb_status'] == $key) {
				$selected_status = $key;	
				break;
			} else {
				$selected_status = 'shb_all';
			}
			
		}
		
	} else {
		$selected_status = 'shb_all';
	}
	
	// Get selected year from URL
	if(!empty($_GET['shb_year'])) {
		
		if( (is_numeric($_GET['shb_year'])) && (strlen($_GET['shb_year']) == 4) ) {
			$year = $_GET['shb_year'];
		} else {
			$year = date("Y");
		}
			
	} else {
		$year = date("Y");
	}
	
	// Get selected month from URL
	if(!empty($_GET['shb_month'])) {
		
		if( (is_numeric($_GET['shb_month'])) && ( (strlen($_GET['shb_month']) == 1) || (strlen($_GET['shb_month']) == 2) ) ) {
			$month = $_GET['shb_month'];
		} else {
			$month = date("n");
		}
		
	} else {
		$month = date("n");
	}
	
	// Query bookings
	$booking_ids_query = get_posts(array(
	    'fields'          => 'ids',
	    'posts_per_page'  => -1,
		'post_type' => 'shb_booking',
		'post_status' => array('shb_pending','shb_confirmed','shb_cancelled','shb_ical','shb_maintenance')
	));
	
	foreach($booking_ids_query as $booking_id) {
		$booking_ids[get_post_status($booking_id)][] = $booking_id;
	}
	
	// Build array for status navigation tabs
	$booking_status['shb_all']['label'] = __('All','sohohotel_booking');
	$booking_status['shb_all']['url'] = $url . '&shb_status=shb_all&shb_month=' . $month . '&shb_year=' . $year;
	
	foreach($status as $key => $val) {
		
		$booking_status[$key]['label'] = $val;
		$booking_status[$key]['url'] = $url . '&shb_status=' . $key . '&shb_month=' . $month . '&shb_year=' . $year;
		
		if(!empty($booking_ids[$key])) {
			$booking_status[$key]['qty'] = count($booking_ids[$key]);
			$booking_total[] = count($booking_ids[$key]);
		} else {
			$booking_status[$key]['qty'] = 0;
		}
		
	}
	
	if(!empty($booking_total)) {
		$booking_status['shb_all']['qty'] = array_sum($booking_total);
	} else {
		$booking_status['shb_all']['qty'] = 0;
	}
	
	// Booking calendar
	$month_day_qty = date('t',strtotime($year . '-' . $month . '-01'));
	$month_dates = shb_get_date_range_array($year . '-' . sprintf("%02d", $month) . '-01',$year . '-' . sprintf("%02d", $month) . '-' . sprintf("%02d", $month_day_qty));
	$shb_booking_calendar_data = shb_booking_calendar_data($month,$year);

	$daynames[1] = __('Mo','sohohotel_booking');
	$daynames[2] = __('Tu','sohohotel_booking');
	$daynames[3] = __('We','sohohotel_booking');
	$daynames[4] = __('Th','sohohotel_booking');
	$daynames[5] = __('Fr','sohohotel_booking');
	$daynames[6] = __('Sa','sohohotel_booking');
	$daynames[0] = __('Su','sohohotel_booking');
	
	$monthnames[1] = __('January','sohohotel_booking');
	$monthnames[2] = __('February','sohohotel_booking');
	$monthnames[3] = __('March','sohohotel_booking');
	$monthnames[4] = __('April','sohohotel_booking');
	$monthnames[5] = __('May','sohohotel_booking');
	$monthnames[6] = __('June','sohohotel_booking');
	$monthnames[7] = __('July','sohohotel_booking');
	$monthnames[8] = __('August','sohohotel_booking');
	$monthnames[9] = __('September','sohohotel_booking');
	$monthnames[10] = __('October','sohohotel_booking');
	$monthnames[11] = __('November','sohohotel_booking');
	$monthnames[12] = __('December','sohohotel_booking');
	
	$year_start = date("Y") - 1;
	$year_end = date("Y") + 5;

	$o = '';
	
	$o .= '<div class="wrap">';
	
		$add_new_booking_url = get_admin_url() . 'post-new.php?post_type=shb_booking';
		
		$o .= '<h1 class="wp-heading-inline">Bookings</h1>';
		$o .= '<a href="' . $add_new_booking_url . '" class="page-title-action">Add New</a>';
		
		$o .= '<hr class="wp-header-end">';
		
		$o .= '<ul class="subsubsub">';
		
		foreach($booking_status as $key => $val) {
			
			if($selected_status == $key) {
				$selected_status_class = 'class="current" aria-current="page"';
			} else {
				$selected_status_class = '';
			}
 			
			$o .= '<li class="' . $key . '"><a href="' . $val['url'] . '" ' . $selected_status_class . '>' . $val['label'] . ' <span class="count">(' . $val['qty'] . ')</span></a> <span class="shb-sep">|</span></li>';
			
		}
		
			
		$o .= '</ul>';
		
		$o .= '<form id="posts-filter" method="get" action=' . $url . '>';
			$o .= '<div class="tablenav top">';
				$o .= '<div class="alignleft actions bulkactions">';

					$o .= '<select name="shb_month" id="bulk-action-selector-top">';
					
						foreach($monthnames as $key => $val) {
							
							if($key == $month) {
								$o .= '<option value="' . $key . '" selected>' . $val . '</option>';
							} else {
								$o .= '<option value="' . $key . '">' . $val . '</option>';
							}
							
						}
					
					$o .= '</select>';
					
					$o .= '<select name="shb_year" id="bulk-action-selector-top">';
					
						foreach (range($year_start, $year_end) as $r) {
							
							if($r == $year) {
								$o .= '<option value="' . $r . '" selected>' . $r . '</option>';
							} else {
								$o .= '<option value="' . $r . '">' . $r . '</option>';
							}
							
						}
				
					$o .= '</select>';
					
					$o .= '<input type="hidden" name="page" value="shb-booking-calendar" />';
					$o .= '<input type="hidden" name="shb_status" value="' . $selected_status . '" />';
					$o .= '<input type="submit" id="doaction" class="button action" value="Apply">';
				
				$o .= '</div>';
				
				$o .= '<br class="clear">';
			$o .= '</div>';
		$o .= '</form>';
		
		$o .= '<div class="clear"></div>';
		
		$o .= '<div class="shb-booking-calendar-wrapper">';
		
		$o .= '<div class="shb-booking-calendar-sticky-wrapper">';
		
		$o .= '<table class="shb-booking-calendar shb-booking-calendar-sticky">';
			$o .= '<tr>';
				$o .= '<th colspan="6"></th>';
				
					foreach($month_dates as $date) {

					   if($date == date('Y-m-d')) {
						   $o .= '<th class="shb-booking-calendar-today">' . $daynames[date('w', strtotime($date))] . ' <span>' . date('d', strtotime($date)) . '</span></th>';
					   } else {
						   $o .= '<th>' . $daynames[date('w', strtotime($date))] . ' <span>' . date('d', strtotime($date)) . '</span></th>';
					   }
				   
				   }
				   
			$o .= '</tr>';
		$o .= '</table>';
		
		$o .= '</div>';
		
			$o .= '<table class="shb-booking-calendar">';
				$o .= '<tr>';
					$o .= '<th colspan="6"></th>';
					
						foreach($month_dates as $date) {

						   if($date == date('Y-m-d')) {
							   $o .= '<th class="shb-booking-calendar-today">' . $daynames[date('w', strtotime($date))] . ' <span>' . date('d', strtotime($date)) . '</span></th>';
						   } else {
							   $o .= '<th>' . $daynames[date('w', strtotime($date))] . ' <span>' . date('d', strtotime($date)) . '</span></th>';
						   }
					   
					   }
					   
				$o .= '</tr>';
				
				foreach($shb_booking_calendar_data['accommodation'] as $accommodation_id => $accommodation_val) {
					
					foreach (range(1, $accommodation_val['total']) as $r) {
						
						$o .= '<tr>';
						
							if($r == 1) {
								$o .= '<td colspan="6" rowspan="' . ($accommodation_val['total'] + 1) . '" class="shb-booking-calendar-accommodation-title"><strong><a href="' . get_edit_post_link($accommodation_id) . '">' . get_the_title($accommodation_id) . '</a></strong></td>';
							}
						
							foreach($month_dates as $date) {
							
								if(date('w', strtotime($date)) == 0 || date('w', strtotime($date)) == 6) {
									$td_class = 'shb-calendar-weekend';
								} else {
									$td_class = '';
								}
								
								$o .= '<td class="' . $td_class . '">';
							
									if(!empty($shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date])) {
										
										foreach($shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date] as $key => $item) {
											
											$nights = $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['nights'];
											$style_data = $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['style'];
											
											if($style_data == 'full') {
												$style = 'width: calc(' . ($nights * 100)  . '% + ' . ($nights - 14 - 1 - 1) . 'px);padding: 15px 0 0 12px;left: 0%;';
											} elseif($style_data == 'overlap-first') {
												$style = 'width: calc(' . (($nights * 100) + 50) . '% + ' . (($nights + 0.5) - 16) . 'px);padding: 15px 0 0 12px;left: 0%;';
											} elseif($style_data == 'overlap-last') {
												$style = 'width: calc(' . (($nights + 0.5) * 100) . '% + ' . (($nights + 0.5) - 16) . 'px);padding: 15px 0 0 12px;';
											} elseif($style_data == 'overlap-last-short') {
												$style = 'width: calc(' . (($nights + 0.5) * 100) . '% + ' . (($nights + 0.5) - 16) . 'px);padding: 15px 0 0 12px;left: auto;right: -1px;';
											} elseif($style_data == 'checkout-first') {
												$style = 'width: calc(50% - 15px);padding: 15px 0 0 12px;left: 0%;';
											} elseif($style_data == 'checkin-last') {
												$style = 'width: calc(50% - 15px);padding: 15px 0 0 12px;';
											} elseif($style_data == 'regular') {
												$style = 'width: calc(' . ($nights * 100) . '% + ' . (($nights + 0.5) - 16) . 'px);padding: 15px 0 0 12px;';
											}
											
											$status = $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['status'];
										
											if( date('d',strtotime($date)) == $month_day_qty ) {
												$class = 'shb-calendar-pos-right';
											} else {
												$class = '';
											}
											
								 			$o .= '<div class="shb-booking-calendar-item ' . $class . ' shb-booking-calendar-' . $status . '" style="' . $style . '">';
											
											if($status == 'shb_ical') {
												$o .= '<strong>' . $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['title_1'] . '</strong>';
											} else {
												$o .= '<strong><a href="' . get_edit_post_link($shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['booking_id']) . '">' . $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['title_1'] . '</a></strong>';
											}
											
												$o .= '<span>' . $shb_booking_calendar_data['bookings'][$accommodation_id][$r][$date][$key]['title_2'] . '</span>';
								 			$o .= '</div>';
											
										}
										
									}
							
								$o .= '</td>';
					
							}
					
						$o .= '</tr>';
					
					 }
				 
					 $o .= '<tr class="shb-calendar-available-qty">';
					 
					 	foreach($month_dates as $date) {
							
							if($shb_booking_calendar_data['availability'][$date][$accommodation_id] == 'unavailable') {
								$qty = '0';
							} else {
								$qty = $shb_booking_calendar_data['availability'][$date][$accommodation_id];
							}
							
							$o .= '<td>' . $qty . '</td>';
						}
						
					$o .= '</tr>';
			
				}
			
			$o .= '</table>';
		$o .= '</div>';		
	$o .= '</div>';

	echo $o;	
		
}