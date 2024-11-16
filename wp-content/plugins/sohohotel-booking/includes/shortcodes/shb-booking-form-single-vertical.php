<?php

function shb_booking_form_single_vertical_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'accommodation_id' => ''
	), $atts ) );
	
	ob_start(); 
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	// Check valid accommodation ID has been entered	
	$accommodation_exists = false;
	
	if(!empty($accommodation_id)) {
		
		if(get_post_status( $accommodation_id ) !== false) {
			
			if( get_post_type($accommodation_id) == 'shb_accommodation' ) {
				$accommodation_exists = true;
			}
			
		}
		
	}
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	} ?>
	
	<?php if($accommodation_exists == true) { ?>
		
		<?php $guest_qty = shb_get_booking_form_single_guest_qty($accommodation_id); ?>
		
		<!-- BEGIN .shb-booking-form-style-1 -->
		<form class="shb-booking-form-style-1 shb-booking-form-style-1-vertical shb-booking-form-1-column-5 shb-clearfix" action="<?php echo $booking_page_url; ?>" method="post">
	
			<?php if(!empty(get_option('shb_date_format'))) { 
				$date_format = get_option('shb_date_format');
			} else {
				$date_format = 'DD/MM/YYYY';
			}
		
			$shbdp_settings = array(
				'datepicker_first_day' => 1,
				'blocked_dates' => shb_get_blocked_dates($accommodation_id),
				'date_format' => $date_format,
				'panels' => 2,
				'inline' => false,
				'show_year_qty' => 1
			);
		
			echo shbdp($shbdp_settings); ?>
	
			<!-- BEGIN .shb-guestclass-select-dropdown -->
			<div class="shb-guestclass-select-dropdown">
			
				<?php foreach($guestclass_ids as $guestclass_id) { ?>
			
					<!-- BEGIN .shb-guestclass-select-section -->
					<div class="shb-guestclass-select-section shb-clearfix">
			
						<label><?php echo get_the_title($guestclass_id); ?> <span><?php echo get_post_meta($guestclass_id,'shb_guestclass_description',TRUE); ?></span></label>
			
						<div class="shb-qty-selection shb-clearfix">
							<button type="button" class="shb-qty-decrease">-</button>
							<div class="shb-qty-display"><?php echo $guest_qty['guests'][$guestclass_id]['min']; ?></div>
							<button type="button" class="shb-qty-increase">+</button>
						</div>
			
						<input type="hidden" name="shb-guestclass-<?php echo $guestclass_id; ?>" class="shb-guestclass" value="<?php echo $guest_qty['guests'][$guestclass_id]['min']; ?>" />
		
					<!-- END .shb-guestclass-select-section -->
					</div>
			
				<?php } ?>
				
				<button type="button" class="shb-qty-done"><?php _e('Ok','sohohotel_booking'); ?></button>
	
			<!-- END .shb-guestclass-select-dropdown -->
			</div>
	 
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-accommodation-selection shb-clearfix">
				
				<i class="fas fa-bed"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Room Type','sohohotel_booking'); ?></label>
					<span title="<?php echo get_the_title($accommodation_id); ?>" class="shb-accommodation-title-wrapper"><?php the_title(); ?></span>
				</div>
		
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shbdp-checkin-wrapper shb-clearfix">
			
				<i class="far fa-calendar"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Check In','sohohotel_booking'); ?></label>
					<span class="shbdp-checkin-display"></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shbdp-checkout-wrapper shb-clearfix">
			
				<i class="far fa-calendar"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Check Out','sohohotel_booking'); ?></label>
					<span class="shbdp-checkout-display"></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-guestclass-selection shb-clearfix">
		
				<i class="fas fa-user-friends"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Guests','sohohotel_booking'); ?></label>
					<span><span class="shb-guestclass-total"><?php echo $guest_qty['total']['min']; ?></span> <?php _e('Guest(s)','sohohotel_booking'); ?></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-clearfix">
				
				<?php $shb_price_intro = get_post_meta($accommodation_id,'shb_price_intro',TRUE);
				$shb_sorting_price = shb_get_price(get_post_meta($accommodation_id,'shb_sorting_price',TRUE));
				$shb_price_intro_display = str_replace('[price]',$shb_sorting_price,$shb_price_intro); ?>
				
				<input type="submit" value="<?php echo $shb_price_intro_display; ?>" class="shb-booking-form-button" />
				<input type="hidden" name="shb-single-accommodation-id" value="<?php echo $accommodation_id; ?>" />
			
			<!-- END .shb-booking-form-col -->
			</div>
	
		<!-- END .shb-booking-form-style-1 -->
		</form>
	
	<?php } else { 
		
		echo '<p>' . __('Please enter a valid accommodation ID to display the booking form.','sohohotel_booking') . '</p>';
		
	}?>
	
	<?php
		
	return ob_get_clean();

}

add_shortcode( 'shb_booking_form_single_vertical', 'shb_booking_form_single_vertical_shortcode' );

?>