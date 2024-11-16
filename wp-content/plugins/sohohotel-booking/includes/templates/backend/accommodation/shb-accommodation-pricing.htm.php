<?php

function shb_price_fields($data) {
	
	$o = '';
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	$days = shb_day_names('short');
		
	if(!empty(get_post_meta($data['id'],'shb_pricing',TRUE))) {
		$shb_pricing = get_post_meta($data['id'],'shb_pricing',TRUE);
	} else {
		$shb_pricing = '';
	}
	
	$o .= '<div class="shb-day-column-wrapper shb-clearfix">';
	
	if(get_post_meta($data['id'],'shb_price_scheme',TRUE) == 'per_room') {	
		$guestclass_ids = array('room');
		$shb_min = 0;
		$shb_max = 1;
	} 
	
	foreach($guestclass_ids as $guestclass_id) {
		
		$o .= '<div class="shb-gustclass-column-wrapper shb-clearfix">';
		
		if(!empty(get_post_meta($data['id'],'shb_' . $guestclass_id . '_min',TRUE))) {
			$shb_min = get_post_meta($data['id'],'shb_' . $guestclass_id . '_min',TRUE);
		} else {
			$shb_min = 1;
		}
		
		if(!empty(get_post_meta($data['id'],'shb_' . $guestclass_id . '_max',TRUE))) {
			$shb_max = get_post_meta($data['id'],'shb_' . $guestclass_id . '_max',TRUE);
		} else {
			$shb_max = 1;
		}
		
		foreach (range($shb_min, $shb_max) as $guestclass_qty) {
			
			if($guestclass_qty > 1) {
				$guestclass_title = get_post_meta($guestclass_id,'shb_guestclass_title_plural',TRUE);
			} else {
				$guestclass_title = get_the_title($guestclass_id);
			}
			
			$o .= '<div class="shb-gustclass-column shb-clearfix">';
			
			if(get_post_meta($data['id'],'shb_price_scheme',TRUE) == 'per_room') {
				$o .= '<label>' . __('Room','sohohotel_booking') . ' (' . shb_get_currency_symbol() . ')</label>';
			} else {
				$o .= '<label>' . $guestclass_qty . ' ' . $guestclass_title . ' (' . shb_get_currency_symbol() . ')</label>';
			}
		
			foreach($days as $day_key => $day_val) {
		
				if(!empty($shb_pricing[$data['fields']['rate_id']][$data['fields']['season_id']][$data['fields']['ratevariation_id']][$day_key][$guestclass_id][$guestclass_qty])) {
					$value = $shb_pricing[$data['fields']['rate_id']][$data['fields']['season_id']][$data['fields']['ratevariation_id']][$day_key][$guestclass_id][$guestclass_qty];
				} else {
					$value = '';
				}
				
				$o .= '<div class="shb-day-column">';
				$o .= '<label>' . $day_val . '</label>';
				$o .= '<input type="text" name="shb_pricing[' . $data['fields']['rate_id']  . '][' . $data['fields']['season_id'] . '][' . $data['fields']['ratevariation_id'] . '][' . $day_key . '][' . $guestclass_id . '][' . $guestclass_qty . ']" value="' . $value . '" />';
				$o .= '</div>';
	
			}
		
			$o .= '</div>';
		
		}
		
		$o .= '</div>';
		
	}
	
	$o .= '</div>';
	
	return $o;
	
}

$tab_array = array();
$rate_ids = shb_get_all_ids('shb_rate');
$season_ids = shb_get_all_ids('shb_season');
$ratevariation_ids = shb_get_all_ids('shb_ratevariation');

$season_ids['default'] = 'default';

foreach($rate_ids as $rate_key => $rate_id) {
	
	if( get_post_meta($rate_id,'shb_accommodation_rate',TRUE) == get_the_id() ) {
		$tab_array[$rate_id]['default']['default'] = 'default';	
		foreach($season_ids as $season_key => $season_id) {
			
			if($season_id == 'default') {
				
				foreach($ratevariation_ids as $ratevariation_key => $ratevariation_id) {
					if(!empty(get_post_meta($ratevariation_id,'shb_accommodation_rate_' . get_the_id() . '_' . $rate_id,TRUE))) {	
						if(!empty(get_post_meta($ratevariation_id,'shb_season_default',TRUE))) {
							$tab_array[$rate_id]['default'][$ratevariation_id] = $ratevariation_id;
						}
					}
				}
				
			}
			
			if(!empty(get_post_meta($season_id,'shb_accommodation_rate_' . get_the_id() . '_' . $rate_id,TRUE))) {
				$tab_array[$rate_id][$season_id]['default'] = 'default';
				foreach($ratevariation_ids as $ratevariation_key => $ratevariation_id) {
					if(!empty(get_post_meta($ratevariation_id,'shb_accommodation_rate_' . get_the_id() . '_' . $rate_id,TRUE))) {	
						if(!empty(get_post_meta($ratevariation_id,'shb_season_' . $season_id,TRUE))) {
							$tab_array[$rate_id][$season_id][$ratevariation_id] = $ratevariation_id;
						}
					}
				}
			} 
			
		}
	}	
}

?>

<?php if(!empty(get_post_meta(get_the_id(),'shb_price_scheme',TRUE))) { ?>
	
	<?php if(!empty($tab_array)) { ?>

		<!-- BEGIN .shb-select-tab-wrapper -->
		<div class="shb-select-tab-wrapper">
	
			<label for="shb-rate-select"><?php _e('Rate','sohohotel_booking'); ?></label>
			<select name="shb-rate-select" class="shb-select-tab">
				<?php foreach($tab_array as $rate_id => $season_id) { ?>
					<option value="shb-rate-<?php echo $rate_id; ?>"><?php echo get_the_title($rate_id); ?></option>
				<?php } ?>
			</select>
	
			<?php foreach($tab_array as $rate_id => $season_id) { ?>
				<div class="shb-rate-<?php echo $rate_id; ?> shb-select-tab-section">
			
					<!-- BEGIN .shb-select-tab-wrapper -->
					<div class="shb-select-tab-wrapper">

						<label for="shb-season-select"><?php _e('Season','sohohotel_booking'); ?></label>
						<select name="shb-season-select" class="shb-select-tab">
							<?php foreach($season_id as $season_id2 => $ratevariation_id) { ?>
								<?php if($season_id2 == 'default') {
									$title = __('Default','sohohotel_booking');
								} else {
									$title = get_the_title($season_id2) . ' (' . shb_get_date(get_post_meta($season_id2,'shb_start_date_alt',TRUE)) . ' - ' . shb_get_date(get_post_meta($season_id2,'shb_end_date_alt',TRUE)) . ')';
								} ?>
								<option value="shb-season-<?php echo $season_id2; ?>"><?php echo $title; ?></option>
							<?php } ?>
						</select>

						<?php foreach($season_id as $season_id2 => $ratevariation_id) { ?>
							<div class="shb-season-<?php echo $season_id2; ?> shb-select-tab-section">
						
								<!-- BEGIN .shb-select-tab-wrapper -->
								<div class="shb-select-tab-wrapper shb-select-price-wrapper">

									<label for="shb-price-select"><?php _e('Price','sohohotel_booking'); ?></label>
									<select name="shb-price-select" class="shb-select-tab">
										<?php foreach($ratevariation_id as $ratevariation_id2) { ?>
											<?php if($ratevariation_id2 == 'default') {
												$title2 = __('Default','sohohotel_booking');
											} else {
										
												$type_value = get_post_meta($ratevariation_id2,'shb_type',TRUE);
												$night_value = get_post_meta($ratevariation_id2,'shb_applied_to',TRUE);
										
												if($type_value == 'duration') {
													$ratevariation_type = sprintf( __( 'Duration: %d night(s) or more', 'sohohotel_booking' ), $night_value );
												} elseif($type_value == 'early') {
													$ratevariation_type = sprintf( __( 'Early: %d night(s) or more until check in date', 'sohohotel_booking' ), $night_value );
												} elseif($type_value == 'late') {
													$ratevariation_type = sprintf( __( 'Late: %d night(s) or less until check in date', 'sohohotel_booking' ), $night_value );
												}
										
												$title2 = get_the_title($ratevariation_id2) . ' - ' . $ratevariation_type;
									
											} ?>
											<option value="shb-price-<?php echo $ratevariation_id2; ?>"><?php echo $title2; ?></option>
										<?php } ?>
									</select>

									<?php foreach($ratevariation_id as $ratevariation_id2) { ?>
										<div class="shb-price-<?php echo $ratevariation_id2; ?> shb-select-tab-section">
									
											<?php $data['id'] = get_the_id();
											$data['fields']['rate_id'] = $rate_id;
											$data['fields']['season_id'] = $season_id2;
											$data['fields']['ratevariation_id'] = $ratevariation_id2;
											echo shb_price_fields($data); ?>
									
										</div>
									<?php } ?>

								<!-- END .shb-select-tab-wrapper -->
								</div>
							
							</div>
						<?php } ?>

					<!-- END .shb-select-tab-wrapper -->
					</div>
				
				</div>
			<?php } ?>

		<!-- END .shb-select-tab-wrapper -->
		</div>

	<?php } else { ?>
	
		<p><?php _e('Go to "Hotel Booking > Rates" and add this accommodation to an existing rate, or create a new one.','sohohotel_booking')?></p>
	
	<?php } ?>

<?php } else { ?>
	
	<p><?php _e('You must set the "Accommodation Settings" above and publish the accommodation before you can enter prices.','sohohotel_booking')?></p>
	
<?php } ?>