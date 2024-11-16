<?php

function sohohotel_title_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title' => '',
		'size' => '',
		'align' => ''
	), $atts ) );
	
	if($align == 'center') {
		$align_class = 'center';
	} else {
		$align_class = 'left';
	}
	
	if($size == '35px') {
		$size_class = 'sohohotel-title-35px';
	} elseif($size == '28px') {
		$size_class = 'sohohotel-title-28px';
	} elseif($size == '25px') {
		$size_class = 'sohohotel-title-25px';
	} else {
		$size_class = 'sohohotel-title-20px';
	}

	return '<h3 class="' . $size_class . ' sohohotel-clearfix sohohotel-title-' . $align_class . '">' . $title . '</h3>';
	
}

add_shortcode( 'sohohotel_title', 'sohohotel_title_shortcode' );

?>