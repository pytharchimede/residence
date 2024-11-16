<?php

function sohohotel_call_to_action_large_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'background_url' => '',
		'title' => '',
		'text' => '',
		'button_text' => '',
		'button_url' => ''
	), $atts ) );
	
	$output = '<section class="sohohotel-clearfix sohohotel-call-to-action-2-section" style="background-image:url(' . wp_get_attachment_image_url( $background_url, 'sohohotel-image-style9') . ');">
		
		<div class="sohohotel-call-to-action-overlay"></div>
		
		<div class="sohohotel-call-to-action-2-section-inner">

			<h3>' . $title . '</h3>
			<p>' . $content . '</p>
			<a href="' . $button_url . '" class="sohohotel-button1">' . $button_text . '</a>

		</div>
		
	</section>';

	return $output;
	
}

add_shortcode( 'sohohotel_call_to_action_large', 'sohohotel_call_to_action_large_shortcode' );

?>