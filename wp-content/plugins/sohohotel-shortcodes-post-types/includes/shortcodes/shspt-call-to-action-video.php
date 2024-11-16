<?php

function sohohotel_call_to_action_video_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'background_url' => '',
		'title' => '',
		'text' => '',
		'video_url' => ''
	), $atts ) );
	
	$output = '<section class="sohohotel-clearfix sohohotel-call-to-action-video-section" style="background-image:url(' . wp_get_attachment_image_url( $background_url, 'sohohotel-image-style9') . ');">
		
		<div class="sohohotel-call-to-action-video-overlay"></div>
		
		<div class="sohohotel-call-to-action-video-section-inner">

			<h3>' . $title . '</h3>
			<p>' . $text . '</p>
			<div class="sohohotel-video-play"><a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a></div>

		</div>
		
	</section>';

	return $output;
	
}

add_shortcode( 'sohohotel_call_to_action_video', 'sohohotel_call_to_action_video_shortcode' );

?>