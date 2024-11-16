<?php

function shb_booking_form_1_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'hotel_selection' => '',
		'button_text' => '',
		'checkin' => '',
		'checkout' => '',
		'preset_guests' => ''
	), $atts ) );
	
	ob_start(); 
	
	$guestclass_ids = shb_get_all_ids('shb_guestclass');
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	}
	
	if ($hotel_selection == true) { 
		$class_num = 5;
	} else {
		$class_num = 4;
	} 
	
	if (empty($button_text)) { 
		$button_text = __('Book Now','sohohotel_booking');
	}
	
	// First load
	$not_first_load = array();
	

	//unset($_SESSION);
	
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
	$guest_qty = $shb_get_guestclass_session['guest_qty'];
	$total_guests = $shb_get_guestclass_session['total_guests'];
	
	?>
	
	<!-- BEGIN .shb-booking-form-style-1 -->
	<form action="<?php echo $booking_page_url; ?>" method="post" class="shb-booking-form-style-1 shb-booking-form-1-column-<?php echo $class_num; ?> shb-clearfix">
	
		<?php if(!empty(get_option('shb_date_format'))) { 
			$date_format = get_option('shb_date_format');
		} else {
			$date_format = 'DD/MM/YYYY';
		}
		
		$shbdp_settings = array(
			'datepicker_first_day' => 1,
			'blocked_dates' => shb_get_blocked_dates_all(),
			'date_format' => $date_format,
			'panels' => 2,
			'inline' => false,
			'show_year_qty' => 1,
			'checkin' => $checkin,
			'checkout' => $checkout
		);
		
		echo shbdp($shbdp_settings);
		
		?>
		
		<?php if ($hotel_selection == true) { ?>
		
			<!-- BEGIN .shb-location-select-dropdown -->
			<div class="shb-location-select-dropdown">
				
				<ul>
					<?php $taxonomy = 'accommodation-categories';
					$terms = get_terms($taxonomy);

					if ( $terms && !is_wp_error( $terms ) ) :

					foreach ( $terms as $term ) { ?>
						<li data-id="<?php echo $term->term_id; ?>" data-name="<?php echo $term->name; ?>" class="shb-location-select"><?php echo $term->name; ?></li>
					        <?php } 
					endif;?>
				</ul>
		
				<input type="hidden" name="shb-location" class="shb-location" value="" />
	
			<!-- END .shb-location-select-dropdown -->
			</div>
		
		<?php } ?>
	
		<!-- BEGIN .shb-guestclass-select-dropdown -->
		<div class="shb-guestclass-select-dropdown">
			
			<?php foreach($guestclass_ids as $guestclass_id) { ?>
				
				<!-- BEGIN .shb-guestclass-select-section -->
				<div class="shb-guestclass-select-section shb-clearfix">
			
					<label><?php echo get_the_title($guestclass_id); ?> <span><?php echo get_post_meta($guestclass_id,'shb_guestclass_description',TRUE); ?></span></label>
			
					<div class="shb-qty-selection shb-clearfix">
						<button type="button" class="shb-qty-decrease">-</button>
						<div class="shb-qty-display"><?php echo $guest_qty[$guestclass_id]; ?></div>
						<button type="button" class="shb-qty-increase">+</button>
					</div>
			
					<input type="hidden" name="shb-guestclass-<?php echo $guestclass_id; ?>" class="shb-guestclass" value="<?php echo $guest_qty[$guestclass_id]; ?>" />
		
				<!-- END .shb-guestclass-select-section -->
				</div>
			
			<?php } ?>
				
			<button type="button" class="shb-qty-done"><?php _e('Ok','sohohotel_booking'); ?></button>
	
		<!-- END .shb-guestclass-select-dropdown -->
		</div>
	 
	 	<?php if ($hotel_selection == true) { ?>
	 
			<!-- BEGIN .shb-booking-form-col -->
			<div class="shb-booking-form-col shb-location-selection shb-clearfix">
			
				<i class="fas fa-map-marker-alt"></i>
				<div class="shb-booking-form-col-field">
					<label><?php _e('Location','sohohotel_booking'); ?></label>
					<span class="shb-location-display"><?php _e('Select a location','sohohotel_booking'); ?></span>
				</div>
			
			<!-- END .shb-booking-form-col -->
			</div>
		
		<?php } ?>
		
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
				<span><span class="shb-guestclass-total"><?php echo $total_guests; ?></span> <?php _e('Guest(s)','sohohotel_booking'); ?></span>
			</div>
			
		<!-- END .shb-booking-form-col -->
		</div>
		
		<!-- BEGIN .shb-booking-form-col -->
		<div class="shb-booking-form-col shb-clearfix">
			
			<input type="submit" value="<?php echo $button_text; ?>" class="shb-booking-form-button" />
			
		<!-- END .shb-booking-form-col -->
		</div>
	
	<!-- END .shb-booking-form-style-1 -->
	</form>
	
	<?php
		
	return ob_get_clean();

}

add_shortcode( 'shb_booking_form_1', 'shb_booking_form_1_shortcode' );

?>