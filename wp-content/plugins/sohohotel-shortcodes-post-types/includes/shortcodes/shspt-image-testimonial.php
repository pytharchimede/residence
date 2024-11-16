<?php

function sohohotel_image_testimonial_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'type' => '',
		'image' => '',
		'guest' => '',
	), $atts ) );
	
	if ( $button_target == '2' ) {
		$button_target_val = '';
	} else {
		$button_target_val = ' target="_blank"';
	}
	
	if ( $type == '2' ) {
		$type_val = 'sohohotel-image-text-wrapper-right-align';
	} else {
		$type_val = 'sohohotel-image-text-wrapper-left-align';
	}
	
	$output = '<section class="sohohotel-image-text-wrapper sohohotel-clearfix ' . $type_val . '">';
	$output .= '<div class="sohohotel-it-image-wrapper" style="background-image:url(' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . ');">';
	$output .= '<img src="' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . '" alt="" />';
	$output .= '</div>';
	$output .= '<div class="sohohotel-it-text-wrapper">';
	$output .= '<h3 class="sohohotel-title-28px sohohotel-clearfix sohohotel-title-left">' . $title . '</h3>';
	$output .= '<p>' . $content . '</p>';
	$output .= '<a' . $button_target_val . ' href="' . $button_url . '" class="sohohotel-button1">' . $button_text . '</a>';
	$output .= '</div>';
	$output .= '</section>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_image_testimonial', 'sohohotel_image_testimonial_shortcode' );

?>