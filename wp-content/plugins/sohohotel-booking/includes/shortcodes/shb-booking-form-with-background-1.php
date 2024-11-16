<?php

function shb_booking_form_with_background_1_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title_1' => '',
		'title_2' => '',
		'background_url' => '',
		'offset' => ''
	), $atts ) );
	
	ob_start(); ?>
	
	<div class="shb-booking-form-with-background-1-wrapper">
		
		<?php if(!empty($offset)) { ?>
			<div class="shb-booking-form-with-background-1" style="height: calc(100vh - <?php echo $offset; ?>);">
		<?php } else { ?>
			<div class="shb-booking-form-with-background-1" style="height: 100vh;">
		<?php } ?>
		
			<div class="shb-booking-form-with-background-1-content">
				<h2><?php echo $title_1; ?></h2>
				<p><?php echo $title_2; ?></p>
			</div>
			<div class="shb-image-overlay"></div>
			<div class="shb-booking-form-with-background-1-image" style="background-image:url(<?php echo wp_get_attachment_image_url( $background_url, 'full'); ?>);"></div>
		</div>

		<?php echo do_shortcode('[shb_booking_form_1]'); ?>
	
	</div>
	
	<?php
		
	return ob_get_clean();

}

add_shortcode( 'shb_booking_form_with_background_1', 'shb_booking_form_with_background_1_shortcode' );

?>