<?php

$shb_ratevariation_fields = array(
	'fields' => array(
		array(
			'id' => 'type',
			'title' => __('Type','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'duration' => __('Duration','sohohotel_booking'),
				'early' => __('Early','sohohotel_booking'),
				'late' => __('Late','sohohotel_booking')
			)
		),
		array(
			'id' => 'applied_to',
			'title' => __('Applied To','sohohotel_booking'),
			'required' => true,
			'type' => 'select',
			'options' => array(1,100),
			'options_title' => __('nights','sohohotel_booking'),
			'options_title_singular' => __('night','sohohotel_booking')
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_season($ratevariation_data)
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_rate($ratevariation_data)
		),
	)
);

echo shb_cpt_fields($shb_ratevariation_fields,$ratevariation_data);

?>