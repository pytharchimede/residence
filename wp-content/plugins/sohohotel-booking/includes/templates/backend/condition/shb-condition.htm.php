<?php

$shb_condition_fields = array(
	'fields' => array(
		array(
			'id' => 'min_stay',
			'title' => __('Min Stay','sohohotel_booking'),
			'hint' => __('Set a minimum booking period','sohohotel_booking'),
			'required' => true,
			'type' => 'select',
			'options' => array(1,100),
			'options_title' => __('nights','sohohotel_booking'),
			'options_title_singular' => __('night','sohohotel_booking')
		),
		array(
			'id' => 'max_stay',
			'title' => __('Max Stay','sohohotel_booking'),
			'hint' => __('Set a maximum booking period','sohohotel_booking'),
			'required' => true,
			'type' => 'select',
			'options' => array(1,1000),
			'options_title' => __('nights','sohohotel_booking'),
			'options_title_singular' => __('night','sohohotel_booking')
		),
		array(
			'id' => 'advance_notice',
			'title' => __('Notice','sohohotel_booking'),
			'hint' => __('Set how many nights in advance of the check in date the user needs to submit their booking','sohohotel_booking'),
			'required' => true,
			'type' => 'select',
			'options' => array(0,100),
			'options_title' => __('nights','sohohotel_booking'),
			'options_title_singular' => __('night','sohohotel_booking')
		),
		array(
			'id' => 'increments',
			'title' => __('Increments','sohohotel_booking'),
			'hint' => __('Restrict users so they can only book a certain number of nights, e.g. if you set this option to 7 nights, users will only be able to book weekly e.g. 7 nights, 14 nights, 21 nights, etc','sohohotel_booking'),
			'required' => true,
			'type' => 'select',
			'options' => array(1,100),
			'options_title' => __('nights','sohohotel_booking'),
			'options_title_singular' => __('night','sohohotel_booking')
		),
		array(
			'id' => 'allowed_check_in',
			'title' => __('Allowed check in','sohohotel_booking'),
			'required' => true,
			'type' => 'checkbox',
			'options' => array(
				'1' => __('Mon','sohohotel_booking'),
				'2' => __('Tue','sohohotel_booking'),
				'3' => __('Wed','sohohotel_booking'),
				'4' => __('Thu','sohohotel_booking'),
				'5' => __('Fri','sohohotel_booking'),
				'6' => __('Sat','sohohotel_booking'),
				'0' => __('Sun','sohohotel_booking')
			)
		),
		array(
			'id' => 'allowed_check_out',
			'title' => __('Allowed check out','sohohotel_booking'),
			'required' => true,
			'type' => 'checkbox',
			'options' => array(
				'1' => __('Mon','sohohotel_booking'),
				'2' => __('Tue','sohohotel_booking'),
				'3' => __('Wed','sohohotel_booking'),
				'4' => __('Thu','sohohotel_booking'),
				'5' => __('Fri','sohohotel_booking'),
				'6' => __('Sat','sohohotel_booking'),
				'0' => __('Sun','sohohotel_booking')
			)
		),
		array(
			'id' => 'apply_check_in',
			'title' => __('Apply condition when check in is on the following days','sohohotel_booking'),
			'required' => true,
			'type' => 'checkbox',
			'options' => array(
				'1' => __('Mon','sohohotel_booking'),
				'2' => __('Tue','sohohotel_booking'),
				'3' => __('Wed','sohohotel_booking'),
				'4' => __('Thu','sohohotel_booking'),
				'5' => __('Fri','sohohotel_booking'),
				'6' => __('Sat','sohohotel_booking'),
				'0' => __('Sun','sohohotel_booking')
			)
		),
		array(
			'id' => 'apply_check_out',
			'title' => __('Apply condition when check out is on the following days','sohohotel_booking'),
			'required' => true,
			'type' => 'checkbox',
			'options' => array(
				'1' => __('Mon','sohohotel_booking'),
				'2' => __('Tue','sohohotel_booking'),
				'3' => __('Wed','sohohotel_booking'),
				'4' => __('Thu','sohohotel_booking'),
				'5' => __('Fri','sohohotel_booking'),
				'6' => __('Sat','sohohotel_booking'),
				'0' => __('Sun','sohohotel_booking')
			)
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_season($condition_data)
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_rate($condition_data)
		),
	)
);

echo shb_cpt_fields($shb_condition_fields,$condition_data);

?>