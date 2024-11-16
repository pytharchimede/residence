<?php

$shb_additionalfee_fields = array(
	'fields' => array(
		array(
			'id' => 'charge',
			'title' => __('Charge','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'per_room' => __('Per room','sohohotel_booking'),
				'per_person' => __('Per person','sohohotel_booking')
			)
		),
		array(
			'id' => 'per',
			'title' => __('Per','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'night' => __('Night','sohohotel_booking'),
				'booking' => __('Booking','sohohotel_booking')
			)
		),
		array(
			'id' => 'optional',
			'title' => __('Optional','sohohotel_booking'),
			'hint' => __('If this is set to \'No\' the fee will be automatically added to user\'s total at the checkout','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'yes' => __('Yes','sohohotel_booking'),
				'no' => __('No','sohohotel_booking')
			)
		),
		array(
			'id' => 'qty_select',
			'title' => __('Quantity select','sohohotel_booking'),
			'hint' => __('Display a quantity selection for this fee','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'yes' => __('Yes','sohohotel_booking'),
				'no' => __('No','sohohotel_booking')
			)
		),
		array(
			'id' => 'qty_min',
			'title' => __('Quantity min','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(0,100)
		),
		array(
			'id' => 'qty_max',
			'title' => __('Quantity max','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(0,100)
		),
		array(
			'id' => 'qty_name',
			'title' => __('Quantity name','sohohotel_booking'),
			'hint' => __('What is the name of the thing the user is selecting the quantity for? e.g. \'people\', \'car\', \'breakfast\', etc','sohohotel_booking'),
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'id' => 'select_date',
			'title' => __('Select date','sohohotel_booking'),
			'hint' => __('Display a date selection for this fee','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'yes' => __('Yes','sohohotel_booking'),
				'no' => __('No','sohohotel_booking')
			)
		),
		array(
			'id' => 'select_time',
			'title' => __('Select time','sohohotel_booking'),
			'hint' => __('Display a time selection for this fee','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'yes' => __('Yes','sohohotel_booking'),
				'no' => __('No','sohohotel_booking')
			)
		),
		array(
			'id' => 'price',
			'title' => __('Price','sohohotel_booking') . ' (' . shb_get_currency_symbol() . ')',
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'id' => 'price_name',
			'title' => __('Price name','sohohotel_booking'),
			'hint' => __('Displayed next to the \'Price\', you can add more details to describe the price such as \'Per Guest\' or \'Per Night\'','sohohotel_booking'),
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'id' => 'custom_text_input_name',
			'title' => __('Custom text input label','sohohotel_booking'),
			'hint' => __('Leave this field blank if you do not want a custom text input','sohohotel_booking'),
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'id' => 'custom_select_name',
			'title' => __('Custom select label','sohohotel_booking'),
			'hint' => __('Leave this field blank if you do not want a custom text input','sohohotel_booking'),
			'type' => 'text',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'id' => 'custom_select_options',
			'title' => __('Custom select options','sohohotel_booking'),
			'hint' => __('Separate each option with a | e.g. Option #1 | Option #2','sohohotel_booking'),
			'type' => 'textarea',
			'required' => true,
			'class' => 'shb-validation-required'
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_season($additionalfee_data)
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_rate($additionalfee_data)
		),
	)
);

echo shb_cpt_fields($shb_additionalfee_fields,$additionalfee_data);

?>