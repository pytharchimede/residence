<?php

$guestclass_ids = shb_get_all_ids('shb_guestclass');

if(!empty($guestclass_ids)) {
	
	$shb_accommodation_fields_1 = array(
		'fields' => array(
			array(
				'id' => 'short_description',
				'title' => __('Short description','sohohotel_booking'),
				'hint' => __('This is displayed on the accommodation listing pages and is intended as a brief overview of the room','sohohotel_booking'),
				'type' => 'textarea',
				'required' => true,
				'class' => 'shb-validation-required'
			),
			array(
				'id' => 'accommodation_type',
				'title' => __('Accommodation type','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'private' => __('Private','sohohotel_booking'),
					'shared-dorm' => __('Shared dorm','sohohotel_booking')
				)
			),
			array(
				'id' => 'price_scheme',
				'title' => __('Price Scheme','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'per_guest' => __('Charge per guest','sohohotel_booking'),
					'per_room' => __('Charge per room','sohohotel_booking')
				)
			),
			array(
				'id' => 'qty',
				'title' => __('Quantity','sohohotel_booking'),
				'hint' => __('This sets the quantity of units available for this accommodation, use this if you have multiple units of the same type available','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(1,500)
			)
		)
	);

	echo shb_cpt_fields($shb_accommodation_fields_1,$accommodation_data);

	$shb_accommodation_fields_2 = array();
	$i = 0;

	foreach($guestclass_ids as $guestclass_id) {
	
		$i++;
	
		$shb_accommodation_fields_2['fields'][$i]['id'] = $guestclass_id . '_min';
		$shb_accommodation_fields_2['fields'][$i]['title'] = get_the_title($guestclass_id) . ' ' . __('min','sohohotel_booking');
		$shb_accommodation_fields_2['fields'][$i]['type'] = 'select';
		$shb_accommodation_fields_2['fields'][$i]['required'] = true;
		$shb_accommodation_fields_2['fields'][$i]['options'] = array(0,500);
	
		$i++;
	
		$shb_accommodation_fields_2['fields'][$i]['id'] = $guestclass_id . '_max';
		$shb_accommodation_fields_2['fields'][$i]['title'] = get_the_title($guestclass_id) . ' ' . __('max','sohohotel_booking');
		$shb_accommodation_fields_2['fields'][$i]['type'] = 'select';
		$shb_accommodation_fields_2['fields'][$i]['required'] = true;
		$shb_accommodation_fields_2['fields'][$i]['options'] = array(0,500);
	
	}

	echo shb_cpt_fields($shb_accommodation_fields_2,$accommodation_data);

	$shb_accommodation_fields_3 = array(
		'fields' => array(
			array(
				'id' => 'total_min',
				'title' => __('Total min','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(1,500)
			),
			array(
				'id' => 'total_max',
				'title' => __('Total max','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(1,500)
			),
		)
	);

	echo shb_cpt_fields($shb_accommodation_fields_3,$accommodation_data);

	$shb_accommodation_fields_4 = array(
		'fields' => array(
			array(
				'id' => 'price_intro',
				'title' => __('Price Introduction','sohohotel_booking'),
				'hint' => __('This is a guide price for guests, it\'s displayed before the actual price can be calculated e.g. before dates and guest quantities are selected. You can add something like \'From $250 / Night\'. Add the [price] shortcode in this field to use the \'Sorting Price\' if you\'re using multiple currencies so it will be converted','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
				'class' => 'shb-validation-required'
			),
			array(
				'id' => 'sorting_price',
				'title' => __('Sorting Price','sohohotel_booking') . ' (' . shb_get_currency_symbol() . ')',
				'hint' => __('This price is used for sorting purposes, when the user selects the sort by price filter','sohohotel_booking'),
				'type' => 'text',
				'required' => true,
				'class' => 'shb-validation-required'
			),
			array(
				'id' => 'display_form',
				'title' => __('Display form','sohohotel_booking'),
				'hint' => __('Display a booking form on the accommodation single page','sohohotel_booking'),
				'type' => 'select',
				'required' => true,
				'options' => array(
					'yes' => __('Yes','sohohotel_booking'),
					'no' => __('No','sohohotel_booking')
				)
			),
		)
	);

	echo shb_cpt_fields($shb_accommodation_fields_4,$accommodation_data);
	
} else {
	
	echo '<p>' . __('Go to "Hotel Booking > Guest Classes" and create at least one guest class.','sohohotel_booking') . '</p>';
	
}



?>