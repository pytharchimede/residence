<?php

function sohohotel_image_text_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'type' => '',
		'image' => '',
		'title' => '',
		'button_text' => '',
		'button_url' => '',
		'button_icon' => '',
		'button_target' => '',
		'gallery_ids' => '',
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
	
	$gallery_ids_explode = explode(',', $gallery_ids);
	$gallery_link = wp_get_attachment_image_src( $gallery_ids_explode[0], 'full-size' );
	$gallery_ids = str_replace($gallery_ids_explode[0],'',$gallery_ids);
	
	$gallery_tag_id = rand(10,100);
	
	if( !empty($gallery_ids)) {
		$data_gal = 'data-gal="prettyPhoto[gallery-' . $gallery_tag_id . ']"';
		$button_url = $gallery_link[0];
	} else {
		$data_gal = '';
		
	}
	
	$output = '<section class="sohohotel-image-text-wrapper sohohotel-clearfix ' . $type_val . '">';
	$output .= '<div class="sohohotel-it-image-wrapper" style="background-image:url(' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . ');">';
	$output .= '<img src="' . wp_get_attachment_image_url( $image, 'sohohotel-image-style8') . '" alt="" />';
	$output .= '</div>';
	$output .= '<div class="sohohotel-it-text-wrapper" style="background: ' . $background_color . ';">';
	$output .= '<h3 class="sohohotel-title-28px sohohotel-clearfix sohohotel-title-left" style="color: ' . $primary_text_color . ';">' . $title . '</h3>';
	$output .= '<p style="color: ' . $secondary_text_color . ';">' . $content . '</p>';
	
	if(!empty($button_text)) {
		$output .= '<a' . $button_target_val . ' href="' . $button_url . '" class="sohohotel-button1" ' . $data_gal . '>' . $button_icon . $button_text . '</a>';
	}
	
	$output .= '<div class="gallery">';
	
	foreach($gallery_ids_explode as $gallery_id) {
		
		$output .= '<div class="gallery-item">';
			$output .= '<div class="gallery-icon">';
				$output .= '<a href="' . wp_get_attachment_image_url( $gallery_id, 'full') . '" data-gal="prettyPhoto[gallery-' . $gallery_tag_id . ']">';
					$output .= '<img src="' . wp_get_attachment_image_url( $gallery_id, 'full') . '" alt="">';
				$output .= '</a>';
			$output .= '</div>';
		$output .= '</div>';
		
	}
					
	$output .= '<br style="clear: both;">';
	$output .= '</div>';
	
	$output .= '</div>';
	$output .= '</section>';
	
	return $output;
	
}

add_shortcode( 'sohohotel_image_text', 'sohohotel_image_text_shortcode' );

?>