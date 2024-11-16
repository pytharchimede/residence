<?php

function sohohotel_video_thumbnail_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'thumbnail_url' => '',
		'video_url' => ''
	), $atts ) );
	
	$output = '';
	$output .= '<div class="sohohotel-video-thumbnail-wrapper">';
	$output .= '<div class="sohohotel-video-play"><a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a></div>';
	$output .= '<div class="sohohotel-video-thumbnail-overlay"></div>';
	$output .= '<img src="' . wp_get_attachment_image_url( $thumbnail_url, 'full-image') . '" alt="" />';
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_video_thumbnail', 'sohohotel_video_thumbnail_shortcode' );

?>