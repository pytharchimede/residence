<?php

function sohohotel_single_testimonial_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'image_url' => '',
		'guest_name' => '',
		'align' => '',
		'background_color' => '',
		'primary_text_color' => '',
		'secondary_text_color' => '',
	), $atts ) );
	
	$image_info = wp_get_attachment_image_src($image_url,'full-image');
	
	if($image_info[1] < 1920) {
		$width = 960;
		$height = 550;
	} else {
		$width = $image_info[1] / 2;
		$height = $image_info[2] / 2;
	}
	
	$output = '<div class="sohohotel-single-testimonial-text-image-wrapper sohohotel-clearfix">';
	
	if ($align == 'image-left') {
		$image_class = 'sohohotel-single-testimonial-image-wrapper-left';
		$text_class = 'sohohotel-single-testimonial-text-wrapper-right';
	} else {
		$image_class = 'sohohotel-single-testimonial-image-wrapper-right';
		$text_class = 'sohohotel-single-testimonial-text-wrapper-left';
	}
	
	$output .= '<div class="sohohotel-single-testimonial-text-wrapper ' . $text_class . '" style="background: ' . $background_color . ';">';
	$output .= '<h3 class="sohohotel-clearfix sohohotel-single-testimonial-text" style="color: ' . $primary_text_color . ';"><span>“</span>' . $content . '</h3>';
	$output .= '<p class="sohohotel-clearfix sohohotel-single-testimonial-guest-name" style="color: ' . $secondary_text_color . ';">&#8212; ' . $guest_name . '</p>';
	$output .= '</div>';
	
	$output .= '<div class="sohohotel-single-testimonial-image-wrapper ' . $image_class . '">';
	$output .= '<div class="sohohotel-single-testimonial-image" style="background-image: url(' . wp_get_attachment_image_url( $image_url, 'sohohotel-image-style8') . '); background-size: ' . $width . 'px ' . $height . 'px; height: ' . $height . 'px;"></div>';
	$output .= '</div>';
	
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_single_testimonial', 'sohohotel_single_testimonial_shortcode' );

?>