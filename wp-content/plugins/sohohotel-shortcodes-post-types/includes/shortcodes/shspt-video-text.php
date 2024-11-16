<?php

function sohohotel_video_text_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'type' => '',
		'image' => '',
		'title' => '',
		'button_text' => '',
		'button_url' => '',
		'button_icon' => '',
		'button_target' => '',
		'video_url' => '',
		'background_color' => '',
		'primary_text_color' => '',
		'secondary_text_color' => '',
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
	
	if ( !empty($button_icon) ) {
		$button_icon = '<i class="fas ' . $button_icon . '"></i>';
	} else {
		$button_icon = '';
	}
	
	$output = '<section class="sohohotel-image-text-wrapper sohohotel-clearfix ' . $type_val . '">';
	$output .= '<div class="sohohotel-it-image-wrapper" style="background-image:url(' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . ');">';
	
	$output .= '<div class="sohohotel-video-play"><a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a></div>';
	
	$output .= '<div class="sohohotel-video-text-overlay"></div>';
	$output .= '<img src="' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . '" alt="" />';
	$output .= '</div>';
	$output .= '<div class="sohohotel-it-text-wrapper" style="background: ' . $background_color . ';">';
	$output .= '<h3 class="sohohotel-title-28px sohohotel-clearfix sohohotel-title-left" style="color: ' . $primary_text_color . ';">' . $title . '</h3>';
	$output .= '<p style="color: ' . $secondary_text_color . ';">' . $content . '</p>';
	$output .= '<a' . $button_target_val . ' href="' . $button_url . '" class="sohohotel-button1">' . $button_icon . $button_text . '</a>';
	$output .= '</div>';
	$output .= '</section>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_video_text', 'sohohotel_video_text_shortcode' );

?>