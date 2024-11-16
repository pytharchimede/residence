<?php

function shb_booking_steps($step) {
	
	$o = '';
	
	// Hide step 3
	if(!empty(get_option('shb_booking_add_ons_step'))) {
		$booking_add_ons_step = get_option('shb_booking_add_ons_step');
	} else {
		$booking_add_ons_step = 'show';
	}
	
	if($booking_add_ons_step == 'hide') {
		
		$steps = array(
			1 => __('Rooms','sohohotel_booking'),
			3 => __('Payment','sohohotel_booking'),
			4 => __('Complete','sohohotel_booking'),
		);
		
		if($step == 1) {
			$width = 0;
		} elseif($step == 2) {
			$width = 49;
		} elseif($step == 3) {
			$width = 49;
		} elseif($step == 4) {
			$width = 100;
		}
		
	} else {
		
		$steps = array(
			1 => __('Rooms','sohohotel_booking'),
			2 => __('Add-Ons','sohohotel_booking'),
			3 => __('Payment','sohohotel_booking'),
			4 => __('Complete','sohohotel_booking'),
		);
		
		if($step == 1) {
			$width = 0;
		} elseif($step == 2) {
			$width = 30;
		} elseif($step == 3) {
			$width = 67;
		} elseif($step == 4) {
			$width = 90;
		}
		
	}
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if($booking_add_ons_step == 'hide') {
		$o .= '<div class="shb-booking-step-wrapper shb-booking-step-wrapper-hide-add-ons shb-clearfix">';
	} else {
		$o .= '<div class="shb-booking-step-wrapper shb-clearfix">';
	}
	
	foreach($steps as $step_key => $step_label ) {
		
		if( ($step == $step_key) || ($step > $step_key) ) {
			$current = 'shb-booking-step-current';
		} else {
			$current = '';
		}
		
		if( empty($_SESSION['shb_booking_data'][1]) ) {
			
			if( ($step_key == 2) || ($step_key == 3) || ($step_key == 4) ) {
				$link = '#';
			} else {
				$link = $booking_page_url . '?shb-step=' . $step_key;
			}
			
		} else {
			
			if( $step_key == 4 ) {
				$link = '#';
			} else {
				$link = $booking_page_url . '?shb-step=' . $step_key;
			}
			
		}
		
		// Hide step 3
		if($booking_add_ons_step == 'hide') {
			if($step_key == 3) {
				$step_key = 2;
			}
			if($step_key == 4) {
				$step_key = 3;
			}
		}
		
		$o .= '<div class="shb-booking-step ' . $current . '">';
		$o .= '<a href="' . $link . '">' . $step_key . '</a>';
		$o .= '<a href="' . $link . '">' . $step_label . '</a>';
		$o .= '</div>';
		
	}
	
	$o .= '<div class="shb-booking-step-line"><div style="width:' . $width . '%;"></div></div>';	
	$o .= '</div>';
	
	return $o;
	
}

function shb_select_accommodation_frontend($accommodation_id,$rate_id) {
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	if(!empty($_SESSION['shb_booking_data'])) {
		$shb_booking_data = $_SESSION['shb_booking_data'];
	} else {
		$shb_booking_data = array();
	}
	
	$c = count($shb_booking_data);
	
	$i = $c + 1;
	
	$shb_booking_data[$i]['checkin'] = $_SESSION['shb_default_checkin'];
	$shb_booking_data[$i]['checkout'] = $_SESSION['shb_default_checkout'];
	$shb_booking_data[$i]['nights'] = shb_get_booking_nights($_SESSION['shb_default_checkin'],$_SESSION['shb_default_checkout']);
	$shb_booking_data[$i]['room_id'] = $accommodation_id;
	$shb_booking_data[$i]['rate_id'] = $rate_id;
	
	foreach($guestclass_ids as $guestclass_id) {
		$shb_booking_data[$i]['guests'][$guestclass_id] = $_SESSION['shb_guestclass_' . $guestclass_id];
	}
	
	$shb_booking_data[$i]['guests_total'] = array_sum($shb_booking_data[$i]['guests']);
	
	// Mandatory fees
	$mandatory_fee_data['shb_checkin_alt'][0] = $_SESSION['shb_default_checkin'];
	$mandatory_fee_data['shb_checkout_alt'][0] = $_SESSION['shb_default_checkout'];
	$mandatory_fee_data['shb_accommodation_selected'][0] = $accommodation_id;
	$mandatory_fee_data['shb_rate_selected'][0] = $rate_id;
	
	foreach($guestclass_ids as $guestclass_id) {
		$mandatory_fee_data['shb_' . $guestclass_id . '_qty'][0] = $_SESSION['shb_guestclass_' . $guestclass_id];
	}
	
	$shb_select_additionalfee_mandatory = shb_select_additionalfee_mandatory($mandatory_fee_data,false);

	$i2 = 0;
	
	foreach($shb_select_additionalfee_mandatory as $fee_id => $fee_price) {
		
		$i2++;
		
		$shb_booking_data[$i]['additionalfee'][$i2]['additionalfee_id'] = $fee_id;
		$shb_booking_data[$i]['additionalfee'][$i2]['price'] = $fee_price;
		
	}
 	
	$_SESSION['shb_booking_data'] = $shb_booking_data;
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if(!empty(get_option('shb_booking_add_ons_step'))) {
		$booking_add_ons_step = get_option('shb_booking_add_ons_step');
	} else {
		$booking_add_ons_step = 'show';
	}
	
	if($booking_add_ons_step == 'show') {
		header('Location: ' . $booking_page_url . '?shb-step=2');
	} else {
		header('Location: ' . $booking_page_url . '?shb-step=3');
	}
	
}

function shb_delete_accommodation_frontend() {
	
	$new_booking_data = array();
	
	if(!empty($_GET['shb-delete-room'])) {
		
		unset($_SESSION['shb_booking_data'][$_GET['shb-delete-room']]);
		
		// Reset index numbers in array
		$i = 0;
	
		foreach($_SESSION['shb_booking_data'] as $key => $booking_data) {
			$i++;
			$new_booking_data[$i] = $booking_data;
		}
	
		$_SESSION['shb_booking_data'] = $new_booking_data;

	}

}

function shb_delete_additionalfee_frontend() {
	
	$new_additionalfee = array();
	$booking_data = $_SESSION['shb_booking_data'];
	
	if( (!empty($_GET['shb-delete-fee'])) && !empty($_GET['shb-delete-feeroom']) ) {
		unset($booking_data[$_GET['shb-delete-feeroom']]['additionalfee'][$_GET['shb-delete-fee']]);
		
		$i = 0;
		
		foreach($booking_data[$_GET['shb-delete-feeroom']]['additionalfee'] as $additionalfee_key => $additionalfee_data) {
			
			$i++;
			$new_additionalfee[$_GET['shb-delete-feeroom']][$i] = $additionalfee_data;
			
		}
		
	}
	
	foreach($new_additionalfee as $accommodation_key => $additionalfee_data) {
		$booking_data[$accommodation_key]['additionalfee'] = $additionalfee_data;
	}
 	
	$_SESSION['shb_booking_data'] = $booking_data;

}

function shb_booking_step_1() { ?>
	
	<!-- BEGIN .shb-booking-page-wrapper -->
	<div class="shb-booking-page-wrapper shb-clearfix <?php echo shb_get_booking_step_class(); ?>">
		
		<!-- BEGIN .shb-booking-page-main -->
		<div class="shb-booking-page-main">
			
			<?php
			shb_delete_accommodation_frontend();
			
			if( (!empty($_POST['shb_accommodation_selected'])) && (!empty($_POST['shb_rate_selected']))) {
				shb_select_accommodation_frontend($_POST['shb_accommodation_selected'],$_POST['shb_rate_selected']);
			}

			if(!empty($_POST['shbdp-checkin'])) {
				$_SESSION['shb_default_checkin'] = $_POST['shbdp-checkin'];
			}

			if(!empty($_POST['shbdp-checkout'])) {
				$_SESSION['shb_default_checkout'] = $_POST['shbdp-checkout'];
			} 

			if(!empty($_SESSION['shb_default_checkin'])) {
				$default_checkin = $_SESSION['shb_default_checkin'];
			} else {
				$default_checkin = date("Y-m-d");
				$_SESSION['shb_default_checkin'] = date("Y-m-d");
			}

			if(!empty($_SESSION['shb_default_checkout'])) {
				$default_checkout = $_SESSION['shb_default_checkout'];
			} else {
				$default_checkout = date("Y-m-d", strtotime('tomorrow'));
				$_SESSION['shb_default_checkout'] = date("Y-m-d", strtotime('tomorrow'));
			}

			$checkin = $default_checkin;
			$checkout = $default_checkout;

			$data['checkin'] = $checkin;
			$data['checkout'] = $checkout;

			$guestclass_ids = shb_get_all_ids('shb_guestclass');
			
			// First load
			$not_first_load = array();
	
			foreach($guestclass_ids as $guestclass_id) {
		
				if(!empty($_SESSION['shb_guestclass_' . $guestclass_id])) {
					$not_first_load[] = true;
				}
		
			}
	
			if(!in_array(true,$not_first_load)) {
	
				foreach($guestclass_ids as $guestclass_id) {
					$_SESSION['shb_guestclass_' . $guestclass_id] = str_replace('key_','',get_option('shb_' . $guestclass_id . '_preset'));
				}
		
			}
	
			// Refresh
			if( (empty($_POST)) && (empty($_GET['shb-delete-room'])) && (in_array(true,$not_first_load)) ) {
		
			}
	
			// Submit search
			$submit_search = array();
	
			foreach($guestclass_ids as $guestclass_id) {
		
				if(!empty($_POST['shb-guestclass-' . $guestclass_id])) {
					$submit_search[] = true;
				}
		
			}
	
			if(in_array(true,$submit_search)) {
		
				foreach($guestclass_ids as $guestclass_id) {
		
					if(!empty($_POST['shb-guestclass-' . $guestclass_id])) {
						$_SESSION['shb_guestclass_' . $guestclass_id] = str_replace('key_','',$_POST['shb-guestclass-' . $guestclass_id]);
					} else {
						$_SESSION['shb_guestclass_' . $guestclass_id] = '0';
					}
		
				}
		
			}
	
			// Select room
			if(!empty($_POST['shb_accommodation_selected'])) {

			}
	
			// Delete room
			if(!empty($_GET['shb-delete-room'])) {
		
			}
			
			$shb_get_guestclass_session = shb_get_guestclass_session();
			$data['guests'] = $shb_get_guestclass_session['guest_qty'];
			
			$shb_accommodation_booking_select = shb_accommodation_booking_select($data);
			
			// Filter rooms by hotel category
			if(!empty($_POST['shb-location'])) {
				
				$room_ids = array();
				
				foreach($shb_accommodation_booking_select as $k => $r) {
				
					$terms = wp_get_post_terms( $k, array( 'accommodation-categories' ) );
				
					foreach ($terms as $t) {
					
						if($t->term_id == $_POST['shb-location']) {
							
							$room_ids[$k] = $k;
							
						}
					
					}
			
				}
				
				$shb_accommodation_booking_select_loop = $shb_accommodation_booking_select;
				
				foreach($shb_accommodation_booking_select_loop as $k => $r) {
					
					if(!in_array($k,$room_ids)) {
						unset($shb_accommodation_booking_select[$k]);
					}
					
				}
				
			}
			
			// Remove unavailable selected rooms from the loop
			if(!empty($_SESSION['shb_booking_data'])) {
			
				$summary_data_encoded_full['shb_booking_data'][0] = json_encode($_SESSION['shb_booking_data']);
				$shb_get_booking_summary_full = shb_get_booking_summary($summary_data_encoded_full);
			
				$shb_accommodation_booking_select_loop = $shb_accommodation_booking_select;
			
				foreach($shb_accommodation_booking_select_loop as $accommodation_id => $accommodation_data) {
				
					if($accommodation_data['bookable'] == 'unavailable') {
				
						if(!empty($shb_get_booking_summary_full)) {
					
							foreach($shb_get_booking_summary_full['items'] as $k) {
							
								if($accommodation_id == $k['room_id']) {
								
									unset($shb_accommodation_booking_select[$k['room_id']]);
								
								}
						
							}
					
						}
				
					}
				
				}
			
			}	
			
			 echo shb_booking_steps(1);
			 
			 echo '<div class="shb-mobile-sidebar">';
			 echo shb_booking_page_sidebar('');
			 echo '</div>';
			 
			 echo do_shortcode('[shb_booking_form_1 button_text="' . __('Search','sohohotel_booking') . '" checkin="' . $checkin . '" checkout="' . $checkout . '" preset_guests="true"]'); 
	  
			if(!empty(get_option('shb_booking_page'))) {
				$booking_page_url = get_permalink(get_option('shb_booking_page'));
			} else {
				$booking_page_url = '';
			}
			
			// If user comes from accommodation single page, highlight selected accommodation and display it at the top of the results array
			if( (!empty($_POST['shb-single-accommodation-id'])) && (!empty($shb_accommodation_booking_select[$_POST['shb-single-accommodation-id']])) ) {
				
				$bring_to_top_array = array(
					$_POST['shb-single-accommodation-id'] => $shb_accommodation_booking_select[$_POST['shb-single-accommodation-id']]
				);
				
				unset($shb_accommodation_booking_select[$_POST['shb-single-accommodation-id']]);
				$shb_accommodation_booking_select = $bring_to_top_array + $shb_accommodation_booking_select;
				
				$highlight_accommodation = $_POST['shb-single-accommodation-id'];
				
			} else {
				
				$highlight_accommodation = '';
				
			} ?>
			
			<?php $booked_room_ids = array();
			
			// Highlight booked rooms in the main room listing loop
			if(!empty($_SESSION['shb_booking_data'])) {
				
				$summary_data_encoded_full['shb_booking_data'][0] = json_encode($_SESSION['shb_booking_data']);
				$shb_get_booking_summary_full = shb_get_booking_summary($summary_data_encoded_full);
				
				foreach($shb_get_booking_summary_full['items'] as $shb_get_booking_summary_full_key => $shb_get_booking_summary_full_data) {

					if(!empty($shb_get_booking_summary_full_data['room_id'])) {
						$booked_room_ids[$shb_get_booking_summary_full_data['room_id']] = $shb_get_booking_summary_full_data['room_id'];
					}
					
				}
				
			} ?>
			
			<!-- BEGIN .shb-booking-accommodation-result-wrapper -->
			<form class="shb-booking-accommodation-result-wrapper" action="<?php echo $booking_page_url; ?>" method="post">
		
				<?php foreach($shb_accommodation_booking_select as $accommodation_id => $accommodation_data) { ?>
					
					<?php if( in_array( $accommodation_id,$booked_room_ids ) ) {
						$selected_accommodation_class = 'shb-booking-accommodation-item-highlight';
					} else {
						$selected_accommodation_class = '';
					} ?>
					
					<?php if($accommodation_id == $highlight_accommodation) {
						
						$accommodation_class = 'shb-booking-accommodation-item-highlight';
						
					} else {
						
						$accommodation_class = '';
						
					} ?>
					
				<!-- BEGIN .shb-booking-accommodation-item -->
				<div class="shb-booking-accommodation-item <?php echo $accommodation_class; ?> <?php echo $selected_accommodation_class; ?> shb-clearfix shb-booking-accommodation-<?php echo $accommodation_data['bookable']; ?>">
					
					
					<?php if( in_array( $accommodation_id,$booked_room_ids ) ) { ?>
	
						<div class="shb-booking-condition-wrapper">
							<h2><i class="fas fa-check-circle"></i><?php _e('Room Selected','sohohotel_booking')?></h2>
							<ul>
								<li><?php _e('You have selected to book this room, you can select it again if you need multiple rooms of the same type','sohohotel_booking')?></li>
							</ul>
						</div>
	
					<?php } ?>
					
					<?php if(!empty($accommodation_data['conditions'])) { ?>
	
						<div class="shb-booking-condition-wrapper">
							<h2><i class="fas fa-exclamation-triangle"></i><?php echo get_the_title($accommodation_id) . ' ' . __('Conditions','sohohotel_booking'); ?></h2>
							<ul>
								<?php foreach($accommodation_data['conditions'] as $condition) { ?>
								<li><?php echo $condition; ?></li>
								<?php } ?>
							</ul>
						</div>
	
					<?php } ?>
			
					<!-- BEGIN .shb-clearfix -->
					<div class="shb-clearfix">
				
						<!-- BEGIN .shb-booking-accommodation-image -->
						<div class="shb-booking-accommodation-image">
					
							<?php if( has_post_thumbnail($accommodation_id) ) { ?>
								
								<?php if($accommodation_data['bookable'] == 'available') { ?>
									
									<a href="<?php esc_url(get_the_permalink($accommodation_id)); ?>" class="shb-lightbox-open">
										<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($accommodation_id), 'shb-thumbnail-2' ); ?>
										<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title($accommodation_id) . '" />'; ?>
									</a>
								
									<a href="#" class="shb-booking-accommodation-image-icon shb-lightbox-open"><i class="fas fa-images"></i></a>
								
								<?php } else { ?>
								
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($accommodation_id), 'shb-thumbnail-2' ); ?>
									<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title($accommodation_id) . '" />'; ?>
				
									<span class="shb-booking-accommodation-image-icon"><i class="fas fa-images"></i></span>
								
								<?php } ?>
									
							<?php } ?>
					
						<!-- END .shb-booking-accommodation-image -->
						</div>
		
						<!-- BEGIN .shb-booking-accommodation-info -->
						<div class="shb-booking-accommodation-info-wrapper">
			
							<!-- BEGIN .shb-booking-accommodation-info -->
							<div class="shb-booking-accommodation-info">
			
								<h3><a href="#"><?php echo get_the_title($accommodation_id); ?></a></h3>
						
								<?php $shb_short_description = get_post_meta($accommodation_id,'shb_short_description',TRUE);
								echo $shb_short_description; ?>
				
							<!-- END .shb-booking-accommodation-info -->
							</div>
					
							<?php if(!empty($accommodation_data['rates'])) { ?>
					
								<?php foreach($accommodation_data['rates'] as $rate_id => $rate_data) { ?>
					
									<!-- BEGIN .shb-booking-accommodation-info -->
									<div class="shb-booking-accommodation-info shb-booking-accommodation-rate shb-booking-accommodation-rate-<?php echo $rate_data['bookable']; ?>">
								
										<?php if(!empty($rate_data['conditions'])) { ?>
	
											<div class="shb-booking-condition-wrapper">
												<h2><i class="fas fa-exclamation-triangle"></i><?php echo get_the_title($rate_id) . ' ' . __('Conditions','sohohotel_booking'); ?></h2>
												<ul>
													<?php foreach($rate_data['conditions'] as $condition) { ?>
													<li><?php echo $condition; ?></li>
													<?php } ?>
												</ul>
											</div>
	
										<?php } ?>
								
										<!-- BEGIN .shb-booking-rate-info -->
										<div class="shb-booking-rate-info">
						
											<div class="shb-clearfix">
												<h3><a href="#"><?php echo get_the_title($rate_id); ?></a></h3>
												<h3><?php echo shb_get_price($rate_data['price']); ?></h3>
											</div>
									
									
											<?php $shb_rate_short_description = get_post_meta($rate_id,'shb_short_description',TRUE);
											echo $shb_rate_short_description; ?>
									
											<div class="shb-clearfix">
												<?php if($rate_data['bookable'] == 'available') { ?>
											
													<input type="submit" value="<?php _e('Select Room','sohohotel_booking'); ?>" class="shb-booking-accommodation-select-room" data-accommodation="<?php echo $accommodation_id; ?>" data-rate="<?php echo $rate_id; ?>" />
											
													<a href="#" class="shb-booking-accommodation-view-details shb-lightbox-open"><?php _e('View Details','sohohotel_booking'); ?><i class="fas fa-chevron-right"></i></a>
												<?php } else { ?>
													<span class="shb-booking-accommodation-select-room"><?php _e('Select Room','sohohotel_booking'); ?></span>
													<span class="shb-booking-accommodation-view-details"><?php _e('View Details','sohohotel_booking'); ?><i class="fas fa-chevron-right"></i></span>
												<?php } ?>
											</div>
									
											<?php if($rate_data['bookable'] == 'available') { ?>
									
											<!-- BEGIN .shb-lightbox-html -->
											<div class="shb-lightbox-html">
								
												<!-- BEGIN .shb-lightbox -->
												<div class="shb-lightbox sohohotel-content-wrapper">
									
													<a href="#" class="shb-lightbox-close"><i class="fas fa-times"></i></a>
									
													<!-- BEGIN .shb-lightbox-content -->
													<div class="shb-lightbox-content shb-clearfix">
										
														<!-- BEGIN .shb-accommodation-single-main -->
														<div class="shb-accommodation-single-main sohohotel-main-content">
															
															<?php echo do_shortcode(get_post_field('post_content', $rate_id)); ?>
													
															<?php
														
																// Calculate accommodation price
																$summary_data[1]['checkin'] = $checkin;
																$summary_data[1]['checkout'] = $checkout;
																$summary_data[1]['nights'] = shb_get_booking_nights($checkin,$checkout);
																$summary_data[1]['room_id'] = $accommodation_id;
																$summary_data[1]['rate_id'] = $rate_id;
														
																foreach($guestclass_ids as $guestclass_id) {
																	$summary_data[1]['guests'][$guestclass_id] = $data['guests'][$guestclass_id];
																}
																
																
														
																$summary_data[1]['guests_total'] = array_sum($data['guests']);
																
																
																
																$summary_data_encoded['shb_booking_data'][0] = json_encode($summary_data);
																$shb_get_booking_summary = shb_get_booking_summary($summary_data_encoded);
														
																// Calculate fee price
																$mandatory_fee_data['shb_checkin_alt'][0] = $checkin;
																$mandatory_fee_data['shb_checkout_alt'][0] = $checkout;
																$mandatory_fee_data['shb_accommodation_selected'][0] = $accommodation_id;
																$mandatory_fee_data['shb_rate_selected'][0] = $rate_id;
														
																foreach($guestclass_ids as $guestclass_id) {
																	$mandatory_fee_data['shb_' . $guestclass_id . '_qty'][0] = $data['guests'][$guestclass_id];
																}
														
																$shb_select_additionalfee_mandatory = shb_select_additionalfee_mandatory($mandatory_fee_data,false);
																
																
																
																
																
															?>
													
														<!-- END .shb-accommodation-single-main -->
														</div>
										
														<!-- BEGIN .shb-accommodation-single-sidebar -->
														<div class="shb-accommodation-single-sidebar">
											
															<!-- BEGIN .shb-booking-your-stay-wrapper -->
															<div class="shb-booking-your-stay-wrapper shb-booking-your-stay-rate">
	
																<!-- BEGIN .shb-booking-your-stay-items-wrapper -->
																<div class="shb-booking-your-stay-items-wrapper">
		
																	<!-- BEGIN .shb-booking-your-stay-item-wrapper -->
																	<div class="shb-booking-your-stay-item-wrapper">
			
																		<h3><?php echo get_the_title($rate_id); ?></h3>
																
																		<?php $checkin_f = date_create($checkin);
																		$checkout_f = date_create($checkout); ?>
																
																		<ul>
																			<li><span><?php _e('Dates','sohohotel_booking'); ?>:</span> <?php echo date_format($checkin_f,shb_alt_date_format()) . ' - ' . date_format($checkout_f,shb_alt_date_format()); ?></li>
																			<li><span><?php _e('Guests','sohohotel_booking'); ?>:</span> <?php echo $shb_get_booking_summary['items'][1]['guests']; ?></li>
																		</ul>
				
																	<!-- END .shb-booking-your-stay-item-wrapper -->
																	</div>
		
																<!-- END .shb-booking-your-stay-items-wrapper -->
																</div>
		
																<!-- BEGIN .shb-booking-your-stay-item-wrapper-alt -->
																<div class="shb-booking-your-stay-item-wrapper-alt shb-clearfix">
			
																	<!-- BEGIN .shb-booking-your-stay-other-item-wrapper -->
																	<div class="shb-booking-your-stay-other-item-wrapper">
			
																		<p class="shb-booking-your-stay-other-item shb-clearfix">
																			<span class="shb-booking-your-stay-other-item-expand"><a href="#"><?php echo $shb_get_booking_summary['items'][1]['nights']; ?></a><i class="fas fa-chevron-down"></i></span>
																			<span><?php echo shb_get_price($shb_get_booking_summary['total_price']); ?></span>
																		</p>
				
																		<div class="shb-booking-your-stay-other-item-expanded">
																	
																			<?php $shb_day_names = shb_day_names_7('short');
																		
																			foreach($shb_get_booking_summary['items'][1]['pricebreakdown'] as $date => $price) {
																				
																				$date_f = date_create($date);
																				
																				echo '<p class="shb-clearfix"><span>' . $shb_day_names[date('N', strtotime($date))] . ', ' . date_format($date_f,shb_alt_date_format()) . '</span><span>' . shb_get_price($price) . '</span></p>';
																			} ?>
																	
																		</div>
			
																	<!-- END .shb-booking-your-stay-other-item-wrapper -->
																	</div>
															
																	<?php foreach($shb_select_additionalfee_mandatory as $fee_id => $fee_price) { ?>
															
																		<!-- BEGIN .shb-booking-your-stay-other-item-wrapper -->
																		<div class="shb-booking-your-stay-other-item-wrapper">
			
																			<p class="shb-booking-your-stay-other-item shb-clearfix">
																				<span><?php echo get_the_title($fee_id); ?></span>
																				<span><?php echo shb_get_price($fee_price); ?></span>
																			</p>
																		<!-- END .shb-booking-your-stay-other-item-wrapper -->
																		</div>
															
																	<?php } ?>
															
																<!-- END .shb-booking-your-stay-item-wrapper-alt -->
																</div>
		
																<!-- BEGIN .shb-booking-total -->
																<div class="shb-booking-total shb-clearfix">
															
																	<?php $total_quote = $shb_get_booking_summary['total_price'] + array_sum($shb_select_additionalfee_mandatory); ?>
																	<h4><?php _e('Total','sohohotel_booking'); ?></h4>
																	<h4><?php echo shb_get_price($total_quote); ?></h4>
		
																<!-- END .shb-booking-total -->
																</div>
														
																<input type="submit" value="<?php _e('Select Room','sohohotel_booking'); ?>" class="shb-booking-continue" data-accommodation="<?php echo $accommodation_id; ?>" data-rate="<?php echo $rate_id; ?>" />
														
														
																<a href="#" class="shb-booking-cancel"><?php _e('Cancel','sohohotel_booking'); ?></a>
		
															<!-- END .shb-booking-your-stay-wrapper -->
															</div>
											
														<!-- END .shb-accommodation-single-sidebar -->
														</div>
										
													<!-- END .shb-lightbox-content -->
													</div>
								
												<!-- END .shb-lightbox -->
												</div>
							
											<!-- END .shb-lightbox-html -->
											</div>
									
											<?php } ?>
									
										<!-- END .shb-booking-rate-info -->
										</div>
						
									<!-- END .shb-booking-accommodation-info -->
									</div>
					
								<?php } ?>
					
							<?php } ?>
					
						<!-- END .shb-booking-accommodation-info-wrapper -->
						</div>
			
					<!-- END .shb-clearfix -->
					</div>
			
				<!-- END .shb-booking-accommodation-item -->
				</div>
		
				<?php } ?>
		
			<!-- END .shb-booking-accommodation-result-wrapper -->
			</form>
			
		<!-- END .shb-booking-page-main -->
		</div>
		
		<!-- BEGIN .shb-booking-page-sidebar -->
		<div class="shb-booking-page-sidebar">
			
			<?php echo shb_booking_page_sidebar(''); ?>
			
			<?php 
			
			if(!empty(get_theme_mod('sohohotel_phone_number'))) {
				$phone = get_theme_mod('sohohotel_phone_number');
			} else {
				$phone = '';
			}
			
			if(!empty(get_theme_mod('sohohotel_address'))) {
				$address = get_theme_mod('sohohotel_address');
			} else {
				$address = '';
			}
			
			if(!empty(get_theme_mod('sohohotel_address_url'))) {
				$address_url = get_theme_mod('sohohotel_address_url');
			} else {
				$address_url = '';
			}
			
			if(!empty(get_option('shb_email_address'))) {
				$email = get_option('shb_email_address');
			} else {
				$email = '';
			}
			
			if(!empty(get_option('shb_email_address'))) {
				$email = get_option('shb_email_address');
			} else {
				$email = '';
			}
			
			if(!empty(get_option('shb_booking_page_sidebar_title'))) {
				$booking_title = get_option('shb_booking_page_sidebar_title');
			} else {
				$booking_title = '';
			}
			
			if(!empty(get_option('shb_booking_page_sidebar_message'))) {
				$booking_message = get_option('shb_booking_page_sidebar_message');
			} else {
				$booking_message = '';
			}
			
			echo do_shortcode('[shb_booking_contact 
			title="' . $booking_title . '" 
			main_content="' . $booking_message . '" 
			address="' . $address . '" 
			address_url="' . $address_url . '"
			phone="' . $phone . '" 
			email="' . $email . '"]'); ?>
			
		<!-- END .shb-booking-page-sidebar -->
		</div>
		
	<!-- END .shb-booking-page-wrapper -->
	</div>
	
<?php }

function shb_additionalfee_details($additionalfee_data) {
	
	$additionalfee_info = array();
	$additionalfee_info_return = '';

	if(!empty($additionalfee_data['qty'])) {
		$additionalfee_info[] = $additionalfee_data['qty'] . ' ' . get_post_meta($additionalfee_data['id'],'shb_qty_name',TRUE);
	}

	if(!empty($additionalfee_data['date'])) {
		$additionalfee_info[] = shb_get_date($additionalfee_data['date']);
	}

	if(!empty($additionalfee_data['time'])) {
		$additionalfee_info[] = $additionalfee_data['time'];
	}
	
	if(!empty($additionalfee_data['custom_input'])) {
		$additionalfee_info[] = $additionalfee_data['custom_input'];
	}
	
	$custom_select_options = get_post_meta($additionalfee_data['id'],'shb_custom_select_options',TRUE);
	$custom_select_options_exp = explode('|',$custom_select_options);
	
	$i = 0;
	foreach($custom_select_options_exp as $key => $val) {
		$i++;
		$custom_select_options_arr[$i] = $val;
	}
	
	if(!empty($additionalfee_data['custom_select'])) {
		$additionalfee_info[] = $custom_select_options_arr[$additionalfee_data['custom_select']];
	}
	
	$c = count($additionalfee_info);
	
	foreach($additionalfee_info as $key => $val) {

		if( $key == ($c - 1) ) {
			$additionalfee_info_return .= $val;
		} else {
			$additionalfee_info_return .= $val . ', ';
		}
		
	}
	
	return $additionalfee_info_return;
	
}

function shb_booking_page_sidebar($booking_id) {
	
	// Hide step 3
	if(!empty(get_option('shb_booking_add_ons_step'))) {
		$booking_add_ons_step = get_option('shb_booking_add_ons_step');
	} else {
		$booking_add_ons_step = 'show';
	}
	
	if(!empty($_GET['shb-step'])) {
		
		if($_GET['shb-step'] == 2) {
			$current_step = 2;
			$next_step = 3;
		} elseif($_GET['shb-step'] == 3) {
			$current_step = 3;
			$next_step = 4;
		} else {
			
			if($booking_add_ons_step == 'hide') {
				$current_step = 1;
				$next_step = 3;
			} else {
				$current_step = 1;
				$next_step = 2;
			}
			
		}
		
	} else {
		
		if(!empty($_GET['key'])) {
			$current_step = 4;
		} else {
			
			if($booking_add_ons_step == 'hide') {
				$current_step = 1;
				$next_step = 3;
			} else {
				$current_step = 1;
				$next_step = 2;
			}
			
		}
		
	}
	
	if( (!empty($_SESSION['shb_booking_data'][1])) && $current_step == 1 ) {
		
		$continue = true;
		
	} elseif($current_step == 2) {
		
		$continue = true;
		
	} elseif( ($current_step == 3) || ($current_step == 4) ) {
		
		$continue = false;
		
	} else {
		
		$continue = false;
		
	}
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if(!empty($booking_id)) {
		
		if(function_exists('shb_translate_booking_data')){
		   
			$summary_data_encoded_full['shb_booking_data'][0] = shb_translate_booking_data($booking_id);
			$shb_get_booking_summary_full = shb_get_booking_summary($summary_data_encoded_full);
			
		} else {
			
			$summary_data_encoded_full['shb_booking_data'][0] = get_post_meta($booking_id,'shb_booking_data',TRUE);
			$shb_get_booking_summary_full = shb_get_booking_summary($summary_data_encoded_full);
			
		}
		
	} elseif(!empty($_SESSION['shb_booking_data'])) {
		$summary_data_encoded_full['shb_booking_data'][0] = json_encode($_SESSION['shb_booking_data']);
		$shb_get_booking_summary_full = shb_get_booking_summary($summary_data_encoded_full);
	} ?>

	<!-- BEGIN .shb-booking-your-stay-wrapper -->
	<div class="shb-booking-your-stay-wrapper">
	
		<!-- BEGIN .shb-booking-your-stay-items-wrapper -->
		<div class="shb-booking-your-stay-items-wrapper">
		
			<?php if(!empty($shb_get_booking_summary_full['items'])) { ?>
		
			<?php foreach($shb_get_booking_summary_full['items'] as $accommodation_num => $accommodation_data) { ?>
		
			<!-- BEGIN .shb-booking-your-stay-item-wrapper -->
			<div class="shb-booking-your-stay-item-wrapper">
			
				<h3><?php echo sprintf( __( 'Room %u of %s', 'sohohotel_booking' ), $accommodation_num, $shb_get_booking_summary_full['total_items'] ); ?></h3>
				
				<?php $checkin_f = date_create($accommodation_data['checkin']);
				$checkout_f = date_create($accommodation_data['checkout']); ?>
				
				<ul>
					<li><span><?php _e('Dates','sohohotel_booking'); ?>:</span> <?php echo date_format($checkin_f,shb_alt_date_format()) . ' - ' . date_format($checkout_f,shb_alt_date_format()); ?></li>
					<li><span><?php _e('Guests','sohohotel_booking'); ?>:</span> <?php echo $accommodation_data['guests']; ?></li>
				</ul>
				
				<!-- BEGIN .shb-booking-your-stay-item -->
				<div class="shb-booking-your-stay-item shb-clearfix">
				
					<?php if( has_post_thumbnail($accommodation_data['room_id']) ) { ?>
						<a href="#" class="shb-booking-stay-image">
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($accommodation_data['room_id']), 'shb-thumbnail-3' ); ?>
							<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
						</a>
					<?php } ?>
					
					<div class="shb-booking-your-stay-item-info">
						<h4 class="shb-clearfix"><a href="#"><?php echo $accommodation_data['room_title']; ?></a><span><?php echo shb_get_price($accommodation_data['price']); ?></span></h4>
						<p class="shb-booking-your-stay-item-info-detail"><?php echo $accommodation_data['rate_title']; ?></p>
						<p class="shb-booking-price-expand"><a href="#"><?php echo $accommodation_data['nights']; ?></a><i class="fas fa-chevron-down"></i></p>
					
						<div class="shb-booking-price-expanded">
							
							<?php foreach($accommodation_data['pricebreakdown'] as $date => $price) {
								
								$date_f = date_create($date);
								$shb_day_names = shb_day_names_7('short');
								
								echo '<p class="shb-clearfix"><span>' . $shb_day_names[date('N', strtotime($date))] . ', ' . date_format($date_f,shb_alt_date_format()) . '</span><span>' . shb_get_price($price) . '</span></p>';
							} ?>
							
						</div>
					
					</div>
			
				<!-- END .shb-booking-your-stay-item -->
				</div>
			
				<?php if(!empty($accommodation_data['additionalfee'])) { ?>
					
					<?php foreach($accommodation_data['additionalfee'] as $additionalfee_num => $additionalfee_data) { ?>
						
						<!-- BEGIN .shb-booking-your-stay-item -->
						<div class="shb-booking-your-stay-item shb-booking-your-stay-item-child shb-clearfix">
				
							<?php if( has_post_thumbnail($additionalfee_data['id']) ) { ?>
								<a href="#" class="shb-booking-stay-image">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($additionalfee_data['id']), 'shb-thumbnail-3' ); ?>
									<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
								</a>
							<?php } ?>
							
							<div class="shb-booking-your-stay-item-info">
								<h4 class="shb-clearfix"><a href="#"><?php echo $additionalfee_data['title']; ?></a><span><?php echo shb_get_price($additionalfee_data['price']); ?></span></h4>
								<?php 
								
								$additionalfee_details = shb_additionalfee_details($additionalfee_data);
								
								echo '<p class="shb-booking-your-stay-item-info-detail">' . $additionalfee_details . '</p>'; ?>
								
								<?php if( (!empty( $additionalfee_data['delete_url_frontend'])) && ($current_step !== 4)) {
									echo '<p><a href="' . $additionalfee_data['delete_url_frontend'] . '">' . __('Remove','sohohotel_booking') . '</a></p>';
								}  ?>
								
							</div>
			
						<!-- END .shb-booking-your-stay-item -->
						</div>
						
					<?php } ?>
					
				<?php } ?>
			
				<!-- BEGIN .shb-booking-your-stay-controls -->
				<div class="shb-booking-your-stay-controls shb-clearfix">
					
					<?php if($current_step !== 4) { ?>
					
					<a href="<?php echo $accommodation_data['delete_url_frontend']; ?>"><?php _e('Remove','sohohotel_booking')?></a>
					
					<?php } ?>
				
				<!-- END .shb-booking-your-stay-controls -->
				</div>
				
			<!-- END .shb-booking-your-stay-item-wrapper -->
			</div>
		
			<?php } ?>
			
			<?php } else { ?>
				
				<!-- BEGIN .shb-booking-your-stay-item-wrapper -->
				<div class="shb-booking-your-stay-item-wrapper shb-booking-your-stay-item-wrapper-none-selected">
			
					<h3><?php _e('Your Stay','sohohotel_booking'); ?></h3>
				
					<?php 
					
					if(!empty($_POST['shbdp-checkin'])) {
						$_SESSION['shb_default_checkin'] = $_POST['shbdp-checkin'];
					}

					if(!empty($_POST['shbdp-checkout'])) {
						$_SESSION['shb_default_checkout'] = $_POST['shbdp-checkout'];
					} 

					if(!empty($_SESSION['shb_default_checkin'])) {
						$default_checkin = $_SESSION['shb_default_checkin'];
					} else {
						$default_checkin = date("Y-m-d");
					}

					if(!empty($_SESSION['shb_default_checkout'])) {
						$default_checkout = $_SESSION['shb_default_checkout'];
					} else {
						$default_checkout = date("Y-m-d", strtotime('tomorrow'));
					}
					
					$checkin_f = date_create($default_checkin);
					$checkout_f = date_create($default_checkout); ?>
				
					<ul>
						<li><span><?php _e('Dates','sohohotel_booking'); ?>:</span> <?php echo date_format($checkin_f,shb_alt_date_format()) . ' - ' . date_format($checkout_f,shb_alt_date_format()); ?></li>
						<li><span><?php _e('Guests','sohohotel_booking'); ?>:</span> <?php echo shb_guestclass_qty_label_session(); ?></li>
					</ul>
				
				<!-- END .shb-booking-your-stay-item-wrapper -->
				</div>
				
			<?php  } ?>
		
		<!-- END .shb-booking-your-stay-items-wrapper -->
		</div>
		
		<!-- BEGIN .shb-booking-total -->
		<div class="shb-booking-total shb-clearfix">
			
			<h4><?php _e('Total','sohohotel_booking'); ?></h4>
			
			<?php if(!empty($shb_get_booking_summary_full['total_price'])) {
				$summary_total = $shb_get_booking_summary_full['total_price'];
			} else {
				$summary_total = 0;
			} ?>
			
			<?php
			
			$original_price['currency'] = 1;
			$original_price['price'] = $summary_total;
			
			$display_original_price = shb_get_price($original_price);
			$original_currency_code = get_option('shb_currency_code_1');
	
			?>

			<h4>
				
				<?php echo shb_get_price($summary_total); ?>
				
				<?php 
				
				// Only display if converted currency selected
				if(!empty($_SESSION['shb_currency'])) {
					if($_SESSION['shb_currency'] != '1') {
						if(!empty($_GET['shb-step'])) {
							if( $_GET['shb-step'] == 3 ) {
								echo '<span class="shb-checkout-note">' . sprintf( __( 'Charged in %s (%s)', 'sohohotel_booking' ), $original_currency_code,$display_original_price ) . '</span>';
							}
						}
					}
				} 
				
				?>	
			
			</h4>
			
			<?php $_SESSION['shb_total_price'] = $summary_total; ?>
			
		<!-- END .shb-booking-total -->
		</div>
		
		<?php if(!empty($_GET['shb-step'])) {
			$shb_step = $_GET['shb-step'];	
		} else {
			$shb_step = '';
		} ?>
		
		<?php if( ($shb_step == 3) ) { ?>
			
			<!-- BEGIN .shb-woocommerce-discount-wrapper -->
			<div class="shb-woocommerce-discount-wrapper">
	
				<h4><?php _e('Discounts','sohohotel_booking'); ?></h4>
				<div class="shb-woocommerce-discount"></div>
			
			<!-- END .shb-woocommerce-discount-wrapper -->
			</div>
			
			<?php if(!empty(get_option('shb_deposit_due'))) { ?>
		
				<!-- BEGIN .shb-deposit-due -->
				<div class="shb-deposit-due">
			
					<?php $summary_total_deposit = shb_calc_percentage(get_option('shb_deposit_due'),$summary_total); ?>
			
					<h4><?php echo sprintf( __( 'Pay Now (%s)', 'sohohotel_booking' ), get_option('shb_deposit_due') . '%' ); ?></h4>
					<h4><?php echo shb_get_price($summary_total_deposit); ?></h4>
					
					<?php $_SESSION['shb_total_price'] = $summary_total_deposit; ?>
					
				<!-- END .shb-deposit-due -->
				</div>
		
			<?php }
		
		} ?>
		
		<?php if($continue == true) { ?>
		
		<a href="<?php echo $booking_page_url . '?shb-step=' . $next_step; ?>" class="shb-booking-continue"><?php _e('Continue','sohohotel_booking'); ?></a>
		
		<?php } ?>
		
		
		<?php if( ($continue == true) && ($shb_step == 2) ) { ?>
		
		<a href="<?php echo $booking_page_url . '?shb-step=1' ?>" class="shb-booking-add-a-room"><?php _e('Add A Room?','sohohotel_booking'); ?></a>
		
		<?php } ?>
		
	<!-- END .shb-booking-your-stay-wrapper -->
	</div>

<?php }

function shb_select_additionalfee_frontend($shb_get_available_additionalfee_ids) {

	if( (!empty($_POST['shb_accommodation_selected'])) && !empty($_POST['shb_additionalfee_selected']) && (!empty($shb_get_available_additionalfee_ids)) ) {
	
		$c = 1;
	
		if(!empty($shb_get_available_additionalfee_ids[$_POST['shb_accommodation_selected']][$_POST['shb_additionalfee_selected']])) {
			
			$accommodation_key = $_POST['shb_accommodation_selected'];
			$additionalfee_id = $_POST['shb_additionalfee_selected'];
			
			if(!empty($_SESSION['shb_booking_data'])) {
				$shb_booking_data = $_SESSION['shb_booking_data'];
			} else {
				$shb_booking_data = array();
			}
		
			if(!empty($shb_booking_data[$accommodation_key]['additionalfee'])) {
				$c = count($shb_booking_data[$accommodation_key]['additionalfee']) + 1;
			} 
		
			$guests_total = array_sum($shb_booking_data[$accommodation_key]['guests']);
			$nights = $shb_booking_data[$accommodation_key]['nights'];
			$additionalfee_meta = get_post_meta($additionalfee_id);
			
			if($additionalfee_meta['shb_price'][0] == 0) {
				
				$price = 0;
				
			} else {
				
				if($additionalfee_meta['shb_charge'][0] == 'per_room') {
					$charge_price = $additionalfee_meta['shb_price'][0];
				} elseif($additionalfee_meta['shb_charge'][0] == 'per_person') {
					$charge_price = $additionalfee_meta['shb_price'][0] * $guests_total;
				}
	
				if($additionalfee_meta['shb_per'][0] == 'night') {
					$per_price = $charge_price * $nights;
				} elseif($additionalfee_meta['shb_per'][0] == 'booking') {
					$per_price = $charge_price;
				}
	
				if( !empty($_POST['shb_additionalfee_qty_' . $additionalfee_id . '_' . $accommodation_key]) ) {
					$price = $per_price * $_POST['shb_additionalfee_qty_' . $additionalfee_id . '_' . $accommodation_key];
				} else {
					$price = $per_price;
				}
				
			}
			
			$shb_booking_data[$accommodation_key]['additionalfee'][$c]['additionalfee_id'] = $additionalfee_id;
			$shb_booking_data[$accommodation_key]['additionalfee'][$c]['price'] = $price;
			
			// Quantity
			if( !empty($_POST['shb_additionalfee_qty_' . $additionalfee_id . '_' . $accommodation_key]) ) {
				$shb_booking_data[$accommodation_key]['additionalfee'][$c]['qty'] = $_POST['shb_additionalfee_qty_' . $additionalfee_id . '_' . $accommodation_key];
			}
			
			// Date
			if( !empty($_POST['shb_additionalfee_date_' . $additionalfee_id . '_' . $accommodation_key]) ) {
				$shb_booking_data[$accommodation_key]['additionalfee'][$c]['date'] = $_POST['shb_additionalfee_date_' . $additionalfee_id . '_' . $accommodation_key];
			}
			
			// Time
			if( (!empty($_POST['shb_additionalfee_time_hour_' . $additionalfee_id . '_' . $accommodation_key])) && !empty($_POST['shb_additionalfee_time_min_' . $additionalfee_id . '_' . $accommodation_key]) ) {
				$shb_booking_data[$accommodation_key]['additionalfee'][$c]['time'] = $_POST['shb_additionalfee_time_hour_' . $additionalfee_id . '_' . $accommodation_key] . ':' . $_POST['shb_additionalfee_time_min_' . $additionalfee_id . '_' . $accommodation_key];
			}
			
			// Custom input
			if( !empty($_POST['shb_additionalfee_custom_input_' . $additionalfee_id . '_' . $accommodation_key]) ) {
				$shb_booking_data[$accommodation_key]['additionalfee'][$c]['custom_input'] = $_POST['shb_additionalfee_custom_input_' . $additionalfee_id . '_' . $accommodation_key];
			}
			
			// Custom select
			if( !empty($_POST['shb_additionalfee_custom_select_' . $additionalfee_id . '_' . $accommodation_key]) ) {
				$shb_booking_data[$accommodation_key]['additionalfee'][$c]['custom_select'] = $_POST['shb_additionalfee_custom_select_' . $additionalfee_id . '_' . $accommodation_key];
			}
			
			$_SESSION['shb_booking_data'] = $shb_booking_data;
		
		}
	
	}

}

function shb_booking_step_2() { ?>
	
	<?php
	
	shb_delete_additionalfee_frontend();
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if(!empty($_SESSION['shb_booking_data'])) {
		$shb_get_available_additionalfee_ids = shb_get_available_additionalfee_ids($_SESSION['shb_booking_data']);
		shb_select_additionalfee_frontend($shb_get_available_additionalfee_ids);
	}; 

	?>
	
	<!-- BEGIN .shb-booking-page-wrapper -->
	<div class="shb-booking-page-wrapper shb-clearfix <?php echo shb_get_booking_step_class(); ?>">
		
		<!-- BEGIN .shb-booking-page-main -->
		<div class="shb-booking-page-main">
			
			<?php echo shb_booking_steps(2); ?>
			
			<?php 
			echo '<div class="shb-mobile-sidebar">';
			echo shb_booking_page_sidebar('');
			echo '</div>';
			?>
			
			<?php $selected_fee_room = 1;
				
				if(!empty($_GET['shb_selected_fee_room'])) {
					
					if(!empty($_SESSION['shb_booking_data'][$_GET['shb_selected_fee_room']])) {
						$selected_fee_room = $_GET['shb_selected_fee_room'];
					}
					
				}
			?>
			
			<?php if( !empty($_SESSION['shb_booking_data'][1]) ) { ?>
			
			<!-- BEGIN .shb-additionalfee-room-select-wrapper -->
			<div class="shb-additionalfee-room-select-wrapper">
				
				<p><?php _e('Select add-ons for','sohohotel_booking'); ?>:<span class="shb-additionalfee-nav">
					
					<?php
						
					foreach($_SESSION['shb_booking_data'] as $accommodation_key => $accommodation_data) { 
						
						if($selected_fee_room == $accommodation_key) {
							echo '<span>' . __('Room','sohohotel_booking') . ' ' . $accommodation_key . '</span>';
						} else {
							echo '<span><a href="' . $booking_page_url . '?shb-step=2&shb_selected_fee_room=' . $accommodation_key . '">' . __('Room','sohohotel_booking') . ' ' . $accommodation_key . '</a></span>';
						}
						
					}
						
					?>
					
				</span></p>
				
			<!-- END .shb-additionalfee-room-select-wrapper -->
			</div>
			
			<?php } ?>

			<?php if(!empty($shb_get_available_additionalfee_ids[$selected_fee_room])) { ?>
				
			<!-- BEGIN .shb-additionalfee-result-wrapper -->
			<form class="shb-additionalfee-result-wrapper" action="<?php echo $booking_page_url; ?>?shb-step=2&shb_selected_fee_room=<?php echo $selected_fee_room; ?>" method="post">
			
				<?php foreach($shb_get_available_additionalfee_ids[$selected_fee_room] as $accommodation_key => $additionalfee_id) { 
				
					if(get_post_meta($additionalfee_id,'shb_optional',TRUE) == 'yes') { ?>
					
						<!-- BEGIN .shb-additionalfee-result-item -->
						<div class="shb-additionalfee-result-item shb-clearfix">
					
							<?php if( has_post_thumbnail($additionalfee_id) ) { ?>
						
								<div class="shb-additionalfee-image">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($additionalfee_id), 'shb-thumbnail-2' ); ?>
									<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title($additionalfee_id) . '" />'; ?>
								</div>
						
							<?php } ?>
					
							<!-- BEGIN .shb-additionalfee-info -->
							<div class="shb-additionalfee-info">
						
								<h3><?php echo get_the_title($additionalfee_id); ?></h3>
								
								<?php $additionalfee_content = get_post_field('post_content', $additionalfee_id);
									
								$additionalfee_content_len = strlen($additionalfee_content);
									
								if($additionalfee_content_len > 220) { ?>
										
									<div class="shb-expand-wrapper">
							
										<div class="shb-expand-small">
								
											<?php echo $additionalfee_content; ?>
								
										</div>
							
										<a href="#" class="shb-expand-button"><?php _e('Read More','sohohotel_booking'); ?> <i class="fas fa-chevron-down"></i></a>
										<a href="#" class="shb-expand-button-hidden"><?php _e('Read Less','sohohotel_booking'); ?> <i class="fas fa-chevron-up"></i></a>
							
									</div>
										
								<?php } else { ?>
										
										<?php echo $additionalfee_content; ?>
										
								<?php } ?>
						
								<!-- BEGIN .shb-additionalfee-info-form -->
								<div class="shb-additionalfee-info-form">
							
									<?php if(get_post_meta($additionalfee_id,'shb_qty_select',TRUE) == 'yes') { ?>
							
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section">
								
										<label><?php echo get_post_meta($additionalfee_id,'shb_qty_name',TRUE); ?></label>
								
										<div class="sohohotel-select-wrapper">
											<select name="<?php echo 'shb_additionalfee_qty_' . $additionalfee_id . '_' . $selected_fee_room; ?>">
												
												<?php 
												
												$qty_min = get_post_meta($additionalfee_id,'shb_qty_min',TRUE);
												$qty_max = get_post_meta($additionalfee_id,'shb_qty_max',TRUE);
												
												foreach (range($qty_min, $qty_max) as $r) { ?>
												
													<option><?php echo $r; ?></option>
												
												<?php } ?>
												
											</select>
											<i class="fas fa-chevron-down"></i>
										</div>
							
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
									<?php } ?>
							
									<?php if(get_post_meta($additionalfee_id,'shb_select_date',TRUE) == 'yes') { ?>
							
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section">
								
										<label><?php _e('Date','sohohotel_booking'); ?></label>
										<input type="text" class="shb-datepicker" />
										<input type="hidden" class="shb-datepicker-alt" name="<?php echo 'shb_additionalfee_date_' . $additionalfee_id . '_' . $selected_fee_room; ?>" />
							
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
									<?php } ?>
							
									<?php if(get_post_meta($additionalfee_id,'shb_select_time',TRUE) == 'yes') { ?>
							
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section">
								
										<label><?php _e('Time','sohohotel_booking'); ?></label>
				
										<div class="shb-additionalfee-time shb-clearfix">
								
											<div class="sohohotel-select-wrapper">
												<select name="<?php echo 'shb_additionalfee_time_hour_' . $additionalfee_id . '_' . $selected_fee_room; ?>">
													
													<?php foreach (range(0, 23) as $r) { ?>
														
														<option><?php echo sprintf("%02d", $r); ?></option>
												
													<?php } ?>
													
												</select>
												<i class="fas fa-chevron-down"></i>
											</div>
									
											<div class="sohohotel-select-wrapper">
												<select name="<?php echo 'shb_additionalfee_time_min_' . $additionalfee_id . '_' . $selected_fee_room; ?>">
													
													<?php foreach (range(0, 59) as $r) { ?>
												
														<option><?php echo sprintf("%02d", $r); ?></option>
												
													<?php } ?>
													
												</select>
												<i class="fas fa-chevron-down"></i>
											</div>
								
										</div>
							
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
									<?php } ?>
									
									<?php if(!empty(get_post_meta($additionalfee_id,'shb_custom_text_input_name',TRUE))) { ?>
							
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section">
								
										<label><?php echo get_post_meta($additionalfee_id,'shb_custom_text_input_name',TRUE); ?></label>
								
										<textarea name="<?php echo 'shb_additionalfee_custom_input_' . $additionalfee_id . '_' . $selected_fee_room; ?>"></textarea>
							
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
									<?php } ?>
									
									<?php if( (!empty(get_post_meta($additionalfee_id,'shb_custom_select_name',TRUE))) && (!empty(get_post_meta($additionalfee_id,'shb_custom_select_options',TRUE))) ) { ?>
							
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section">
								
										<label><?php echo get_post_meta($additionalfee_id,'shb_custom_select_name',TRUE); ?></label>
								
										<?php
											
											$custom_select_options = get_post_meta($additionalfee_id,'shb_custom_select_options',TRUE);
											$custom_select_options_exp = explode('|',$custom_select_options);
											
											$i = 0;
											foreach($custom_select_options_exp as $key => $val) {
												$i++;
												$custom_select_options_arr[$i] = $val;
											}
											
										?>
										
										<div class="sohohotel-select-wrapper">
											<select name="<?php echo 'shb_additionalfee_custom_select_' . $additionalfee_id . '_' . $selected_fee_room; ?>">
												
												<?php foreach($custom_select_options_arr as $key => $val) { ?>
											
													<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
											
												<?php } ?>
												
											</select>
											<i class="fas fa-chevron-down"></i>
										</div>
										
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
									<?php } ?>
									
									<!-- BEGIN .shb-additionalfee-info-form-section -->
									<div class="shb-additionalfee-info-form-section shb-clearfix">
								
										<input type="submit" value="<?php _e('Select','sohohotel_booking'); ?>" class="shb-select-additionalfee" data-additionalfee="<?php echo $additionalfee_id; ?>" data-accommodationkey="<?php echo $selected_fee_room; ?>" />
										
										<div class="shb-additionalfee-price">
											<span><?php echo shb_get_price(get_post_meta($additionalfee_id,'shb_price',TRUE)); ?></span>
											<span><?php echo get_post_meta($additionalfee_id,'shb_price_name',TRUE); ?></span>
										</div>
							
									<!-- END .shb-additionalfee-info-form-section -->
									</div>
							
								<!-- END .shb-additionalfee-info-form -->
								</div>
						
							<!-- END .shb-additionalfee-info -->
							</div>
				
						<!-- END .shb-additionalfee-result-item -->
						</div>
					
					<?php } ?>
				
				<?php } ?>
			
			<!-- END .shb-booking-additionalfee-result-wrapper -->
			</form>
			
			<?php } else {
				
				echo '<p>' . __('No add-ons available','sohohotel_booking') . '</p>';
				
			} ?>
			
		<!-- END .shb-booking-page-main -->
		</div>
		
		<!-- BEGIN .shb-booking-page-sidebar -->
		<div class="shb-booking-page-sidebar">
			
			<?php echo shb_booking_page_sidebar(''); ?>
			
		<!-- END .shb-booking-page-sidebar -->
		</div>
		
	<!-- END .shb-booking-page-wrapper -->
	</div>
	
<?php }

function shb_booking_step_3() { ?>
	
	<?php
	
	shb_delete_additionalfee_frontend();
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if(!empty($_SESSION['shb_booking_data'])) {
		$shb_get_available_additionalfee_ids = shb_get_available_additionalfee_ids($_SESSION['shb_booking_data']);
		shb_select_additionalfee_frontend($shb_get_available_additionalfee_ids);
	}; 
	
	?>
	
	<!-- BEGIN .shb-booking-page-wrapper -->
	<div class="shb-booking-page-wrapper shb-clearfix <?php echo shb_get_booking_step_class(); ?>">
		
		<!-- BEGIN .shb-booking-page-main -->
		<div class="shb-booking-page-main">
			
			<?php echo shb_booking_steps(3); ?>
			
			<?php 
			echo '<div class="shb-mobile-sidebar">';
			echo shb_booking_page_sidebar('');
			echo '</div>';
			?>
			
			<?php if( !empty($_SESSION['shb_booking_data'][1]) ) {
				echo do_shortcode('[woocommerce_checkout]');
			} else {
				echo '<p>' . __('Please select at least one room before checking out','sohohotel_booking') . '</p>';
			} ?>
			
		<!-- END .shb-booking-page-main -->
		</div>
		
		<!-- BEGIN .shb-booking-page-sidebar -->
		<div class="shb-booking-page-sidebar">
			
			<?php echo shb_booking_page_sidebar(''); ?>
			
		<!-- END .shb-booking-page-sidebar -->
		</div>
		
	<!-- END .shb-booking-page-wrapper -->
	</div>
	
<?php }

function shb_payment_link() {
	
	// If booking is created in WordPress dashboard and customer is sent payment link, do not create booking
	if(!empty($_GET['key'])) {
		$order_id = wc_get_order_id_by_order_key( $_GET['key'] );
	}
	
	$args = array(
	    'post_type'      => 'shb_booking',
	    'posts_per_page' => -1,
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		
	    while ($query->have_posts()) {
	        $query->the_post();
	        $post_id = get_the_ID();
	        $shb_get_all_ids[$post_id] = $post_id;
	    }

	    wp_reset_postdata();
		
	}

	foreach($shb_get_all_ids as $id) {
		
		if(get_post_meta($id,'shb_woocommerce_id',TRUE) == $order_id) {
			$booking_id = $id;
			update_post_meta($order_id,'shb_booking_id',$booking_id);
			break;
		}
	
	}
	
}

function shb_booking_step_4() {
	
	shb_payment_link();
	
	if(!empty(get_option('shb_manual_booking_confirmation'))) {
		$booking_confirmation = get_option('shb_manual_booking_confirmation');
	} else {
		$booking_confirmation = 'automatic';
	}
	
	$get_wc_order_status = '';
	
	if(!empty($_GET['key'])) {
		$get_order_id = wc_get_order_id_by_order_key( $_GET['key'] );
		$get_wc_order = wc_get_order( $get_order_id );
		$get_wc_order_status = $get_wc_order->get_status();
	}
	
	if ($get_wc_order_status == 'failed') {
		echo '<p class="shb-booking-error-4">Error, payment failed</p>';
	} else {
		
		if(!empty($_GET['key'])) {
			$order_id = wc_get_order_id_by_order_key( $_GET['key'] );
			$booking_id = get_post_meta($order_id,'shb_booking_id',TRUE);
		}
	
		if( !empty($order_id) ) {
		
			if(empty($booking_id)) {
				
				$order = wc_get_order($order_id);
			
				if ($order) {
					$billing_address = $order->get_address('billing');
				}
				
				if($booking_confirmation == 'automatic') {
					$booking_data['status'] = 'shb_confirmed';
				} else {
					$booking_data['status'] = 'shb_pending';
				}
			
				$booking_data['woocommerce_id'] = $order_id;
				$booking_data['woocommerce_price'] = $_SESSION['shb_total_price'];
				$booking_data['booking_data'] = $_SESSION['shb_booking_data'];
	
				$booking_data['custom_form']['shb_custom_form_first_name'] = esc_html($billing_address['first_name']);
				$booking_data['custom_form']['shb_custom_form_last_name'] = esc_html($billing_address['last_name']);
				$booking_data['custom_form']['shb_custom_form_email'] = esc_html($order->get_billing_email());
				$booking_data['custom_form']['shb_custom_form_phone'] = esc_html($order->get_billing_phone());
			
				if(function_exists('shb_add_new_booking_translate')){
				
					$booking_id = shb_add_new_booking_translate($booking_data);
				
				} else {
				
					$booking_id = shb_add_new_booking($booking_data);
				
				}
			
				update_post_meta($order_id,'shb_booking_id',$booking_id);
	
				$_SESSION['shb_booking_data'] = '';
		
			}
		
			if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
				$current_blog_id = get_current_blog_id();
				switch_to_blog(1);
				$email = get_post_meta($booking_id,'shb_custom_form_email',TRUE);
				switch_to_blog($current_blog_id);
			} else {
				$email = get_post_meta($booking_id,'shb_custom_form_email',TRUE);
			}
	
			?>

			<?php if( (!empty($booking_data['woocommerce_id'])) || (!empty($order_id)) ) {
			
				if(!empty($booking_data['woocommerce_id'])) {
					$wc_order_id = $booking_data['woocommerce_id'];
				} else {
					$wc_order_id = $order_id;
				}
				
				$wc_order = wc_get_order( $wc_order_id );
				$wc_order_status  = $wc_order->get_status();
			
				if( ($wc_order_status == 'processing') || ($wc_order_status == 'completed') ) {
					
					if($booking_confirmation == 'automatic') {
						shb_send_booking_email($booking_id,'booking_confirmed','guest');
						shb_send_booking_email($booking_id,'booking_confirmed','admin');
					} else {
						shb_send_booking_email($booking_id,'booking_pending','guest');
						shb_send_booking_email($booking_id,'booking_pending','admin');
					}
					
					if($booking_confirmation == 'automatic') {
						$status = 'shb_confirmed';
					} else {
						$status = 'shb_pending';
					}
					
				} else {
					$status = 'shb_pending';
				}
			
				if( (function_exists('switch_to_blog')) && function_exists('sh_translate') ){ 
				
					$current_blog_id = get_current_blog_id();
					switch_to_blog(1);
				
					$booking = array( 'ID' => $booking_id, 'post_status' => $status );
					wp_update_post($booking);
				
					switch_to_blog($current_blog_id);
				
				} else {
				
					$booking = array( 'ID' => $booking_id, 'post_status' => $status );
					wp_update_post($booking);
				
				}
			
			
			} ?>
		
			<!-- BEGIN .shb-booking-page-wrapper -->
			<div class="shb-booking-page-wrapper shb-clearfix <?php echo shb_get_booking_step_class(); ?>">
		
				<!-- BEGIN .shb-booking-page-main -->
				<div class="shb-booking-page-main shb-booking-complete-step">
			
					<!-- BEGIN .shb-booking-complete-wrapper -->
					<div class="shb-booking-complete-wrapper">
				
						<i class="fas fa-check"></i>
						<h3><?php _e('Booking Complete!','sohohotel_booking')?> (#<?php echo $booking_id; ?>)</h3>
			
					<!-- END .shb-booking-complete-wrapper -->
					</div>
			
					<!-- BEGIN .shb-booking-notification-wrapper -->
					<div class="shb-booking-notification-wrapper">
				
						<p><i class="fas fa-envelope"></i><?php echo sprintf( __( 'A confirmation email has been sent to %s', 'sohohotel_booking' ), $email ); ?></p>
			
					<!-- END .shb-booking-notification-wrapper -->
					</div>
			
					<h3 class="sohohotel-title-20px sohohotel-clearfix sohohotel-title-left"><?php _e('Thank You','sohohotel_booking'); ?></h3>
					<p class="shb-booking-confirmation-message"><?php echo get_option('shb_booking_success_message'); ?></p>
			
					<h3 class="sohohotel-title-20px sohohotel-clearfix sohohotel-title-left"><?php _e('Check In','sohohotel_booking'); ?></h3>
					<ul class="shb-booking-checkin-checkout">
						
						<?php $check_in_date = get_post_meta($booking_id,'shb_checkin',TRUE);
						$check_out_date = get_post_meta($booking_id,'shb_checkout',TRUE);
						$check_in_time = get_option('shb_checkin_time');
						$check_out_time = get_option('shb_checkout_time'); ?>
						
						<li><span><?php _e('Check In','sohohotel_booking'); ?>:</span> <?php echo sprintf( __( '%s at %s', 'sohohotel_booking' ), $check_in_date, $check_in_time ); ?></li>
						<li><span><?php _e('Check Out','sohohotel_booking'); ?>:</span> <?php echo sprintf( __( '%s at %s', 'sohohotel_booking' ), $check_out_date, $check_out_time ); ?></li>
						
					</ul>
			
					<h3 class="sohohotel-title-20px sohohotel-clearfix sohohotel-title-left"><?php _e('Find Us','sohohotel_booking'); ?></h3>
					<ul class="sohohotel-contact-details-list">
						<li class="sohohotel-address clearfix"><?php echo get_option('shb_hotel_address'); ?></li>
						<li class="sohohotel-phone clearfix"><a href="tel:<?php echo get_option('shb_hotel_phone'); ?>"><?php echo get_option('shb_hotel_phone'); ?></a></li>
						<li class="sohohotel-email clearfix"><a href="mailto:<?php echo get_option('shb_email_address'); ?>"><?php echo get_option('shb_email_address'); ?></a></li>
					</ul>
			
				<!-- END .shb-booking-page-main -->
				</div>
		
			<!-- END .shb-booking-page-wrapper -->
			</div>
		
		<?php } else {
		
			echo '<p class="shb-booking-error-4">Error, no booking to be processed</p>';
		
		}
		
	}

}

function shb_booking_page_shortcode( $atts, $content = null ) {
	
	ob_start(); 
	
	$pay_for_order = false;
	
	if(!empty($_GET['pay_for_order'])) {
		
		if($_GET['pay_for_order'] == true) {
			$pay_for_order = true;
		}
		
	}
	
	
	if ( class_exists( 'WooCommerce' ) ) {
		
		if(!empty($_GET['key'])) {
			$order_id = wc_get_order_id_by_order_key( $_GET['key'] );
		}
	
		if(!empty($order_id)) {
		
			if($pay_for_order == true) {
				
				echo '<div class="shb-booking-page-wrapper">';
				echo '<div class="shb-booking-page-main shb-booking-complete-step">';
				echo '<div class="woocommerce">';
				echo '<div class="woocommerce-checkout">';
				
				echo do_shortcode('[woocommerce_checkout]');
				
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				
			} else {
				
				$get_wc_order = wc_get_order( $order_id );
				$get_wc_order_status = $get_wc_order->get_status();
				
				if($get_wc_order_status == 'pending') {
					
					echo '<div class="shb-booking-page-wrapper">';
					echo '<div class="shb-booking-page-main shb-booking-complete-step">';
					echo '<div class="woocommerce">';
					echo '<div class="woocommerce-checkout">';
					echo do_shortcode('[woocommerce_checkout]');
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					
				} else {
					
					echo shb_booking_step_4();
					echo '<div style="display: none;">';
					echo do_shortcode('[woocommerce_checkout]');
					echo '</div>';
					
				}
				
			}
			
		} else {
		
			if(!empty($_GET['shb-step'])) {
		
				if($_GET['shb-step'] == 2) {
					echo shb_booking_step_2();
				} elseif($_GET['shb-step'] == 3) {
					echo shb_booking_step_3();
				} elseif($_GET['shb-step'] == 4) {
					echo shb_booking_step_4();
				} else {
					echo shb_booking_step_1();
				}
		
			} else {
				echo shb_booking_step_1();
			}
		
		}
		
	} else {
		
		echo '<p>Please install and activated the "WooCommerce" plugin.</p>';
		
	}
	
	return ob_get_clean();

}

add_shortcode( 'shb_booking_page', 'shb_booking_page_shortcode' );

?>