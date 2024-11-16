<?php

function sohohotel_contact_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'address' => '',
			'phone' => '',
			'email' => ''
		), $atts ) );
	
	$output = '<ul class="sohohotel-contact-details-list">';
	
	if( isset($atts['address']) ) {
		$output .= '<li class="sohohotel-address clearfix">' . $atts['address'] . '</li>';
	}
	
	if( isset($atts['phone']) ) {
		$output .= '<li class="sohohotel-phone clearfix"><a href="tel:' . str_replace(' ', '', $atts['phone']) . '">' . $atts['phone'] . '</a></li>';
	}
	
	if( isset($atts['email']) ) {
		$output .= '<li class="sohohotel-email clearfix"><a href="mailto:' . $atts['email'] . '">' . $atts['email'] . '</a></li>';
	}
	
	$output .= '</ul>';
	
	return $output;

}

add_shortcode( 'sohohotel_contact_details', 'sohohotel_contact_shortcode' );

?>