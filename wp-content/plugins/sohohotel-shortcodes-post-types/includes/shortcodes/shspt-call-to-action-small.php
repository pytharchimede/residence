<?php

function sohohotel_call_to_action_small_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'background_url' => '',
		'text' => '',
		'button_text' => '',
		'button_url' => ''
	), $atts ) );
	
	$output = '<section class="sohohotel-clearfix sohohotel-call-to-action-1-section" style="background-image:url(' . wp_get_attachment_image_url( $background_url, 'full-image') . ');">
		
		<div class="sohohotel-call-to-action-overlay"></div>
		
		<div class="sohohotel-call-to-action-1-section-inner sohohotel-clearfix">
			
			<h3>' . $text . '</h3>
			<a href="' . $button_url . '" class="sohohotel-button1">' . $button_text . '</a>

		</div>

	</section>';

	return $output;
	
}

add_shortcode( 'sohohotel_call_to_action_small', 'sohohotel_call_to_action_small_shortcode' );

?>