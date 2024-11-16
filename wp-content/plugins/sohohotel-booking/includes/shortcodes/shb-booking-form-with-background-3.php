<?php

function shb_booking_form_with_background_3_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title_1' => '',
		'title_2' => '',
		'background_url' => '',
		'offset' => ''
	), $atts ) );
	
	ob_start(); 
	
	if(!empty(get_option('shb_booking_page'))) {
		$booking_page_url = get_permalink(get_option('shb_booking_page'));
	} else {
		$booking_page_url = '';
	} ?>
	
	<div class="shb-booking-form-with-background-3-wrapper">
		
		<?php if(!empty($offset)) { ?>
			<div class="shb-booking-form-with-background-3" style="height: calc(100vh - <?php echo $offset; ?>);">
		<?php } else { ?>
			<div class="shb-booking-form-with-background-3" style="height: 100vh;">
		<?php } ?>
		
			<div class="shb-booking-form-with-background-3-content">
				<h2><?php echo $title_1; ?></h2>
				<p><?php echo $title_2; ?></p>
			</div>
			<div class="shb-image-overlay"></div>
			<div class="shb-booking-form-with-background-3-image" style="background-image:url(<?php echo wp_get_attachment_image_url( $background_url, 'full'); ?>);"></div>
		</div>
		
		<div class="shb-booking-form-wrapper">
			
			<form action="<?php echo $booking_page_url; ?>" method="post" class="shb-booking-form-wrapper-inner">
			
				<?php if(!empty(get_option('shb_date_format'))) { 
					$date_format = get_option('shb_date_format');
				} else {
					$date_format = 'DD/MM/YYYY';
				}
		
				$shbdp_settings = array(
					'datepicker_first_day' => 1,
					'blocked_dates' => shb_get_blocked_dates_all(),
					'date_format' => $date_format,
					'panels' => 1,
					'inline' => true,
					'show_year_qty' => 1,
					'checkin' => '',
					'checkout' => ''
				);
		
				echo shbdp($shbdp_settings);
		
				?>
			
				<input type="submit" value="<?php _e('Book Now','sohohotel_booking'); ?>" class="shb-booking-form-button-1" />
				
			</form>
			
		</div>
		
	</div>
	
	<?php
		
	return ob_get_clean();

}

add_shortcode( 'shb_booking_form_with_background_3', 'shb_booking_form_with_background_3_shortcode' );

?>