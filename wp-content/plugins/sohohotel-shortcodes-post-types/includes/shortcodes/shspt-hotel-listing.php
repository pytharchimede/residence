<?php

function sohohotel_hotel_listing_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'columns' => '',
		'image_1' => '',
		'title_1' => '',
		'link_1' => '',
		'image_2' => '',
		'title_2' => '',
		'link_2' => '',
		'image_3' => '',
		'title_3' => '',
		'link_3' => '',
	), $atts ) );
	
	if($columns == '3') {
		$column_class = 'sohohotel-hotel-listing-wrapper-3';
	} else {
		$column_class = 'sohohotel-hotel-listing-wrapper-2';
	}
	
	$output = '<section class="sohohotel-hotel-listing-wrapper ' . $column_class . ' sohohotel-clearfix">';
	
	if(!empty($image_1) && !empty($title_1)) {
		$output .= '<div class="sohohotel-hotel-listing">';
		$output .= '<a href="' . $link_1 . '"><img src="' . wp_get_attachment_image_url( $image_1, 'sohohotel-image-style7') . '" alt="" /></a>';
		$output .= '<h3><a href="' . $link_1 . '">' . $title_1 . '</a></h3>';
		$output .= '</div>';
	}
	
	if(!empty($image_2) && !empty($title_2)) {
		$output .= '<div class="sohohotel-hotel-listing">';
		$output .= '<a href="' . $link_2 . '"><img src="' . wp_get_attachment_image_url( $image_2, 'sohohotel-image-style7') . '" alt="" /></a>';
		$output .= '<h3><a href="' . $link_2 . '">' . $title_2 . '</a></h3>';
		$output .= '</div>';
	}
	
	if(!empty($image_3) && !empty($title_3)) {
		$output .= '<div class="sohohotel-hotel-listing">';
		$output .= '<a href="' . $link_3 . '"><img src="' . wp_get_attachment_image_url( $image_3, 'sohohotel-image-style7') . '" alt="" /></a>';
		$output .= '<h3><a href="' . $link_3 . '">' . $title_3 . '</a></h3>';
		$output .= '</div>';
	}

	$output .= '</section>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_hotel_listing', 'sohohotel_hotel_listing_shortcode' );

?>