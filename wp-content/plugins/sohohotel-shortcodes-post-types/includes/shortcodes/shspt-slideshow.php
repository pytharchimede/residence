<?php

function sohohotel_slideshow_shortcode( $atts, $content = null ) {
	
	$atts_array['slide_full_screen'] = '';
	$atts_array['slide_full_screen_offset'] = '';
	
	foreach (range(1, 10) as $r) {
		$atts_array['slide_image_' . $r] = '';
		$atts_array['slide_title_' . $r] = '';
		$atts_array['slide_text_' . $r] = '';
		$atts_array['slide_button_text_' . $r] = '';
		$atts_array['slide_button_url_' . $r] = '';
		$atts_array['slide_align_' . $r] = '';
		$atts_array['slide_overlay_color_' . $r] = '';
		$atts_array['slide_overlay_opacity_' . $r] = '';
	}

	extract( shortcode_atts( $atts_array, $atts ) );
	
	$o = '';
	
	if($slide_full_screen == 'yes') {
		$o .= '<div class="flexslider sohohotel-slider-fullscreen"><ul class="slides">';
	} else {
		$o .= '<div class="flexslider"><ul class="slides">';
	} 

	foreach (range(1, 10) as $r) {
	
		if(!empty(${"slide_image_" . $r})) {
			
			$image = wp_get_attachment_image_url( ${"slide_image_" . $r}, 'full');
			
			if( (!empty(${"slide_overlay_color_" . $r})) && (!empty(${"slide_overlay_opacity_" . $r})) ) {
				$overlay = 'style="background:' . ${"slide_overlay_color_" . $r} . ';opacity:' . ${"slide_overlay_opacity_" . $r} . '"';
			} else {
				$overlay = '';
			}
			
			if(!empty(${"slide_title_" . $r})) {
				$title = '<h2>' . ${"slide_title_" . $r} . '</h2>';
			} else {
				$title = '';
			}
			
			if(!empty(${"slide_text_" . $r})) {
				$text = '<p>' . ${"slide_text_" . $r} . '</p>';
			} else {
				$text = '';
			}
			
			if(!empty(${"slide_button_text_" . $r})) {
				$button = '<a href="' . ${"slide_button_url_" . $r} . '" class="sohohotel-slider-button">' . ${"slide_button_text_" . $r} . '</a>';
			} else {
				$button = '';
			}
			
			if(!empty(${"slide_align_" . $r})) {
				
				if(${"slide_align_" . $r} == 'left') {
					$align = 'left';
				} else {
					$align = 'center';
				}
				
			} else {
				$align = 'center';
			}
			
			// Caption 1
			if( (!empty($title)) && (empty($text)) && ($align == 'center') ) {
				$caption = 1;
			}
			
			// Caption 2
			if( (!empty($title)) && (empty($text)) && ($align == 'left') ) {
				$caption = 2;
			}
			
			// Caption 3
			if( (!empty($title)) && (!empty($text)) && ($align == 'center') ) {
				$caption = 3;
			}
			
			// Caption 4
			if( (!empty($title)) && (!empty($text)) && ($align == 'left') ) {
				$caption = 4;
			}
			
			if(!empty($slide_full_screen_offset)) {
				$o .= '<li style="height: calc(100vh - ' . $slide_full_screen_offset . ');">';
			} else {
				
				if($slide_full_screen == 'yes') {
					$o .= '<li style="height: calc(100vh);">';
				} else {
					$o .= '<li>';
				}
			
			}
				
			if(!empty($caption)) {
				$o .= '<div class="sohohotel-slider-caption-' . $caption . '">';
				$o .= $title;
				$o .= $text;
				$o .= $button;
				$o .= '</div>';
			}	
				
			$o .= '<div class="sohohotel-slider-overlay" ' . $overlay . '></div>';
			
			if($slide_full_screen == 'yes') {
				$o .= '<div class="sohohotel-slide-image" style="background-image:url(' . $image . ');"></div>';
			} else {
				$o .= '<img src="' . $image . '" alt="" />';
			}
			
			$o .= '</li>';
			
		}

	}

	$o .= '</ul></div>';
	
	return $o;
	
}

add_shortcode( 'sohohotel_slideshow', 'sohohotel_slideshow_shortcode' );

?>