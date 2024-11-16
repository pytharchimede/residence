<?php

function sohohotel_fixed_height_text_image_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'image_url' => '',
		'title' => '',
		'align' => '',
	), $atts ) );
	
	$image_info = wp_get_attachment_image_src($image_url,'full-image');
	
	if($image_info[1] < 1200) {
		$width = 600;
		$height = 400;
	} else {
		$width = $image_info[1] / 2;
		$height = $image_info[2] / 2;
	}
	
	$output = '<div class="sohohotel-fixed-height-text-image-wrapper sohohotel-clearfix">';
	
	if ($align == 'image-left') {
		$image_class = 'sohohotel-fixed-height-image-wrapper-left';
		$text_class = 'sohohotel-fixed-height-text-wrapper-right';
	} else {
		$image_class = 'sohohotel-fixed-height-image-wrapper-right';
		$text_class = 'sohohotel-fixed-height-text-wrapper-left';
	}
	
	$output .= '<div class="sohohotel-fixed-height-text-wrapper ' . $text_class . '">';
	$output .= '<h3 class="sohohotel-title-28px sohohotel-clearfix sohohotel-title-left">' . $title . '</h3>';
	$output .= $content;
	$output .= '</div>';
	
	$output .= '<div class="sohohotel-fixed-height-image-wrapper ' . $image_class . '">';
	$output .= '<div class="sohohotel-fixed-height-image" style="background-image: url(' . wp_get_attachment_image_url( $image_url, 'full-image') . '); background-size: ' . $width . 'px ' . $height . 'px; height: ' . $height . 'px;"></div>';
	$output .= '</div>';
	
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_fixed_height_text_image', 'sohohotel_fixed_height_text_image_shortcode' );

?>