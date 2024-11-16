<?php

$shb_offer_fields = array(
	'fields' => array(
		array(
			'id' => 'short_description',
			'title' => __('Short Description','sohohotel_booking'),
			'type' => 'text',
			'required' => true
		),
		array(
			'type' => 'custom',
			'custom' => shb_cpt_accommodation($offer_data)
		)
	)
);

echo shb_cpt_fields($shb_offer_fields,$offer_data);

?>