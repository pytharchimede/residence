<?php

$shb_season_fields = array(
	'fields' => array(
		array(
			'id' => 'start_date',
			'title' => __('Start','sohohotel_booking'),
			'type' => 'date',
			'required' => true,
			'class' => 'shb-check-in',
			'altclass' => 'shb-check-in-alt'
		),
		array(
			'id' => 'end_date',
			'title' => __('End','sohohotel_booking'),
			'type' => 'date',
			'required' => true,
			'class' => 'shb-check-out',
			'altclass' => 'shb-check-out-alt'
		),
		/*array(
			'id' => 'repeat',
			'title' => __('Repeat each year','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => array(
				'yes' => __('Yes','sohohotel_booking'),
				'no' => __('No','sohohotel_booking')
			)
		),*/
		array(
			'type' => 'custom',
			'custom' => shb_cpt_rate($season_data)
		)
	)
);

echo shb_cpt_fields($shb_season_fields,$season_data);

?>