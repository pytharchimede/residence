<?php

function sohohotel_social_media_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'facebook' => '',
			'flickr' => '',
			'googleplus' => '',
			'instagram' => '',
			'pinterest' => '',
			'skype' => '',
			'soundcloud' => '',
			'tumblr' => '',
			'twitter' => '',
			'vimeo' => '',
			'vine' => '',
			'yelp' => '',
			'youtube' => '',
			'tripadvisor' => ''
		), $atts ) );

	$link_target = "_blank";
	
	$output = '<div class="sohohotel-social-links sohohotel-clearfix">';
	
	if( isset($atts['facebook']) ) {
		$output .= '<a href="' . $atts['facebook'] . '" target="' . $link_target . '"><i class="fab fa-facebook-f"></i></a>';
	}
	
	if( isset($atts['flickr']) ) {
		$output .= '<a href="' . $atts['flickr'] . '" target="' . $link_target . '"><i class="fab fa-flickr"></i></a>';
	}
	
	if( isset($atts['googleplus']) ) {
		$output .= '<a href="' . $atts['googleplus'] . '" target="' . $link_target . '"><i class="fab fa-google-plus"></i></a>';
	}
	
	if( isset($atts['instagram']) ) {
		$output .= '<a href="' . $atts['instagram'] . '" target="' . $link_target . '"><i class="fab fa-instagram"></i></a>';
	}
	
	if( isset($atts['pinterest']) ) {
		$output .= '<a href="' . $atts['pinterest'] . '" target="' . $link_target . '"><i class="fab fa-pinterest"></i></a>';
	}
	
	if( isset($atts['skype']) ) {
		$output .= '<a href="' . $atts['skype'] . '" target="' . $link_target . '"><i class="fab fa-skype"></i></a>';
	}
	
	if( isset($atts['soundcloud']) ) {
		$output .= '<a href="' . $atts['soundcloud'] . '" target="' . $link_target . '"><i class="fab fa-soundcloud"></i></a>';
	}
	
	if( isset($atts['tumblr']) ) {
		$output .= '<a href="' . $atts['tumblr'] . '" target="' . $link_target . '"><i class="fab fa-tumblr"></i></a>';
	}
	
	if( isset($atts['twitter']) ) {
		$output .= '<a href="' . $atts['twitter'] . '" target="' . $link_target . '"><i class="fab fa-twitter"></i></a>';
	}
	
	if( isset($atts['vimeo']) ) {
		$output .= '<a href="' . $atts['vimeo'] . '" target="' . $link_target . '"><i class="fab fa-vimeo-square"></i></a>';
	}
	
	if( isset($atts['vine']) ) {
		$output .= '<a href="' . $atts['vine'] . '" target="' . $link_target . '"><i class="fab fa-vine"></i></a>';
	}
	
	if( isset($atts['yelp']) ) {
		$output .= '<a href="' . $atts['yelp'] . '" target="' . $link_target . '"><i class="fab fa-yelp"></i></a>';
	}
	
	if( isset($atts['youtube']) ) {
		$output .= '<a href="' . $atts['youtube'] . '" target="' . $link_target . '"><i class="fab fa-youtube"></i></a>';
	}
	
	if( isset($atts['tripadvisor']) ) {
		$output .= '<a href="' . $atts['tripadvisor'] . '" target="' . $link_target . '"><i class="fab fa-tripadvisor"></i></a>';
	}
	
	$output .= '</div>';
	
	return $output;

}

add_shortcode( 'sohohotel_social_media', 'sohohotel_social_media_shortcode' );

?>