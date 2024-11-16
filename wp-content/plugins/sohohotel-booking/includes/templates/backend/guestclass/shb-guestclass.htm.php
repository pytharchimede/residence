<?php 

$shb_guestclass_fields = array(
	'fields' => array(
		array(
			'id' => 'guestclass_title_plural',
			'title' => __('Title Plural','sohohotel_booking'),
			'type' => 'text',
			'required' => true
		),
		array(
			'id' => 'guestclass_description',
			'title' => __('Description','sohohotel_booking'),
			'type' => 'text',
			'required' => true
		)
	)
);

echo shb_cpt_fields($shb_guestclass_fields,$guestclass_data); ?>