<?php
	
function shb_custom_form($data) {
	
	/*
[text required name="first_name" label="First Name ! , %" column="1/2"]
[text required name="last_name" label="Last Name" column="1/2"]
[text required class="shb-email-validation" name="email" label="Email Address" column="1/3"]
[text required class="shb-phone-validation" name="phone" label="Phone Number" column="1/3"]
[radio required name="radio_selection" label="Radio Selection" option="Option 1" option="Option 2" option="Option 3" column="1/3"]
[checkbox required name="checkbox" label="Check Boxes 1" option="Option 1" option="Option 2" option="Option 3" column="1/4"]
[checkbox required name="checkbox_example" label="Check Boxes 2" option="Option 1" option="Option 2" option="Option 3" column="1/4"]
[textarea name="optional_field" label="Optional field" column="1/4"]
[textarea required name="any_custom_fields" label="Add any custom fields" column="1/4"]
	*/
	
	//$shb_custom_fields = get_option('shb_custom_fields');
	
	$shb_custom_fields = '[text required name="first_name" label="' . __('First Name','sohohotel_booking') . '" column="1/2"][text required name="last_name" label="' . __('Last Name','sohohotel_booking') . '" column="1/2"][text required class="shb-email-validation" name="email" label="' . __('Email Address','sohohotel_booking') . '" column="1/2"][text required class="shb-phone-validation" name="phone" label="' . __('Phone Number','sohohotel_booking') . '" column="1/2"]';
	
	$str = str_replace('\\',"",$shb_custom_fields);
	
	$fields = '';
	$fields .= shb_custom_form_fields($str,$data);
	$fields .= '<div class="shb-clearboth"></div>';
	return $fields;
	
}

function shb_custom_form_fields($str,$data) {
	
	$c = 0;
	$o = '';
	$fields = array();
	
	if(preg_match_all('/\[/', $str, $m1)){
		
		foreach($m1[0] as $val1){
			
			$c++;
			$e = explode("[",$str);
			$e2 = explode("]",$e[$c]);
			$ps = preg_split('/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"(*SKIP)(*F)|\h+/', $e2[0]);
			
			foreach($ps as $val2){
				
				// Type
				if ($val2 == 'text' || $val2 == 'textarea' || $val2 == 'select' || $val2 == 'radio' || $val2 == 'checkbox') {
					$fields[$c]['type'] = $val2;
				}
				
				// Required
				if ($val2 == 'required') {
					$fields[$c]['required'] = $val2;
				}
				
				// Name
				if(preg_match_all('/name="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['name'] = $m3[1];
					}
				}
				
				// Label
				if(preg_match_all('/label="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['label'] = $m3[1];
					}
				}
				
				// Column
				if(preg_match_all('/column="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['column'] = $m3[1];
					}
				}
				
				// Class
				if(preg_match_all('/class="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['class'] = $m3[1];
					}
				}
				
				// Option
				if(preg_match_all('/option="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['option_' . $fields[$c]['name']][] = $m3[1];
					}
				}
					
			}
			
		}
		
	}
	
	foreach($fields as $val3){
		
		// Set value
		if ( $val3['type'] != 'checkbox' ) {
			if ( !empty($data['shb_custom_form_' . $val3['name']][0]) ) {
				$val3['value'] = $data['shb_custom_form_' . $val3['name']][0];
			} else {
				$val3['value'] = '';
			}
		}
		
		if ($val3['column'] == '1/1') {
			$o .= '<div class="shb-custom-field-full-width">';
		} elseif ($val3['column'] == '1/2') {
			$o .= '<div class="shb-custom-field-one-half">';
		} elseif ($val3['column'] == '1/3') {
			$o .= '<div class="shb-custom-field-one-third">';
		} elseif ($val3['column'] == '1/4') {
			$o .= '<div class="shb-custom-field-one-fourth">';
		} else {
			$o .= '<div>';
		}
		
		if (!empty($val3['class'])) {
			$class_name = 'class="' . $val3['class'] . '"';
		} else {
			$class_name = '';
		}
		
		// Label
		if ( !empty($val3['required'])) {
			$o .= '<label for="' . $val3['name'] . '">' . $val3['label'] . ' <span>*</span></label>';
		} else {
			$o .= '<label for="' . $val3['name'] . '">' . $val3['label'] . '</label>';
		}
		
		// Label
		if ( !empty($val3['required'])) {
			$required = 'shb-validation-required';
		} else {
			$required = '';
		}
		
		// Text
		if ($val3['type'] == 'text') {
			$o .= '<input ' . $class_name . ' id="' . $val3['name'] . '" name="shb_custom_form_' . $val3['name'] . '" class="' . $required . '" type="text" value="' . $val3['value'] . '" />';
		}
		
		// Textarea
		if ($val3['type'] == 'textarea') {
			$o .= '<textarea ' . $class_name . ' id="' . $val3['name'] . '" name="shb_custom_form_' . $val3['name'] . '" class="' . $required . '">' . $val3['value'] . '</textarea>';
		}
		
		// Select
		if ($val3['type'] == 'select') {
			
			$o .= '<select ' . $class_name . ' id="' . $val3['name'] . '" name="shb_custom_form_' . $val3['name'] . '">';
		
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
			
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o .= '<option value="' . $val3['name'] . '_' . $key . '" selected>' . $val4 . '</option>';
				} else {
					$o .= '<option value="' . $val3['name'] . '_' . $key . '">' . $val4 . '</option>';
				} 
			}
		
			$o .= '</select>';
			
		} 
		
		if ($val3['type'] == 'radio') {
			
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
		
				$o .= '<div class="shb-radio-wrapper">';
		
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o .= '<input ' . $class_name . ' type="radio" name="shb_custom_form_' . $val3['name'] . '" value="' . $val3['name'] . '_' . $key . '" class="' . $required . '" checked /><span>' . $val4 . '</span>';
				} else {
					$o .= '<input ' . $class_name . ' type="radio" name="shb_custom_form_' . $val3['name'] . '" value="' . $val3['name'] . '_' . $key . '" class="' . $required . '" /><span>' . $val4 . '</span>';
				}
		
				$o .= '</div>';
		
			}

			$o .= '</select>';
	
		}
		
		// Checkbox
		if ($val3['type'] == 'checkbox') {
		
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
				
				if ( !empty($data['shb_custom_form_' . $val3['name'] . '_' . $key][0]) ) {
					$val3['value'] = $data['shb_custom_form_' . $val3['name'] . '_' . $key][0];
				} else {
					$val3['value'] = '';
				}
				
				$o .= '<div class="shb-checkbox-wrapper">';
				
				if ( $val3['value'] == $val3['name'] . '_' . $key ) {
					$o .= '<input ' . $class_name . ' type="checkbox" name="shb_custom_form_' . $val3['name'] . '_' . $key . '" value="' . $val3['name'] . '_' . $key . '" checked /><span>' . $val4 . '</span>';
				} else {
					$o .= '<input ' . $class_name . ' type="checkbox" name="shb_custom_form_' . $val3['name'] . '_' . $key . '" value="' . $val3['name'] . '_' . $key . '" /><span>' . $val4 . '</span>';
				}
				
				$o .= '</div>';
				
			}
		
			$o .= '</select>';
			
		}
		
		$o .= '</div>';
		
	}
	
	return $o;
	
}

function shb_custom_form_field_names() {
	
	$str = str_replace('\\',"",get_option('shb_custom_fields'));
	
	$c = 0;
	$o = array();
	$fields = array();
	
	if(preg_match_all('/\[/', $str, $m1)){
		
		foreach($m1[0] as $val1){
			
			$c++;
			$e = explode("[",$str);
			$e2 = explode("]",$e[$c]);
			$ps = preg_split('/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"(*SKIP)(*F)|\h+/', $e2[0]);
			
			foreach($ps as $val2){
				
				// Type
				if ($val2 == 'text' || $val2 == 'textarea' || $val2 == 'select' || $val2 == 'radio' || $val2 == 'checkbox') {
					$fields[$c]['type'] = $val2;
				}
				
				// Required
				if ($val2 == 'required') {
					$fields[$c]['required'] = $val2;
				}
				
				// Name
				if(preg_match_all('/name="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['name'] = $m3[1];
					}
				}
				
				// Label
				if(preg_match_all('/label="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['label'] = $m3[1];
					}
				}
				
				// Column
				if(preg_match_all('/column="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['column'] = $m3[1];
					}
				}
				
				// Option
				if(preg_match_all('/option="/', $val2, $m2)){
					if (preg_match('/"([^"]+)"/', $val2, $m3)) {
						$fields[$c]['option_' . $fields[$c]['name']][] = $m3[1];
					}
				}
					
			}
			
		}
		
	}
	
	foreach($fields as $val3){
		
		if ($val3['type'] == 'checkbox') {
		
			foreach($val3['option_' . $val3['name']] as $key => $val4) {
				
				$o['fields'][]['id'] = 'custom_form_' . $val3['name'] . '_' . $key;
				
			}
			
		} else {
			
			$o['fields'][]['id'] = 'custom_form_' . $val3['name'];
			
		}
		
	}
	
	return $o;
	
} ?>