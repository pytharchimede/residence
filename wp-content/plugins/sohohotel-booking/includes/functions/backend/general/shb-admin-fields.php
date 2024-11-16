<?php 

function shb_cpt_text_option($arr,$data) {
	
	$fields = '';
	$field_id = 'shb_' . $arr['id'];
	
	if ( !empty($arr['required']) && $arr['required'] == true ){
		$required = ' shb-validation-required';	
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . ' <span>*</span></label></div>';
	} else {
		$required = '';
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . '</label></div>';
	}
	
	if ( !empty($arr['class']) ){
		$class = 'class="' . $arr['class'] . $required . '"';
	} else {
		$class = 'class="' . $required . '"';
	}
	
	if ( !empty($data[$field_id][0]) ) {
		$value = $data[$field_id][0];
	} else {
		$value = '';
	}
	
	$fields .= '<div class="shb-field shb-clearfix">';
	$fields .= $label;
	$fields .= '<div class="shb-field-right"><input ' . $class . ' type="text" id="' . $field_id . '" name="' . $field_id . '" value="' . $value . '"></div>';
	
	if($arr['type'] == 'date') {
		
		if ( !empty($data[$field_id . '_alt'][0]) ) {
			$value_alt = $data[$field_id . '_alt'][0];
		} else {
			$value_alt = '';
		}
		
		$fields .= '<div class="shb-field-right"><input class="' . $arr['altclass'] . '" type="hidden" name="' . $field_id . '_alt" value="' . $value_alt . '"></div>';
	}
	
	if ( !empty($arr['hint']) ){
		$fields .= '<a class="shb-field-hint" title="' . $arr['hint'] . '" href="#">?</a>';
	}
	
	$fields .= '</div>';
	
	return $fields;
	
}

function shb_cpt_textarea_option($arr,$data) {
	
	$fields = '';
	$field_id = 'shb_' . $arr['id'];
	
	if ( !empty($arr['required']) && $arr['required'] == true ){
		$required = ' shb-validation-required';	
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . ' <span>*</span></label></div>';
	} else {
		$required = '';
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . '</label></div>';
	}
	
	if ( !empty($arr['class']) ){
		$class = 'class="' . $arr['class'] . $required . '"';
	} else {
		$class = 'class="' . $required . '"';
	}
	
	if ( !empty($data[$field_id][0]) ) {
		$value = $data[$field_id][0];
	} else {
		$value = '';
	}
	
	$fields .= '<div class="shb-field shb-clearfix">';
	$fields .= $label;
	$fields .= '<div class="shb-field-right"><textarea ' . $class . ' id="' . $field_id . '" name="' . $field_id . '">' . $value . '</textarea></div>';
	
	if ( !empty($arr['hint']) ){
		$fields .= '<a class="shb-field-hint" title="' . $arr['hint'] . '" href="#">?</a>';
	}
	
	$fields .= '</div>';
	
	return $fields;
	
}

function shb_cpt_select_option($arr,$data) {
	
	$fields = '';
	$field_id = 'shb_' . $arr['id'];
	$fields .= '<div class="shb-field shb-clearfix">';
	
	if ( !empty($arr['required']) && $arr['required'] == true ){
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . ' <span>*</span></label></div>';
	} else {
		$label = '<div class="shb-field-left"><label for="' . $field_id . '">' . $arr['title'] . '</label></div>';
	}
	
	$fields .= $label;
	$fields .= '<div class="shb-field-right"><select id="' . $field_id . '" name="' . $field_id . '">';
	
	if (!empty($arr['options'][1])) {
		
		if ( !empty($arr['options_title']) ) {
			$options_title = $arr['options_title'];
		} else {
			$options_title = '';
		}
		
		if ( !empty($arr['options_title_singular']) ) {
			$options_title_singular = $arr['options_title_singular'];
		} else {
			$options_title_singular = '';
		}
		
		for ($i = $arr['options'][0]; $i <= $arr['options'][1]; $i++) :
			
			if (!empty($data[$field_id][0]) && $data[$field_id][0] == $i ) {
				if ($i == 1) {
					$fields .= '<option value="' . $i . '" selected>' . $i . ' ' . $options_title_singular . '</option>';
				} else {
					$fields .= '<option value="' . $i . '" selected>' . $i . ' ' . $options_title . '</option>';
				}
			} else {
				
				if ($i == 1) {
					$fields .= '<option value="' . $i . '">' . $i . ' ' . $options_title_singular . '</option>';
				} else {
					$fields .= '<option value="' . $i . '">' . $i . ' ' . $options_title . '</option>';
				}
			}
			
		endfor;
		
	} else {
		
		foreach ($arr['options'] as $key => $val) {
			
			if ( !empty($data[$field_id][0]) ) {
				if ($data[$field_id][0] == $key ) {	
			        $fields .= '<option value="' . $key . '" selected>' . $val . '</option>';
				} else {
					$fields .= '<option value="' . $key . '">' . $val . '</option>';
				}
			} else {
				$fields .= '<option value="' . $key . '">' . $val . '</option>';
			}
			
		}
	}
	
	$fields .= '</select></div>';
	
	if ( !empty($arr['hint']) ){
		$fields .= '<a class="shb-field-hint" title="' . $arr['hint'] . '" href="#">?</a>';
	}
	
	$fields .= '</div>';
	return $fields;
	
}

function shb_cpt_checkbox_option($arr,$data) {
	
	$fields = '';
	$field_id = 'shb_' . $arr['id'];
		
	if ( !empty($arr['required']) && $arr['required'] == true ){
		$label = '<div class="shb-field-left"><p>' . $arr['title'] . ' <span>*</span></p></div>';
	} else {
		$label = '<div class="shb-field-left"><p>' . $arr['title'] . '</p></div>';
	}

	$fields .= '<div class="shb-field shb-checkbox-outer-wrapper shb-clearfix">';
	$fields .= $label;
	$fields .= '<div class="shb-field-right"><label for="shb-checkall-' . $field_id . '" class="shb-checkall-label">' . esc_html__('Check All','sohohotel_booking') . '</label>';
	$fields .= '<input type="checkbox" id="shb-checkall-' . $field_id . '" class="shb-checkall-input-hidden" />';
	
	foreach ($arr['options'] as $key => $val) {
		$fields .= '<div class="shb-checkbox-wrapper">';
		if (!empty( $data[$field_id .  '_' . $key][0] )) {
			$fields .= '<input class="shb-checkall-input ' . $field_id . '" type="checkbox" id="' . $field_id .  '_' . $key . '" name="' . $field_id .  '_' . $key . '" value="1" checked /><label for="' . $field_id .  '_' . $key . '">' . $val . '</label>';
		} else {
			$fields .= '<input class="shb-checkall-input ' . $field_id . '" type="checkbox" id="' . $field_id .  '_' . $key . '" name="' . $field_id .  '_' . $key . '" value="1" /><label for="' . $field_id .  '_' . $key . '">' . $val . '</label>';
		}
		$fields .= '</div>';
	}
	
	$fields .= '</div></div>';
	
	return $fields;
	
}

function shb_cpt_custom_option($arr,$data) {

	$fields = '';
	$fields .= '<div class="shb-field">';
	$fields .= $arr['custom'];
	$fields .= '</div>';
	
	return $fields;
	
}

function shb_cpt_accommodation($data) {
	
	ob_start();
	global $wp_query;
	$fields = '';
	
	$args = array(
		'post_type' => 'shb_accommodation',
		'posts_per_page' => '9999',
		'order' => 'DESC'
	);
	
	$fields .= '<div class="shb-select-room-wrapper shb-clearfix"><div class="shb-field-left"><p>' . esc_html__('Add to room','sohohotel_booking') . ' <span>*</span></p></div>';
	$fields .= '<div class="shb-field-right"><label for="shb-checkall-accommodation" class="shb-checkall-label">' . esc_html__('Check All','sohohotel_booking') . '</label>';
	$fields .= '<input type="checkbox" id="shb-checkall-accommodation" class="shb-checkall-input-hidden" />';
		
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) {
		while($wp_query->have_posts()) {
			$wp_query->the_post();
			if ( !empty($data['shb_accommodation_' . get_the_ID()][0]) && $data['shb_accommodation_' . get_the_ID()][0] == get_the_ID() ) {$checked = 'checked';} else {$checked = '';}
			$fields .= '<div class="shb-checkbox-wrapper">';
			$fields .= '<input class="shb-checkall-input" type="checkbox" id="shb_accommodation_' . get_the_ID() .'" name="shb_accommodation_' . get_the_ID() . '" value="' . get_the_ID() . '" ' . $checked . ' />';
			
			if(get_the_title() == '') {
				$title = __('(no title)','sohohotel_booking');
			} else {
				$title = get_the_title();
			}
			
			$fields .= '<label for="shb_accommodation_' . get_the_ID() . '">' . $title . '</label>';
			$fields .= '</div>';
		}
	} else {
		$fields .= '<p>' . esc_html__('No rooms have been added yet','sohohotel_booking') . '</p>';
	} 
	
	wp_reset_query();
	$fields .= '</div></div>';
	echo $fields;
		
	return ob_get_clean();

}

function shb_cpt_rate($data) {
	
	ob_start();
	global $wp_query;
	$fields = '';
	
	$accommodation_ids = shb_get_all_ids('shb_accommodation');
	$rate_ids = shb_get_all_ids('shb_rate');
	
	$fields .= '<div class="shb-accommodation-rate-wrapper shb-clearfix">';
	$fields .= '<div class="shb-field-left"><p>' . esc_html__('Add to rate','sohohotel_booking') . ' <span>*</span></p></div>';
	$fields .= '<div class="shb-field-right"><label for="shb-checkall-accommodation-rate" class="shb-checkall-label">' . esc_html__('Check All','sohohotel_booking') . '</label>';
	$fields .= '<input type="checkbox" id="shb-checkall-accommodation-rate" class="shb-checkall-input-hidden" />';

	foreach($accommodation_ids as $accommodation_id) {
		
		foreach($rate_ids as $rate_id) {
				
			if( get_post_meta($rate_id,'shb_accommodation_rate',TRUE) == $accommodation_id ) {
				$rates_exist = 1;
				break;
			}
			
		}
		
		if(!empty($rates_exist)) {
			
			$fields .= '<p class="shb-rate-accommodation-title">' . get_the_title($accommodation_id) . '</p>';
		
			foreach($rate_ids as $rate_id) {
			
				if( get_post_meta($rate_id,'shb_accommodation_rate',TRUE) == $accommodation_id ) {
				
					if ( !empty($data['shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id][0]) && $data['shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id][0] == get_the_ID() ) {$checked = 'checked';} else {$checked = '';}
					$fields .= '<div class="shb-checkbox-wrapper">';
					$fields .= '<input class="shb-checkall-input" type="checkbox" id="shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id . '" name="shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id . '" value="' . get_the_ID() . '" ' . $checked . ' />';
	
					if($rate_id == '') {
						$title = __('(no title)','sohohotel_booking');
					} else {
						$title = get_the_title($rate_id);
					}
	
					$fields .= '<label for="shb_accommodation_rate_' . $accommodation_id . '_' . $rate_id . '">' . $title . '</label>';
					$fields .= '</div>';
				
				}
			
			}
			
		}
		
	}
	
	if(empty($rates_exist)) {
		$fields .= '<p>' . esc_html__('No rates have been added yet','sohohotel_booking') . '</p>';
	}
	
	$fields .= '</div>';
	$fields .= '</div>';
	
	echo $fields;
		
	return ob_get_clean();

}

function shb_cpt_season($data) {
	
	ob_start();
	global $wp_query;
	$fields = '';
	
	$args = array(
		'post_type' => 'shb_season',
		'posts_per_page' => '9999',
		'order' => 'DESC'
	);
	
	if ( !empty($data['shb_season_default'][0]) && $data['shb_season_default'][0] == 'default' ) {$default_checked = 'checked';} else {$default_checked = '';}
	
	$fields .= '<div class="shb-select-season-wrapper shb-clearfix">';
	$fields .= '<div class="shb-field-left"><p>' . esc_html__('Add to season','sohohotel_booking') . ' <span>*</span></p></div>';
	$fields .= '<div class="shb-field-right"><label for="shb-checkall-season" class="shb-checkall-label">' . esc_html__('Check All','sohohotel_booking') . '</label>';
	$fields .= '<input type="checkbox" id="shb-checkall-season" class="shb-checkall-input-hidden" />';
	$fields .= '<div class="shb-checkbox-wrapper">';
	$fields .= '<input class="shb-checkall-input" type="checkbox" id="shb_season_default" name="shb_season_default" value="default" ' . $default_checked . ' />';
	$fields .= '<label for="shb_season_default">' . esc_html__('Default (All year round any time)','sohohotel_booking') . '</label>';
	$fields .= '</div>';
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) {
		while($wp_query->have_posts()) {
			$wp_query->the_post(); 
			$season_meta = get_post_meta(get_the_ID());
			if ( !empty($data['shb_season_' . get_the_ID()][0]) && $data['shb_season_' . get_the_ID()][0] == get_the_ID() ) {$checked = 'checked';} else {$checked = '';}
			$fields .= '<div class="shb-checkbox-wrapper">';
			$fields .= '<input class="shb-checkall-input" type="checkbox" id="shb_season_' . get_the_ID() . '" name="shb_season_' . get_the_ID() . '" value="' . get_the_ID() . '" ' . $checked . ' />';
			$fields .= '<label for="shb_season_' . get_the_ID() . '">' . get_the_title() . ' (' . $season_meta['shb_start_date'][0] . ' - ' . $season_meta['shb_end_date'][0] . ')</label>';
			$fields .= '</div>';
		} 
	} else {
		$fields .= '<p>' . esc_html__('No seasons have been added yet','sohohotel_booking') . '</p>';
	} 
	
	wp_reset_query();
	$fields .= '</div></div>';
	echo $fields;
	
	return ob_get_clean();

}

function shb_cpt_addon($data) {
	
	ob_start();
	global $wp_query;
	$fields = '';
	
	$args = array(
		'post_type' => 'shb_addon',
		'posts_per_page' => '9999',
		'order' => 'DESC'
	);
	
	$fields .= '<div class="shb-select-addon-wrapper">';
	$fields .= '<label for="shb-checkall-addon" class="shb-checkall-label">' . esc_html__('Check All','sohohotel_booking') . '</label>';
	$fields .= '<input type="checkbox" id="shb-checkall-addon" class="shb-checkall-input-hidden" />';
		
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) {
		while($wp_query->have_posts()) {
			$wp_query->the_post(); 
			$addon_meta = json_decode( get_post_meta(get_the_ID(),'shb_addon_meta',TRUE), true );
			if ( !empty($data['shb_addon_' . get_the_ID()][0]) && $data['shb_addon_' . get_the_ID()][0] == get_the_ID() ) {$checked = 'checked';} else {$checked = '';}
			$fields .= '<div class="shb-checkbox-wrapper">';
			$fields .= '<input class="shb-checkall-input" type="checkbox" id="shb_addon_' . get_the_ID() . '" name="shb_addon_' . get_the_ID() . '" value="' . get_the_ID() . '" ' . $checked . ' />';
			$fields .= '<label for="shb_addon_' . get_the_ID() . '">' . get_the_title() . '</label>';
			$fields .= '</div>';
		}
	} else {
		$fields .= '<p>' . esc_html__('No add-ons have been added yet','sohohotel_booking') . '</p>';
	}
	
	wp_reset_query();
 	$fields .= '</div>';
	echo $fields;
		
	return ob_get_clean();

}

function shb_cpt_fields($arr,$data) {
	
	$fields = '';
	$fields .= '<div class="shb-fields-wrapper">';
	
	foreach ($arr['fields'] as $val) {
		if ($val['type'] == 'select') {
			$fields .= shb_cpt_select_option($val,$data);	
		} elseif($val['type'] == 'text') {
			$fields .= shb_cpt_text_option($val,$data);
		} elseif($val['type'] == 'textarea') {
			$fields .= shb_cpt_textarea_option($val,$data);
		} elseif($val['type'] == 'date') {
			$fields .= shb_cpt_text_option($val,$data);
		} elseif ($val['type'] == 'custom') {
			$fields .= shb_cpt_custom_option($val,$data);
		} elseif ($val['type'] == 'checkbox') {
			$fields .= shb_cpt_checkbox_option($val,$data);
		}
	}
	
	$fields .= '</div>';
	return $fields;
	
}