<?php

$accommodation_ids = shb_get_all_ids('shb_accommodation');

$accommodation_select_ids = array();

foreach($accommodation_ids as $accommodation_id) {
	$accommodation_select_ids[$accommodation_id] = get_the_title($accommodation_id);
}

$shb_rate_fields = array(
	'fields' => array(
		/*array(
			'type' => 'custom',
			'custom' => shb_cpt_accommodation($rate_data)
		),*/
		array(
			'id' => 'short_description',
			'title' => __('Short Description','sohohotel_booking'),
			'type' => 'textarea',
			'required' => true
		),
		array(
			'id' => 'accommodation_rate',
			'title' => __('Add to room','sohohotel_booking'),
			'type' => 'select',
			'required' => true,
			'options' => $accommodation_select_ids
		)
	)
);

echo shb_cpt_fields($shb_rate_fields,$rate_data);

?>